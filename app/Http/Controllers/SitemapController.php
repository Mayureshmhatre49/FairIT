<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Post;
use Illuminate\Http\Response;

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

        $content = view('sitemap', compact('posts', 'caseStudies', 'industries'))->render();

        return response($content, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function sitemapIndex(): Response
    {
        return response(view('sitemap-index')->render(), 200, [
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
}
