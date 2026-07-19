@extends('layouts.app')

@section('title', __('seo.industries.show_title', ['industry' => $industry['title']]))
@section('description', $industry['description'])

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "Service",
            "@id": "{{ url()->current() }}#service",
            "name": "AI Solutions for {{ $industry['title'] }}",
            "description": @json($industry['description']),
            "url": "{{ url()->current() }}",
            "provider": {
                "@type": "Organization",
                "@id": "https://fairitsolutions.ch/#organization",
                "name": "FairIT Solutions"
            },
            "areaServed": "Worldwide",
            "serviceType": "AI Consulting for {{ $industry['title'] }}",
            "hasOfferCatalog": {
                "@type": "OfferCatalog",
                "name": "AI Capabilities for {{ $industry['title'] }}",
                "itemListElement": [
                    @foreach($industry['solutions'] as $i => $solution)
                    { "@type": "Offer", "position": {{ $i + 1 }}, "itemOffered": { "@type": "Service", "name": @json($solution) } }{{ !$loop->last ? ',' : '' }}
                    @endforeach
                ]
            }
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Industries", "item": "{{ route('industries.index') }}" },
                { "@type": "ListItem", "position": 3, "name": "{{ $industry['title'] }}", "item": "{{ url()->current() }}" }
            ]
        }
    ]
}
</script>
@endsection

@section('content')

{{-- Hero --}}
<section class="relative bg-charcoal-950 pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight">
        <div data-animate>
            <a href="{{ route('industries.index') }}" class="inline-flex items-center gap-2 text-charcoal-400 hover:text-white text-sm mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                All Industries
            </a>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest block mb-3">Industry Solutions</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">AI for {{ $industry['title'] }}</h1>
            <p class="text-brand-300 text-xl font-medium italic mb-6">{{ $industry['headline'] }}</p>
            <p class="text-charcoal-300 text-lg leading-relaxed max-w-2xl mb-10">{{ $industry['description'] }}</p>
            <a href="{{ route('consultation') }}" class="btn-primary-lg">Request a Discovery Call</a>
        </div>
    </div>
</section>

{{-- Intro / Industry Overview --}}
@if(!empty($industry['intro']))
<section class="section-padding bg-white">
    <div class="container-tight" data-animate>
        <span class="section-label">The Landscape</span>
        <h2 class="section-title mt-3 mb-6">Why {{ $industry['title'] }} firms are turning to AI now</h2>
        <p class="text-charcoal-700 text-lg leading-relaxed">{{ $industry['intro'] }}</p>
    </div>
</section>
@endif

{{-- Pain Points --}}
@if(!empty($industry['pain_points']))
<section class="section-padding bg-charcoal-50">
    <div class="container-wide">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">Where it Hurts</span>
            <h2 class="section-title mt-3">The operational pain we see again and again</h2>
            <p class="section-subtitle mt-4 mx-auto">If two or three of these resonate, the rest of this page is for you.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-5xl mx-auto">
            @foreach($industry['pain_points'] as $i => $pain)
            <div data-animate data-animate-delay="{{ ($i % 2) * 100 }}" class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-charcoal-100">
                <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <p class="text-charcoal-700 text-sm leading-relaxed pt-1">{{ $pain }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Solutions Grid --}}
<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">What We Build</span>
            <h2 class="section-title mt-3">AI capabilities for {{ $industry['title'] }} teams</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 max-w-6xl mx-auto">
            @foreach($industry['solutions'] as $i => $solution)
            <div data-animate data-animate-delay="{{ ($i % 3) * 100 }}" class="flex items-start gap-3 p-5 rounded-2xl border border-charcoal-100 hover:border-brand-200 hover:shadow-card transition-all">
                <div class="w-8 h-8 rounded-lg bg-brand-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-brand-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </div>
                <p class="text-charcoal-800 text-sm font-medium leading-relaxed pt-0.5">{{ $solution }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Use Cases / Scenarios --}}
@if(!empty($industry['use_cases']))
<section class="section-padding bg-charcoal-50">
    <div class="container-wide">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">In Practice</span>
            <h2 class="section-title mt-3">What AI for {{ $industry['title'] }} actually looks like</h2>
            <p class="section-subtitle mt-4 mx-auto">Composite scenarios from engagements we run. Not hypothetical — patterns we have seen repeatedly.</p>
        </div>
        <div class="space-y-6 max-w-5xl mx-auto">
            @foreach($industry['use_cases'] as $i => $case)
            <div data-animate data-animate-delay="{{ $i * 100 }}" class="bg-white rounded-2xl border border-charcoal-100 p-6 lg:p-8 hover:border-brand-200 hover:shadow-card transition-all">
                <div class="flex items-start gap-4 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-brand-600 text-white flex items-center justify-center text-sm font-bold flex-shrink-0">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <h3 class="text-xl font-bold text-charcoal-950 leading-tight pt-1">{{ $case['title'] }}</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ml-0 md:ml-14">
                    <div>
                        <div class="text-xs font-semibold text-charcoal-500 uppercase tracking-widest mb-2">The Scenario</div>
                        <p class="text-charcoal-700 text-sm leading-relaxed">{{ $case['scenario'] }}</p>
                    </div>
                    <div>
                        <div class="text-xs font-semibold text-brand-600 uppercase tracking-widest mb-2">The AI Solution</div>
                        <p class="text-charcoal-700 text-sm leading-relaxed">{{ $case['ai_solution'] }}</p>
                    </div>
                    <div>
                        <div class="text-xs font-semibold text-emerald-600 uppercase tracking-widest mb-2">The Outcome</div>
                        <p class="text-charcoal-900 text-sm font-medium leading-relaxed">{{ $case['outcome'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Compliance Note --}}
@if(!empty($industry['compliance']))
<section class="section-padding-sm bg-white">
    <div class="container-tight" data-animate>
        <div class="bg-gradient-to-br from-charcoal-50 to-white rounded-2xl border border-charcoal-100 p-6 lg:p-8 flex flex-col md:flex-row items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <div class="flex-1">
                <h3 class="text-base font-bold text-charcoal-950 mb-2">Compliance &amp; data protection</h3>
                <p class="text-charcoal-600 text-sm leading-relaxed">{{ $industry['compliance'] }}</p>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Related Product Card --}}
@if(!empty($industry['related_product']) && !empty($industry['related_product_route']))
<section class="section-padding bg-charcoal-50">
    <div class="container-tight" data-animate>
        <div class="bg-white rounded-2xl border border-charcoal-100 p-6 lg:p-10 flex flex-col lg:flex-row items-start lg:items-center gap-6 lg:gap-10">
            <div class="w-14 h-14 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                <svg class="w-7 h-7 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <div class="flex-1">
                <span class="badge badge-blue mb-2">Built for this industry</span>
                <h3 class="text-xl font-bold text-charcoal-950 mb-2 mt-2">Meet {{ $industry['related_product'] }}</h3>
                <p class="text-charcoal-600 text-sm leading-relaxed">The AI operating system we have purpose-built for {{ $industry['title'] }} teams. See the modules, integrations, and waitlist details.</p>
            </div>
            <a href="{{ route($industry['related_product_route']) }}" class="btn-primary flex-shrink-0">
                Explore {{ $industry['related_product'] }}
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- Selected work in this industry — only renders for verticals with real delivery experience --}}
@if(isset($relatedCaseStudies) && $relatedCaseStudies->count() > 0)
<section class="section-padding bg-white" aria-label="Selected case studies">
    <div class="container-wide">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12" data-animate>
            <div>
                <span class="section-label">Selected work in {{ $industry['title'] }}</span>
                <h2 class="section-title mt-3">Delivered, not theorised.</h2>
                <p class="section-subtitle mt-4 max-w-2xl">A selection of the {{ $industry['title'] }} systems we have built — the engineering foundation on which today's AI capabilities sit.</p>
            </div>
            <a href="{{ route('case-studies.index', ['domain' => $relatedCaseStudies->first()->domain]) }}" class="hidden md:inline-flex items-center gap-1 text-brand-600 font-semibold text-sm hover:gap-2 transition-all flex-shrink-0">
                View all {{ $industry['title'] }} case studies
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedCaseStudies as $study)
            <a href="{{ route('case-studies.show', $study->slug) }}" data-animate data-animate-delay="{{ ($loop->index % 3) * 100 }}" class="group bg-white rounded-2xl overflow-hidden border border-charcoal-100 hover:border-brand-200 hover:shadow-card-hover transition-all duration-300 flex flex-col">
                <div class="aspect-video bg-gradient-to-br from-brand-900 to-charcoal-950 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 hero-grid opacity-20"></div>
                    <div class="relative text-center px-6">
                        <span class="badge bg-white/10 text-brand-200 border-brand-400/30 backdrop-blur-sm mb-3">{{ $study->domain }}</span>
                        <div class="text-white font-bold text-base leading-tight line-clamp-2">{{ $study->project_name }}</div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="text-xs uppercase tracking-widest text-charcoal-500 font-semibold mb-2">{{ $study->display_client_name }}</div>
                    <p class="text-charcoal-600 text-sm leading-relaxed flex-1 line-clamp-3 mb-4">{{ $study->summary }}</p>
                    <span class="text-brand-600 font-semibold text-xs inline-flex items-center gap-1 group-hover:gap-2 transition-all mt-auto">
                        Read case study
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>

        <div class="md:hidden mt-8 text-center" data-animate>
            <a href="{{ route('case-studies.index', ['domain' => $relatedCaseStudies->first()->domain]) }}" class="btn-secondary inline-flex">
                View all {{ $industry['title'] }} case studies
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Transform Your {{ $industry['cta_noun'] ?? $industry['title'] }} Business?</h2>
        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
            <a href="{{ route('consultation') }}" class="btn-primary-lg">Request a Strategy Session</a>
            <a href="{{ route('services.index') }}" class="btn-outline-white">View All Services</a>
        </div>
    </div>
</section>

@endsection
