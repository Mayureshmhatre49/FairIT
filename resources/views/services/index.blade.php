@extends('layouts.app')

@section('title', 'AI Services — FairIT Solutions | AI Advisory, Copilots, Voice AI & More')
@section('description', 'Premium AI services: transformation advisory, custom copilots, voice AI automation, managed retainers, and founder growth advisory. Results-driven, globally delivered.')

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "CollectionPage",
            "@id": "{{ route('services.index') }}#webpage",
            "url": "{{ route('services.index') }}",
            "name": "AI Services — FairIT Solutions",
            "description": "Premium AI consulting, implementation, and managed services for growth-focused organisations.",
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" },
            "breadcrumb": { "@id": "{{ route('services.index') }}#breadcrumb" }
        },
        {
            "@type": "ItemList",
            "@id": "{{ route('services.index') }}#services-list",
            "name": "AI Services by FairIT Solutions",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "AI Transformation Advisory", "url": "{{ route('services.advisory') }}" },
                { "@type": "ListItem", "position": 2, "name": "Custom AI Copilot Development", "url": "{{ route('services.copilot') }}" },
                { "@type": "ListItem", "position": 3, "name": "Voice AI & Conversational Automation", "url": "{{ route('services.voiceai') }}" },
                { "@type": "ListItem", "position": 4, "name": "Managed AI Retainers", "url": "{{ route('services.retainers') }}" },
                { "@type": "ListItem", "position": 5, "name": "Founder Growth Advisory", "url": "{{ route('services.founder') }}" }
            ]
        },
        {
            "@type": "BreadcrumbList",
            "@id": "{{ route('services.index') }}#breadcrumb",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Services", "item": "{{ route('services.index') }}" }
            ]
        }
    ]
}
</script>
@endsection

@section('content')

{{-- Hero --}}
<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('services.index.label') }}</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{{ __('services.index.title') }}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                {{ __('services.index.subtitle') }}
            </p>
        </div>
    </div>
</section>

{{-- Services Grid --}}
<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="space-y-6">
            @php
            $services = [
                ['route' => 'services.advisory', 'key' => 'advisory', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'num' => '01', 'delay' => '0'],
                ['route' => 'services.copilot',  'key' => 'copilot',  'icon' => 'M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18', 'num' => '02', 'delay' => '100'],
                ['route' => 'services.voiceai',  'key' => 'voiceai',  'icon' => 'M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z', 'num' => '03', 'delay' => '200'],
                ['route' => 'services.retainers','key' => 'retainers','icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'num' => '04', 'delay' => '300'],
                ['route' => 'services.founder',  'key' => 'founder',  'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'num' => '05', 'delay' => '400'],
            ];
            @endphp

            @foreach($services as $service)
            <div data-animate data-animate-delay="{{ $service['delay'] }}" class="group relative bg-white rounded-2xl border border-charcoal-100 hover:border-brand-200 hover:shadow-card-hover transition-all duration-300 overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-0">
                    <div class="p-8 lg:border-r border-charcoal-100 flex flex-col justify-between">
                        <div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0 group-hover:bg-brand-100 transition-colors">
                                    <svg class="w-6 h-6 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $service['icon'] }}"/>
                                    </svg>
                                </div>
                                <span class="text-5xl font-black text-charcoal-100 group-hover:text-brand-100 transition-colors">{{ $service['num'] }}</span>
                            </div>
                            <h2 class="text-xl font-bold text-charcoal-950 mb-2 group-hover:text-brand-700 transition-colors">{{ __('services.'.$service['key'].'.title') }}</h2>
                            <p class="text-brand-600 text-sm font-medium italic">{{ __('services.'.$service['key'].'.tagline') }}</p>
                        </div>
                        <a href="{{ route($service['route']) }}" class="btn-primary mt-8 justify-center">
                            {{ __('services.'.$service['key'].'.cta') }}
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                    <div class="p-8 lg:col-span-2">
                        <p class="text-charcoal-600 leading-relaxed mb-6">{{ __('services.'.$service['key'].'.desc_index') }}</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            @foreach(__('services.'.$service['key'].'.bullets') as $bullet)
                            <div class="flex items-center gap-2 text-sm text-charcoal-700">
                                <svg class="w-3.5 h-3.5 text-brand-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                {{ $bullet }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">{{ __('services.index.cta_title') }}</h2>
        <p class="text-charcoal-400 mb-8">{{ __('services.index.cta_subtitle') }}</p>
        <a href="{{ route('consultation') }}" class="btn-primary-lg">{{ __('services.index.cta_button') }}</a>
    </div>
</section>

@endsection
