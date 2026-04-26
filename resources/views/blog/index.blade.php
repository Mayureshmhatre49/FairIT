@extends('layouts.app')

@section('title', 'Insights — AI Strategy, Automation & Growth | FairIT Solutions')
@section('description', 'Expert insights on AI transformation, voice AI, founder productivity, AI operating systems, and business automation from the FairIT Solutions team.')

@section('content')

<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('blog.hero.label') }}</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{!! __('blog.hero.title') !!}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-xl mx-auto leading-relaxed">{{ __('blog.hero.subtitle') }}</p>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">

        {{-- Category Filter --}}
        @if($categories->count() > 0)
        <div class="flex flex-wrap gap-2 mb-10" data-animate>
            <a href="{{ route('blog.index') }}" class="badge {{ !request('category') ? 'badge-blue' : 'bg-charcoal-100 text-charcoal-600 border-charcoal-200' }}">{{ __('blog.filter.all_posts') }}</a>
            @foreach($categories as $cat)
            <a href="{{ route('blog.index', ['category' => $cat]) }}" class="badge {{ request('category') == $cat ? 'badge-blue' : 'bg-charcoal-100 text-charcoal-600 border-charcoal-200 hover:bg-charcoal-200' }} transition-colors">{{ $cat }}</a>
            @endforeach
        </div>
        @endif

        {{-- Posts Grid --}}
        @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" data-animate data-animate-delay="{{ ($loop->index % 3) * 100 }}" class="group bg-white rounded-2xl overflow-hidden border border-charcoal-100 hover:shadow-card-hover transition-all duration-300 flex flex-col">
                @if($post->featured_image)
                <div class="aspect-video bg-charcoal-100 overflow-hidden">
                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                @else
                <div class="aspect-video bg-gradient-to-br from-brand-900 to-charcoal-950 flex items-center justify-center">
                    <svg class="w-12 h-12 text-brand-400/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                @endif
                <div class="p-6 flex-1 flex flex-col">
                    @if($post->category)
                    <span class="badge badge-blue mb-3">{{ $post->category }}</span>
                    @endif
                    <h2 class="font-bold text-charcoal-950 group-hover:text-brand-700 transition-colors mb-2 line-clamp-2 text-lg">{{ $post->title }}</h2>
                    <p class="text-charcoal-500 text-sm leading-relaxed flex-1 line-clamp-3 mb-4">{{ $post->excerpt }}</p>
                    <div class="flex items-center justify-between text-xs text-charcoal-400">
                        <span>{{ $post->published_at->format('d M Y') }}</span>
                        <span>{{ $post->read_time }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $posts->links() }}
        </div>

        @else
        <div class="text-center py-20" data-animate>
            <div class="w-16 h-16 rounded-2xl bg-charcoal-100 flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-charcoal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-charcoal-950 mb-2">{{ __('blog.empty.title') }}</h3>
            <p class="text-charcoal-500 mb-8">{{ __('blog.empty.subtitle') }}</p>
            <a href="{{ route('home') }}" class="btn-secondary">{{ __('blog.empty.back') }}</a>
        </div>
        @endif
    </div>
</section>

@endsection
