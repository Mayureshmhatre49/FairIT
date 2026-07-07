@extends('layouts.app')

@section('title', __('case_studies.meta.title'))
@section('description', __('case_studies.meta.description'))

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "CollectionPage",
            "@id": "{{ route('case-studies.index') }}#webpage",
            "url": "{{ route('case-studies.index') }}",
            "name": "{{ __('case_studies.schema.name') }}",
            "description": "{{ __('case_studies.schema.description', ['count' => $totalCount]) }}",
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" },
            "publisher": { "@id": "https://fairitsolutions.ch/#organization" }
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "{{ __('case_studies.hero.title') }}", "item": "{{ route('case-studies.index') }}" }
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
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('case_studies.hero.label') }}</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{{ __('case_studies.hero.title') }}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">{{ __('case_studies.hero.subtitle', ['count' => $totalCount]) }}</p>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">

        {{-- Domain filter --}}
        @if($domains->count() > 0)
        <div class="flex flex-wrap gap-2 mb-10" data-animate>
            <a href="{{ route('case-studies.index') }}" class="badge {{ !request('domain') ? 'badge-blue' : 'bg-charcoal-100 text-charcoal-600 border-charcoal-200 hover:bg-charcoal-200' }} transition-colors">{{ __('case_studies.filters.all') }}</a>
            @foreach($domains as $d)
            <a href="{{ route('case-studies.index', ['domain' => $d]) }}" class="badge {{ request('domain') == $d ? 'badge-blue' : 'bg-charcoal-100 text-charcoal-600 border-charcoal-200 hover:bg-charcoal-200' }} transition-colors">{{ $d }}</a>
            @endforeach
        </div>
        @endif

        {{-- Studies grid --}}
        @if($studies->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($studies as $study)
            <a href="{{ route('case-studies.show', $study->slug) }}" data-animate data-animate-delay="{{ ($loop->index % 3) * 100 }}" class="group bg-white rounded-2xl overflow-hidden border border-charcoal-100 hover:shadow-card-hover transition-all duration-300 flex flex-col">
                <div class="aspect-video relative overflow-hidden bg-charcoal-950">
                    {!! $study->thumbnail_svg !!}
                    <div class="absolute top-4 left-4 z-10">
                        <span class="badge bg-charcoal-950/40 text-brand-200 border-brand-500/30 backdrop-blur-md text-[11px]">{{ $study->domain }}</span>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="text-xs uppercase tracking-widest text-charcoal-500 font-semibold mb-1.5">{{ $study->display_client_name }}</div>
                    <h3 class="font-bold text-charcoal-950 group-hover:text-brand-700 transition-colors mb-3 line-clamp-2 text-base md:text-lg leading-snug">{{ $study->project_name }}</h3>
                    <p class="text-charcoal-600 text-sm leading-relaxed flex-1 line-clamp-4 mb-4">{{ $study->summary }}</p>
                    <div class="flex items-center justify-between text-xs text-charcoal-500 mt-auto pt-2 border-t border-charcoal-50">
                        @if($study->is_featured)
                        <span class="badge badge-blue">{{ __('case_studies.card.featured') }}</span>
                        @else
                        <span></span>
                        @endif
                        <span class="text-brand-600 font-semibold group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                            {{ __('case_studies.card.read_more') }}
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $studies->links() }}
        </div>

        @else
        <div class="text-center py-20" data-animate>
            <div class="w-16 h-16 rounded-2xl bg-charcoal-100 flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-charcoal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-charcoal-950 mb-2">{{ __('case_studies.empty.title') }}</h3>
            <p class="text-charcoal-500 mb-8">{{ __('case_studies.empty.subtitle') }}</p>
            <a href="{{ route('case-studies.index') }}" class="btn-secondary">{{ __('case_studies.empty.cta') }}</a>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="bg-charcoal-50 section-padding">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl md:text-4xl font-bold text-charcoal-950 leading-tight">Have a project in mind?</h2>
        <p class="text-charcoal-600 text-lg mt-4 max-w-xl mx-auto">Book a 30-minute consultation and we will walk through how a similar engagement could look for your business.</p>
        <a href="{{ route('consultation') }}" class="btn-primary mt-8 inline-flex">
            {{ __('ui.nav.book_consultation') }}
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

@endsection
