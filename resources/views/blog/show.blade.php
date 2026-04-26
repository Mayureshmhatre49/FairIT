@extends('layouts.app')

@section('title', ($post->seo_title ?: $post->title) . ' | FairIT Solutions')
@section('description', $post->seo_desc ?: $post->excerpt)
@section('og_type', 'article')
@section('og_title', $post->seo_title ?: $post->title)
@section('og_description', $post->seo_desc ?: $post->excerpt)
@if($post->featured_image) @section('og_image', $post->featured_image) @endif

@section('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "Article",
            "@id": "{{ url()->current() }}#article",
            "headline": "{{ addslashes($post->title) }}",
            "description": "{{ addslashes($post->excerpt) }}",
            "url": "{{ url()->current() }}",
            "datePublished": "{{ $post->published_at->toIso8601String() }}",
            "dateModified": "{{ $post->updated_at->toIso8601String() }}",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{ url()->current() }}"
            },
            "author": {
                "@type": "Organization",
                "@id": "https://fairitsolutions.ch/#organization",
                "name": "FairIT Solutions",
                "url": "https://fairitsolutions.ch"
            },
            "publisher": {
                "@type": "Organization",
                "@id": "https://fairitsolutions.ch/#organization",
                "name": "FairIT Solutions",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('images/og-image.png') }}",
                    "width": 1200,
                    "height": 630
                }
            },
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" }
            @if($post->featured_image)
            ,"image": {
                "@type": "ImageObject",
                "url": "{{ $post->featured_image }}",
                "representativeOfPage": true
            }
            @endif
            @if($post->category)
            ,"articleSection": "{{ $post->category }}"
            @endif
            @if($post->tags)
            ,"keywords": "{{ $post->tags }}"
            @endif
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Insights", "item": "{{ route('blog.index') }}" },
                { "@type": "ListItem", "position": 3, "name": "{{ addslashes($post->title) }}", "item": "{{ url()->current() }}" }
            ]
        }
    ]
}
</script>
@endsection

@section('content')

<section class="relative bg-charcoal-950 pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="relative container-tight">
        <div data-animate>
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-charcoal-400 hover:text-white text-sm mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                All Insights
            </a>
            @if($post->category)
            <span class="badge badge-blue mb-4">{{ $post->category }}</span>
            @endif
            <h1 class="text-4xl lg:text-5xl font-bold text-white leading-tight max-w-3xl mb-6">{{ $post->title }}</h1>
            <div class="flex flex-wrap items-center gap-4 text-sm text-charcoal-400">
                <span>{{ $post->published_at->format('d M Y') }}</span>
                <span>·</span>
                <span>{{ $post->read_time }}</span>
                @if($post->tags)
                <span>·</span>
                @foreach($post->tags_array as $tag)
                <span class="bg-white/5 border border-white/10 px-2 py-0.5 rounded-md text-xs">{{ $tag }}</span>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Article Content --}}
            <article class="lg:col-span-2">
                @if($post->featured_image)
                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full rounded-2xl mb-10 aspect-video object-cover" loading="lazy">
                @endif
                <div class="prose-fairit">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </article>

            {{-- Sidebar --}}
            <aside class="space-y-8">
                {{-- CTA Box --}}
                <div data-animate class="bg-charcoal-950 rounded-2xl p-6 text-white sticky top-24">
                    <h3 class="font-bold mb-2">Ready to Apply This?</h3>
                    <p class="text-charcoal-400 text-sm mb-5 leading-relaxed">Book a free consultation and let us show you how AI can transform your specific business.</p>
                    <a href="{{ route('consultation') }}" class="btn-primary w-full justify-center text-sm">Book Free Consultation</a>
                </div>

                {{-- Related Posts --}}
                @if($related->count() > 0)
                <div data-animate data-animate-delay="200">
                    <h3 class="font-bold text-charcoal-950 mb-4">Related Insights</h3>
                    <div class="space-y-4">
                        @foreach($related as $rp)
                        <a href="{{ route('blog.show', $rp->slug) }}" class="group flex gap-4 hover:bg-charcoal-50 p-3 rounded-xl transition-colors">
                            <div class="w-16 h-16 rounded-lg bg-charcoal-100 overflow-hidden flex-shrink-0">
                                @if($rp->featured_image)
                                <img src="{{ $rp->featured_image }}" alt="{{ $rp->title }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full bg-brand-900/50"></div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-charcoal-900 group-hover:text-brand-700 transition-colors line-clamp-2 mb-1">{{ $rp->title }}</h4>
                                <span class="text-xs text-charcoal-400">{{ $rp->published_at->format('d M Y') }}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </aside>
        </div>
    </div>
</section>

@endsection
