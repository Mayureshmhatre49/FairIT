<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        $latestPosts = Post::published()
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('home', compact('testimonials', 'latestPosts'));
    }
}
