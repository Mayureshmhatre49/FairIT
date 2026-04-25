@extends('layouts.admin')
@section('title', 'Testimonials')

@section('admin-content')
<div class="bg-white rounded-2xl border border-charcoal-100 overflow-hidden">
    <div class="flex items-center justify-between p-6 border-b border-charcoal-100">
        <h2 class="font-bold text-charcoal-950">Testimonials ({{ $testimonials->total() }})</h2>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary text-sm">+ Add Testimonial</a>
    </div>
    <div class="divide-y divide-charcoal-50">
        @forelse($testimonials as $t)
        <div class="flex items-start gap-4 p-6 hover:bg-charcoal-50 transition-colors">
            <div class="w-10 h-10 rounded-full bg-brand-100 flex items-center justify-center text-sm font-bold text-brand-700 flex-shrink-0">{{ substr($t->name, 0, 1) }}</div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1">
                    <span class="font-bold text-charcoal-950">{{ $t->name }}</span>
                    <span class="text-charcoal-400 text-sm">· {{ $t->role }}@if($t->company), {{ $t->company }}@endif</span>
                    @if(!$t->is_active)<span class="badge bg-charcoal-100 text-charcoal-500 border-charcoal-200 text-xs">Hidden</span>@endif
                </div>
                <p class="text-charcoal-600 text-sm line-clamp-2">"{{ $t->content }}"</p>
            </div>
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('admin.testimonials.edit', $t) }}" class="text-brand-600 hover:text-brand-800 text-xs font-semibold">Edit</a>
                <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-semibold">Delete</button>
                </form>
            </div>
        </div>
        @empty
        <div class="p-16 text-center text-charcoal-400">No testimonials yet. <a href="{{ route('admin.testimonials.create') }}" class="text-brand-600 font-semibold">Add the first one →</a></div>
        @endforelse
    </div>
</div>
@endsection
