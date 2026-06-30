<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Services\IndexNowService;
use Illuminate\Console\Command;

class IndexNowSubmit extends Command
{
    protected $signature = 'indexnow:submit {--all : Submit every public URL on the site}';

    protected $description = 'Submit URLs to IndexNow (Bing/Yandex/Seznam/Naver instant indexing).';

    public function handle(IndexNowService $service): int
    {
        $urls = [
            url('/'),
            route('services.index'),
            route('services.advisory'),
            route('services.copilot'),
            route('services.voiceai'),
            route('services.retainers'),
            route('services.founder'),
            route('products.index'),
            route('products.sarathios'),
            route('products.hsios'),
            route('products.handlelife'),
            route('industries.index'),
            route('about'),
            route('contact'),
            route('consultation'),
            route('blog.index'),
        ];

        // Industry detail pages
        foreach (['startups', 'smes', 'real-estate', 'hospitality', 'interior-design', 'healthcare', 'education', 'professional-services'] as $slug) {
            $urls[] = route('industries.show', $slug);
        }

        // Blog posts
        if ($this->option('all')) {
            foreach (Post::published()->pluck('slug') as $slug) {
                $urls[] = route('blog.show', $slug);
            }
        }

        $this->info('Submitting '.count($urls).' URLs to IndexNow…');
        $service->notify($urls);
        $this->info('Done. (In local/dev, this is a no-op — production only.)');

        return self::SUCCESS;
    }
}
