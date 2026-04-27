@extends('layouts.app')

@section('title', 'About FairIT Solutions — AI Operating Systems for Growth, Homes & Life')
@section('description', 'FairIT Solutions builds AI systems that solve real-world complexity. We combine business understanding, engineering excellence, and product thinking to create AI that actually works.')

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "AboutPage",
            "@id": "{{ route('about') }}#webpage",
            "url": "{{ route('about') }}",
            "name": "About FairIT Solutions",
            "description": "FairIT Solutions builds AI systems that solve real-world complexity.",
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" },
            "about": { "@id": "https://fairitsolutions.ch/#organization" },
            "breadcrumb": {
                "@type": "BreadcrumbList",
                "itemListElement": [
                    { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                    { "@type": "ListItem", "position": 2, "name": "About", "item": "{{ route('about') }}" }
                ]
            }
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
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('about.hero.label') }}</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{!! __('about.hero.title') !!}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                {{ __('about.hero.subtitle') }}
            </p>
        </div>
    </div>
</section>

{{-- Mission --}}
<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-animate>
                <span class="section-label">{{ __('about.mission.label') }}</span>
                <h2 class="text-4xl font-bold text-charcoal-950 mt-3 leading-tight">{{ __('about.mission.title') }}</h2>
                <div class="mt-8 space-y-5 text-charcoal-600 leading-relaxed">
                    <p>{{ __('about.mission.body_1') }}</p>
                    <p>{{ __('about.mission.body_2') }}</p>
                    <p>{{ __('about.mission.body_3') }}</p>
                </div>
            </div>
            <div data-animate data-animate-delay="200" class="grid grid-cols-2 gap-6">
                @foreach(__('about.mission.stats') as $stat)
                <div class="bg-charcoal-50 rounded-2xl p-6 text-center border border-charcoal-100">
                    <div class="text-4xl font-black text-charcoal-950 mb-1">{{ $stat['num'] }}</div>
                    <div class="text-xs text-charcoal-500 font-medium">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Values --}}
<section class="section-padding bg-charcoal-50">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <span class="section-label">{{ __('about.values.label') }}</span>
            <h2 class="section-title mt-3">{{ __('about.values.title') }}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $valueIcons = [
                'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'M13 10V3L4 14h7v7l9-11h-7z',
                'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
                'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
            ];
            @endphp
            @foreach(__('about.values.items') as $i => $value)
            <div data-animate data-animate-delay="{{ $i * 100 }}" class="bg-white rounded-2xl p-6 border border-charcoal-100 text-center hover:shadow-card transition-all">
                <div class="w-12 h-12 rounded-xl bg-brand-50 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-6 h-6 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $valueIcons[$i] }}"/>
                    </svg>
                </div>
                <h3 class="font-bold text-charcoal-950 mb-2">{{ $value['title'] }}</h3>
                <p class="text-charcoal-500 text-sm leading-relaxed">{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Approach --}}
<section class="section-padding bg-white">
    <div class="container-tight">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">{{ __('about.approach.label') }}</span>
            <h2 class="section-title mt-3">{{ __('about.approach.title') }}</h2>
        </div>
        <div class="space-y-6">
            @foreach(__('about.approach.steps') as $item)
            <div data-animate class="flex items-start gap-6 p-6 rounded-2xl hover:bg-charcoal-50 transition-colors">
                <div class="w-14 h-14 rounded-2xl bg-charcoal-950 text-white flex items-center justify-center font-black text-lg flex-shrink-0">{{ $item['step'] }}</div>
                <div>
                    <h3 class="text-lg font-bold text-charcoal-950 mb-2">{{ $item['title'] }}</h3>
                    <p class="text-charcoal-600 leading-relaxed">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">{{ __('about.cta.title') }}</h2>
        <p class="text-charcoal-400 mb-8">{{ __('about.cta.subtitle') }}</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('consultation') }}" class="btn-primary-lg">{{ __('about.cta.cta_primary') }}</a>
            <a href="{{ route('contact') }}" class="btn-outline-white">{{ __('about.cta.cta_secondary') }}</a>
        </div>
    </div>
</section>

@endsection
