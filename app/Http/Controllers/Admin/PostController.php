<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::orderByDesc('created_at')->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.posts.form', ['post' => new Post]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePost($request);
        $validated['slug'] = $this->uniqueSlug($validated['title']);
        $validated['author_id'] = auth()->id();

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.form', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $this->validatePost($request, $post->id);

        if ($post->title !== $validated['title']) {
            $validated['slug'] = $this->uniqueSlug($validated['title'], $post->id);
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }

    private function validatePost(Request $request, ?int $excludeId = null): array
    {
        return $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'excerpt'      => ['required', 'string', 'max:500'],
            'content'      => ['required', 'string'],
            'category'     => ['required', 'string', 'max:100'],
            'tags'         => ['nullable', 'string', 'max:500'],
            'featured_image' => ['nullable', 'url', 'max:500'],
            'seo_title'    => ['nullable', 'string', 'max:70'],
            'seo_desc'     => ['nullable', 'string', 'max:160'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);
    }

    private function uniqueSlug(string $title, ?int $excludeId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $i = 1;

        while (Post::where('slug', $slug)->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))->exists()) {
            $slug = "{$original}-{$i}";
            $i++;
        }

        return $slug;
    }
}
