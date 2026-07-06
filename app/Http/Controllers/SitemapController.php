<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $posts = Post::published()
            ->orderByDesc('published_at')
            ->get(['slug', 'title', 'excerpt', 'featured_image', 'updated_at']);

        $caseStudies = CaseStudy::published()
            ->orderByDesc('is_featured')
            ->orderBy('order')
            ->get(['slug', 'project_name', 'summary', 'updated_at']);

        $industriesController = new IndustriesController;
        $industries = array_keys($industriesController->getIndustries());

        $staticRoutes = $this->staticRoutes();
        $industriesLastmod = $this->lastmodFor([
            resource_path('views/industries/index.blade.php'),
            resource_path('views/industries/show.blade.php'),
            lang_path('en/industries.php'),
        ]);

        $content = view('sitemap', compact(
            'posts',
            'caseStudies',
            'industries',
            'staticRoutes',
            'industriesLastmod'
        ))->render();

        return response($content, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function sitemapIndex(): Response
    {
        $postLastmod = Post::published()->max('updated_at');
        $caseStudyLastmod = CaseStudy::published()->max('updated_at');
        $staticLastmod = $this->latestStaticLastmod();

        $timestamps = array_filter([
            $postLastmod ? Carbon::parse($postLastmod) : null,
            $caseStudyLastmod ? Carbon::parse($caseStudyLastmod) : null,
            Carbon::parse($staticLastmod),
        ]);
        $siteLastmod = collect($timestamps)->max()?->toAtomString() ?? now()->toAtomString();

        return response(view('sitemap-index', compact('siteLastmod'))->render(), 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    public function news(): Response
    {
        // Google News sitemap: posts published within the last 48 hours
        $posts = Post::published()
            ->where('published_at', '>=', now()->subDays(2))
            ->orderByDesc('published_at')
            ->get(['slug', 'title', 'tags', 'published_at']);

        return response(view('sitemap-news', compact('posts'))->render(), 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    public function feed(): Response
    {
        $posts = Post::published()
            ->orderByDesc('published_at')
            ->limit(20)
            ->get(['slug', 'title', 'excerpt', 'content', 'category', 'published_at']);

        return response(view('feed', compact('posts'))->render(), 200, [
            'Content-Type' => 'application/rss+xml; charset=UTF-8',
        ]);
    }

    /**
     * Static routes with lastmod derived from the files that actually
     * back the page (Blade + lang). Google explicitly says lastmod must
     * reflect a real content change — never emit "today" on every crawl.
     */
    protected function staticRoutes(): array
    {
        $views = resource_path('views');
        $lang = lang_path('en');
        $servicesFiles = ["$views/services/_detail.blade.php", "$lang/services.php"];

        return [
            ['route' => 'home',              'freq' => 'weekly',  'priority' => '1.0', 'files' => ["$views/home.blade.php", "$lang/home.php"]],
            ['route' => 'services.index',    'freq' => 'monthly', 'priority' => '0.9', 'files' => ["$views/services/index.blade.php", "$lang/services.php"]],
            ['route' => 'services.advisory', 'freq' => 'monthly', 'priority' => '0.8', 'files' => $servicesFiles],
            ['route' => 'services.copilot',  'freq' => 'monthly', 'priority' => '0.8', 'files' => $servicesFiles],
            ['route' => 'services.voiceai',  'freq' => 'monthly', 'priority' => '0.8', 'files' => $servicesFiles],
            ['route' => 'services.retainers','freq' => 'monthly', 'priority' => '0.8', 'files' => $servicesFiles],
            ['route' => 'services.founder',  'freq' => 'monthly', 'priority' => '0.8', 'files' => $servicesFiles],
            ['route' => 'products.index',    'freq' => 'monthly', 'priority' => '0.9', 'files' => ["$views/products/index.blade.php", "$lang/products.php"]],
            ['route' => 'products.sarathios','freq' => 'monthly', 'priority' => '0.8', 'files' => ["$views/products/sarathios.blade.php", "$lang/products.php"]],
            ['route' => 'products.hsios',    'freq' => 'monthly', 'priority' => '0.8', 'files' => ["$views/products/hsios.blade.php", "$lang/products.php"]],
            ['route' => 'products.handlelife','freq' => 'monthly','priority' => '0.8', 'files' => ["$views/products/handlelife.blade.php", "$lang/products.php"]],
            ['route' => 'industries.index',  'freq' => 'monthly', 'priority' => '0.7', 'files' => ["$views/industries/index.blade.php", "$lang/industries.php"]],
            ['route' => 'about',             'freq' => 'monthly', 'priority' => '0.7', 'files' => ["$views/about.blade.php", "$lang/about.php"]],
            ['route' => 'case-studies.index','freq' => 'weekly',  'priority' => '0.8', 'files' => ["$views/case-studies/index.blade.php", "$lang/case_studies.php"]],
            ['route' => 'blog.index',        'freq' => 'weekly',  'priority' => '0.8', 'files' => ["$views/blog/index.blade.php", "$lang/blog.php"]],
            ['route' => 'contact',           'freq' => 'monthly', 'priority' => '0.7', 'files' => ["$views/contact.blade.php", "$lang/contact.php"]],
            ['route' => 'consultation',      'freq' => 'monthly', 'priority' => '0.8', 'files' => ["$views/consultation.blade.php", "$lang/consultation.php"]],
            ['route' => 'privacy',           'freq' => 'yearly',  'priority' => '0.2', 'files' => ["$views/legal/privacy.blade.php"]],
            ['route' => 'terms',             'freq' => 'yearly',  'priority' => '0.2', 'files' => ["$views/legal/terms.blade.php"]],
            ['route' => 'cookies',           'freq' => 'yearly',  'priority' => '0.2', 'files' => ["$views/legal/cookies.blade.php"]],
        ];
    }

    /**
     * Max mtime across a set of source files, formatted as YYYY-MM-DD.
     * Missing files are ignored; if no file exists, falls back to today.
     */
    public function lastmodFor(array $files): string
    {
        $mtimes = array_filter(array_map(fn ($f) => @filemtime($f) ?: null, $files));

        return $mtimes
            ? Carbon::createFromTimestamp(max($mtimes))->format('Y-m-d')
            : now()->format('Y-m-d');
    }

    protected function latestStaticLastmod(): string
    {
        $all = [];
        foreach ($this->staticRoutes() as $r) {
            $all = array_merge($all, $r['files']);
        }
        return $this->lastmodFor(array_unique($all));
    }
}
