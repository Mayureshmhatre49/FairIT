<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslatePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:translate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto-translate all blog posts into DE, FR, ES, AR using Google Translate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $languages = ['de', 'fr', 'es', 'ar'];

        $posts = Post::all();
        $total = $posts->count();
        $this->info("Found {$total} posts to translate.");

        // Initialize translators
        $translators = [];
        foreach ($languages as $lang) {
            $translators[$lang] = new GoogleTranslate($lang);
            $translators[$lang]->setSource('en');
        }

        $fields = ['title', 'excerpt', 'content', 'seo_title', 'seo_desc'];

        $bar = $this->output->createProgressBar($total);

        foreach ($posts as $post) {
            $updated = false;
            foreach ($languages as $lang) {
                foreach ($fields as $field) {
                    // Check if field has content in English
                    $enText = $post->getTranslation($field, 'en', false);

                    if (! empty($enText)) {
                        // Check if translation already exists
                        $existing = $post->getTranslation($field, $lang, false);

                        // If it is falling back to english or missing
                        if (empty($existing) || $existing === $enText) {
                            try {
                                // Article bodies can exceed Google's per-request
                                // budget. Only 'content' needs chunking; every
                                // other field is short enough for a single call.
                                if ($field === 'content') {
                                    $translated = $this->translateLongText(
                                        $translators[$lang],
                                        $enText
                                    );
                                } else {
                                    $translated = $translators[$lang]->translate($enText);
                                }
                                $post->setTranslation($field, $lang, $translated);
                                $updated = true;
                            } catch (\Exception $e) {
                                $this->error("\nFailed to translate $field to $lang for ID {$post->id}: " . $e->getMessage());
                                sleep(2); // wait before retrying next
                            }
                        }
                    }
                }
            }

            if ($updated) {
                $post->save();
                sleep(1); // Small delay to avoid rate limiting
            }
            $bar->advance();
        }

        $bar->finish();
        $this->info("\nTranslation completed!");
    }

    /**
     * Translate a long text by splitting on paragraph boundaries so no
     * single Google Translate request exceeds the per-call character
     * budget. Paragraph breaks are preserved on join.
     */
    private function translateLongText(GoogleTranslate $translator, string $text): string
    {
        // Split on blank lines (Markdown paragraph boundary).
        $paragraphs = preg_split("/\r?\n\r?\n/", $text);

        $out = [];
        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);
            if ($paragraph === '') {
                $out[] = '';
                continue;
            }
            // Additional safety split if a single paragraph is still too big.
            $chunks = str_split($paragraph, 4500);
            $translatedChunks = [];
            foreach ($chunks as $chunk) {
                $translatedChunks[] = $translator->translate($chunk);
                usleep(200_000); // 200 ms breather between chunks
            }
            $out[] = implode('', $translatedChunks);
        }

        return implode("\n\n", $out);
    }
}
