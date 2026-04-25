@extends('layouts.admin')
@section('title', $post->exists ? 'Edit Post' : 'New Post')

@section('admin-content')
<form action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="POST">
    @csrf
    @if($post->exists) @method('PUT') @endif

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
        <ul class="text-sm text-red-700 space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-5">
            <div class="bg-white rounded-2xl border border-charcoal-100 p-6 space-y-5">
                <div>
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-input text-lg font-semibold" placeholder="Post title..." required>
                </div>
                <div>
                    <label class="form-label">Excerpt *</label>
                    <textarea name="excerpt" rows="2" class="form-input resize-none" placeholder="Brief summary for listings and SEO..." required>{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>
                <div>
                    <label class="form-label">Content *</label>
                    <textarea name="content" rows="16" class="form-input resize-none font-mono text-sm" placeholder="Full article content (HTML supported)..." required>{{ old('content', $post->content) }}</textarea>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-charcoal-100 p-6 space-y-4">
                <h3 class="font-bold text-charcoal-950">SEO Settings</h3>
                <div>
                    <label class="form-label">SEO Title <span class="text-charcoal-400 font-normal">(max 70 chars)</span></label>
                    <input type="text" name="seo_title" value="{{ old('seo_title', $post->seo_title) }}" maxlength="70" class="form-input" placeholder="Optimised title for search engines">
                </div>
                <div>
                    <label class="form-label">SEO Description <span class="text-charcoal-400 font-normal">(max 160 chars)</span></label>
                    <textarea name="seo_desc" rows="2" maxlength="160" class="form-input resize-none" placeholder="Meta description for search engines...">{{ old('seo_desc', $post->seo_desc) }}</textarea>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-white rounded-2xl border border-charcoal-100 p-6 space-y-4">
                <h3 class="font-bold text-charcoal-950">Publish</h3>
                <div class="flex items-center gap-3">
                    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }} class="rounded">
                    <label for="is_published" class="text-sm font-medium text-charcoal-700">Publish immediately</label>
                </div>
                <div>
                    <label class="form-label">Publish Date</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}" class="form-input text-sm">
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="btn-primary flex-1 justify-center">{{ $post->exists ? 'Update Post' : 'Create Post' }}</button>
                </div>
                @if($post->exists)
                <a href="{{ route('admin.posts.index') }}" class="btn-secondary w-full justify-center text-sm">Cancel</a>
                @endif
            </div>

            <div class="bg-white rounded-2xl border border-charcoal-100 p-6 space-y-4">
                <h3 class="font-bold text-charcoal-950">Post Details</h3>
                <div>
                    <label class="form-label">Category</label>
                    <input type="text" name="category" value="{{ old('category', $post->category) }}" class="form-input" placeholder="e.g. AI for Business">
                </div>
                <div>
                    <label class="form-label">Tags <span class="text-charcoal-400 font-normal">(comma separated)</span></label>
                    <input type="text" name="tags" value="{{ old('tags', $post->tags) }}" class="form-input" placeholder="AI, automation, founder">
                </div>
                <div>
                    <label class="form-label">Featured Image URL</label>
                    <input type="url" name="featured_image" value="{{ old('featured_image', $post->featured_image) }}" class="form-input" placeholder="https://...">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
