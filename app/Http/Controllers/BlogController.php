<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        try {
            $posts = Post::published()
                ->when($request->category, fn ($q, $cat) => $q->where('category', $cat))
                ->when($request->search, fn ($q, $s) => $q->where('title', 'like', "%{$s}%")->orWhere('excerpt', 'like', "%{$s}%"))
                ->orderByDesc('published_at')
                ->paginate(9);

            $categories = Post::published()->distinct()->pluck('category')->filter()->values();
        } catch (\Exception $e) {
            $posts = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 9);
            $categories = collect();
        }

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(string $slug): View
    {
        try {
            $post = Post::published()->where('slug', $slug)->firstOrFail();

            $related = Post::published()
                ->where('id', '!=', $post->id)
                ->where('category', $post->category)
                ->take(3)
                ->get();
        } catch (\Exception $e) {
            abort(404);
        }

        return view('blog.show', compact('post', 'related'));
    }
}
