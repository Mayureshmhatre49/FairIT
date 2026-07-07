@extends('layouts.app')

@section('title', ($study->seo_title ?: $study->project_name . ' — ' . $study->domain . __('case_studies.show.meta.title_suffix')) . ' — FairIT Solutions')
@section('description', $study->seo_desc ?: \Illuminate\Support\Str::limit($study->summary, 155))
@section('og_type', 'article')
@section('og_title', $study->seo_title ?: $study->project_name . __('case_studies.show.meta.title_suffix'))
@section('og_description', $study->seo_desc ?: \Illuminate\Support\Str::limit($study->summary, 155))

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "Article",
            "@id": "{{ url()->current() }}#article",
            "headline": "{{ addslashes($study->project_name) }} — {{ addslashes($study->domain) }} Case Study",
            "description": "{{ addslashes(\Illuminate\Support\Str::limit($study->summary, 200)) }}",
            "url": "{{ url()->current() }}",
            "datePublished": "{{ $study->created_at->toIso8601String() }}",
            "dateModified": "{{ $study->updated_at->toIso8601String() }}",
            "articleSection": "{{ $study->domain }}",
            "author": { "@id": "https://fairitsolutions.ch/#organization" },
            "publisher": { "@id": "https://fairitsolutions.ch/#organization" },
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" },
            "inLanguage": "{{ app()->getLocale() }}"
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Case Studies", "item": "{{ route('case-studies.index') }}" },
                { "@type": "ListItem", "position": 3, "name": "{{ addslashes($study->project_name) }}", "item": "{{ url()->current() }}" }
            ]
        }
    ]
}
</script>
@endsection

@section('content')

<section class="relative bg-charcoal-950 pt-24 md:pt-32 pb-12 md:pb-16 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight">
        <nav class="text-sm mb-6" aria-label="Breadcrumb" data-animate>
            <ol class="flex items-center gap-2 text-charcoal-400">
                <li><a href="{{ url('/') }}" class="hover:text-white transition-colors">{{ __('case_studies.show.breadcrumb.home') }}</a></li>
                <li><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></li>
                <li><a href="{{ route('case-studies.index') }}" class="hover:text-white transition-colors">{{ __('case_studies.show.breadcrumb.case_studies') }}</a></li>
                <li><svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></li>
                <li class="text-white truncate max-w-xs">{{ $study->project_name }}</li>
            </ol>
        </nav>

        <div data-animate>
            <div class="flex flex-wrap items-center gap-2 mb-4">
                <a href="{{ route('case-studies.index', ['domain' => $study->domain]) }}" class="badge badge-blue">{{ $study->domain }}</a>
                @if($study->is_featured)
                <span class="badge bg-amber-500/10 text-amber-300 border-amber-400/30">{{ __('case_studies.show.badges.featured') }}</span>
                @endif
                @if($study->is_ongoing)
                <span class="badge bg-emerald-500/10 text-emerald-300 border-emerald-400/30">{{ __('case_studies.show.badges.ongoing') }}</span>
                @endif
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight">{{ $study->project_name }}</h1>
            <p class="text-charcoal-300 text-lg mt-4 font-medium">{{ $study->display_client_name }}</p>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <article class="lg:col-span-2 space-y-10">
                <div data-animate>
                    <h2 class="text-2xl md:text-3xl font-bold text-charcoal-950 mb-4">{{ __('case_studies.show.sections.overview') }}</h2>
                    <p class="text-charcoal-700 text-lg leading-relaxed whitespace-pre-line">{{ $study->summary }}</p>
                </div>

                @if($study->challenge)
                <div data-animate>
                    <h2 class="text-2xl md:text-3xl font-bold text-charcoal-950 mb-4">{{ __('case_studies.show.sections.challenge') }}</h2>
                    <p class="text-charcoal-700 text-base md:text-lg leading-relaxed whitespace-pre-line">{{ $study->challenge }}</p>
                </div>
                @endif

                @if($study->approach)
                <div data-animate>
                    <h2 class="text-2xl md:text-3xl font-bold text-charcoal-950 mb-4">{{ __('case_studies.show.sections.approach') }}</h2>
                    <p class="text-charcoal-700 text-base md:text-lg leading-relaxed whitespace-pre-line">{{ $study->approach }}</p>
                </div>
                @endif

                @if($study->outcome)
                <div data-animate>
                    <h2 class="text-2xl md:text-3xl font-bold text-charcoal-950 mb-4">{{ __('case_studies.show.sections.outcome') }}</h2>
                    <p class="text-charcoal-700 text-base md:text-lg leading-relaxed whitespace-pre-line">{{ $study->outcome }}</p>
                </div>
                @endif

                <div class="flex flex-wrap gap-3 pt-2" data-animate>
                    <a href="{{ route('consultation') }}" class="btn-primary">
                        {{ __('case_studies.show.cta.discuss') }}
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('case-studies.index') }}" class="btn-secondary">{{ __('case_studies.show.cta.back') }}</a>
                </div>
            </article>

            <aside class="lg:col-span-1 space-y-4" data-animate>
                <div class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-100 space-y-5 sticky top-24">
                    <div>
                        <div class="text-xs font-bold text-charcoal-500 uppercase tracking-widest mb-1.5">{{ __('case_studies.show.sidebar.industry') }}</div>
                        <a href="{{ route('case-studies.index', ['domain' => $study->domain]) }}" class="text-charcoal-950 font-semibold hover:text-brand-700 transition-colors">{{ $study->domain }}</a>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-charcoal-500 uppercase tracking-widest mb-1.5">{{ __('case_studies.show.sidebar.client') }}</div>
                        <div class="text-charcoal-950 font-semibold">{{ $study->display_client_name }}</div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-charcoal-500 uppercase tracking-widest mb-1.5">{{ __('case_studies.show.sidebar.status') }}</div>
                        <div class="text-charcoal-950 font-semibold">{{ $study->is_ongoing ? __('case_studies.show.status.ongoing') : __('case_studies.show.status.delivered') }}</div>
                    </div>
                    @if(count($study->tech_keywords_array) > 0)
                    <div>
                        <div class="text-xs font-bold text-charcoal-500 uppercase tracking-widest mb-2">{{ __('case_studies.show.sidebar.tech') }}</div>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($study->tech_keywords_array as $tk)
                            <span class="badge bg-white text-charcoal-700 border-charcoal-200 text-[11px]">{{ $tk }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </aside>
        </div>
    </div>
</section>

@if($related->count() > 0)
<section class="section-padding bg-charcoal-50">
    <div class="container-wide">
        <div class="flex items-end justify-between mb-8" data-animate>
            <div>
                <span class="text-brand-600 font-semibold text-sm uppercase tracking-widest">{{ __('case_studies.show.related.label', ['domain' => $study->domain]) }}</span>
                <h2 class="text-2xl md:text-3xl font-bold text-charcoal-950 mt-2">{{ __('case_studies.show.related.title') }}</h2>
            </div>
            <a href="{{ route('case-studies.index', ['domain' => $study->domain]) }}" class="hidden md:inline-flex items-center gap-1 text-brand-600 font-semibold text-sm hover:gap-2 transition-all">
                {{ __('case_studies.show.related.view_all') }}
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($related as $rel)
            <a href="{{ route('case-studies.show', $rel->slug) }}" data-animate data-animate-delay="{{ $loop->index * 100 }}" class="group bg-white rounded-2xl overflow-hidden border border-charcoal-100 hover:shadow-card-hover transition-all duration-300 flex flex-col">
                <div class="aspect-video relative overflow-hidden bg-charcoal-950">
                    {!! $rel->thumbnail_svg !!}
                    <div class="absolute top-4 left-4 z-10">
                        <span class="badge bg-charcoal-950/40 text-brand-200 border-brand-500/30 backdrop-blur-md text-[11px]">{{ $rel->domain }}</span>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="text-xs uppercase tracking-widest text-charcoal-500 font-semibold mb-1.5">{{ $rel->display_client_name }}</div>
                    <h3 class="font-bold text-charcoal-950 group-hover:text-brand-700 transition-colors mb-2 line-clamp-2 text-base leading-snug">{{ $rel->project_name }}</h3>
                    <p class="text-charcoal-600 text-sm leading-relaxed flex-1 line-clamp-3">{{ $rel->summary }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
