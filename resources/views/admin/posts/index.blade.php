@extends('layouts.admin')
@section('title', 'Blog Posts')

@section('admin-content')
<div class="bg-white rounded-2xl border border-charcoal-100 overflow-hidden">
    <div class="flex items-center justify-between p-6 border-b border-charcoal-100">
        <h2 class="font-bold text-charcoal-950">Blog Posts ({{ $posts->total() }})</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn-primary text-sm">+ New Post</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-charcoal-50 border-b border-charcoal-100">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Title</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Category</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Status</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Published</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-charcoal-50">
                @forelse($posts as $post)
                <tr class="hover:bg-charcoal-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-charcoal-900 max-w-xs truncate">{{ $post->title }}</div>
                        <div class="text-xs text-charcoal-400">/insights/{{ $post->slug }}</div>
                    </td>
                    <td class="px-4 py-4 text-charcoal-600">{{ $post->category ?? '—' }}</td>
                    <td class="px-4 py-4">
                        @if($post->is_published)
                        <span class="badge badge-green">Published</span>
                        @else
                        <span class="badge bg-charcoal-100 text-charcoal-600 border-charcoal-200">Draft</span>
                        @endif
                    </td>
                    <td class="px-4 py-4 text-charcoal-400 text-xs">{{ $post->published_at?->format('d M Y') ?? '—' }}</td>
                    <td class="px-4 py-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-brand-600 hover:text-brand-800 text-xs font-semibold">Edit</a>
                            @if($post->is_published)
                            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-charcoal-400 hover:text-charcoal-700 text-xs font-semibold">View</a>
                            @endif
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-semibold">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-16 text-center text-charcoal-400">No posts yet. <a href="{{ route('admin.posts.create') }}" class="text-brand-600 font-semibold">Create your first post →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($posts->hasPages())
    <div class="px-6 py-4 border-t border-charcoal-100">{{ $posts->links() }}</div>
    @endif
</div>
@endsection
