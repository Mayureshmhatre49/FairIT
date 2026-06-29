<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        try {
            $testimonials = Testimonial::where('is_active', true)
                ->orderBy('order')
                ->take(6)
                ->get();
        } catch (\Exception $e) {
            $testimonials = collect();
        }

        try {
            $latestPosts = Post::published()
                ->orderByDesc('published_at')
                ->take(3)
                ->get();
        } catch (\Exception $e) {
            $latestPosts = collect();
        }

        try {
            $featuredCaseStudies = CaseStudy::published()
                ->featured()
                ->orderBy('order')
                ->take(6)
                ->get();
        } catch (\Exception $e) {
            $featuredCaseStudies = collect();
        }

        return view('home', compact('testimonials', 'latestPosts', 'featuredCaseStudies'));
    }
}
