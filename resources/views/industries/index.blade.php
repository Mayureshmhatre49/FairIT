@extends('layouts.app')

@section('title', __('seo.industries.index_title'))
@section('description', __('seo.industries.index_description'))

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "CollectionPage",
            "@id": "{{ route('industries.index') }}#webpage",
            "url": "{{ route('industries.index') }}",
            "name": "Industries We Serve — FairIT Solutions",
            "description": "AI transformation solutions for startups, SMEs, real estate, hospitality, interior design, healthcare, education, and professional services.",
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" }
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Industries", "item": "{{ route('industries.index') }}" }
            ]
        }
    ]
}
</script>
@endsection

@section('content')

<section class="relative bg-charcoal-950 pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('industries.hero.label') }}</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{{ __('industries.hero.title') }}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">{{ __('industries.hero.subtitle') }}</p>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($industries as $slug => $industry)
            <a href="{{ route('industries.show', $slug) }}" data-animate data-animate-delay="{{ $loop->index * 50 }}" class="group bg-white rounded-2xl p-6 border border-charcoal-100 hover:border-brand-200 hover:shadow-card-hover transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-brand-50 flex items-center justify-center mb-5 group-hover:bg-brand-100 transition-colors">
                    <svg class="w-6 h-6 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-charcoal-950 mb-2 group-hover:text-brand-700 transition-colors">{{ $industry['title'] }}</h2>
                <p class="text-charcoal-500 text-sm leading-relaxed mb-4">{{ $industry['headline'] }}</p>
                <div class="flex items-center gap-1.5 text-brand-600 text-sm font-semibold group-hover:gap-2.5 transition-all">
                    {{ __('industries.explore') }}
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Portfolio breadth — verticals beyond the focus list above --}}
<section class="bg-white pb-20" aria-label="Wider delivery experience">
    <div class="container-wide">
        <div class="bg-charcoal-50 rounded-2xl border border-charcoal-100 p-8 lg:p-12" data-animate>
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8">
                <div class="max-w-xl">
                    <span class="section-label">Wider delivery experience</span>
                    <h2 class="text-2xl md:text-3xl font-bold text-charcoal-950 mt-3 leading-tight">Beyond the focus verticals, our team has shipped systems across</h2>
                    <div class="flex flex-wrap gap-2 mt-6">
                        @foreach(['Healthcare', 'Retail', 'Media', 'FinTech', 'eGovernance', 'Logistics', 'Manufacturing', 'Oil & Gas', 'Productivity', 'Sales Enablement', 'Human Resources', 'Information Technology', 'Analytics'] as $domain)
                        <a href="{{ route('case-studies.index', ['domain' => $domain]) }}" class="badge bg-white text-charcoal-700 border-charcoal-200 hover:border-brand-400 hover:text-brand-700 transition-colors">{{ $domain }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="flex-shrink-0 text-center lg:text-right">
                    <div class="text-5xl lg:text-6xl font-black text-charcoal-950 leading-none">60+</div>
                    <div class="text-xs uppercase tracking-widest text-charcoal-500 font-semibold mt-2">projects delivered</div>
                    <a href="{{ route('case-studies.index') }}" class="btn-primary mt-6 inline-flex">
                        View all case studies
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">{{ __('industries.cta.title') }}</h2>
        <p class="text-charcoal-400 mb-8">{{ __('industries.cta.subtitle') }}</p>
        <a href="{{ route('consultation') }}" class="btn-primary-lg">{{ __('industries.cta.button') }}</a>
    </div>
</section>

@endsection
