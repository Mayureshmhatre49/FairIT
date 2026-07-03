<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CaseStudy;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateCaseStudies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'case-studies:translate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto-translate all case studies into DE, FR, ES, AR using Google Translate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $languages = ['de', 'fr', 'es', 'ar'];
        
        $caseStudies = CaseStudy::all();
        $total = $caseStudies->count();
        $this->info("Found {$total} case studies to translate.");

        // Initialize translators
        $translators = [];
        foreach ($languages as $lang) {
            $translators[$lang] = new GoogleTranslate($lang);
            $translators[$lang]->setSource('en');
        }

        $fields = ['project_name', 'summary', 'challenge', 'approach', 'outcome', 'seo_title', 'seo_desc'];

        $bar = $this->output->createProgressBar($total);

        foreach ($caseStudies as $study) {
            $updated = false;
            foreach ($languages as $lang) {
                foreach ($fields as $field) {
                    // Check if field has content in English
                    $enText = $study->getTranslation($field, 'en', false);
                    
                    if (!empty($enText)) {
                        // Check if translation already exists
                        $existing = $study->getTranslation($field, $lang, false);
                        
                        // If it is falling back to english or missing
                        if (empty($existing) || $existing === $enText) {
                            $attempts = 0;
                            $success = false;
                            while ($attempts < 3 && !$success) {
                                try {
                                    $translated = $translators[$lang]->translate($enText);
                                    $study->setTranslation($field, $lang, $translated);
                                    $updated = true;
                                    $success = true;
                                    sleep(1); // brief delay after successful API call
                                } catch (\Exception $e) {
                                    $attempts++;
                                    $this->error("\nFailed to translate $field to $lang for ID {$study->id} (Attempt $attempts/3): " . $e->getMessage());
                                    sleep(5); // longer wait before retrying
                                }
                            }
                        }
                    }
                }
            }

            if ($updated) {
                $study->save();
            }
            $bar->advance();
        }

        $bar->finish();
        $this->info("\nTranslation completed!");
    }
}
