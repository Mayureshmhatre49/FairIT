@extends('layouts.app')

@section('title', 'FairIT Solutions — AI Operating Systems for Founders, Homes & Life')
@section('description', 'We build AI Operating Systems for ambitious founders, modern businesses, and future-ready teams. AI advisory, custom copilots, voice AI, and managed retainers.')

@section('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "FairIT Solutions",
    "url": "https://fairitsolutions.ch",
    "logo": "https://fairitsolutions.ch/images/logo.png",
    "description": "AI Operating Systems for Founders, Homes & Life",
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "CH"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer service",
        "email": "hello@fairitsolutions.ch"
    },
    "sameAs": []
}
</script>
@endsection

@section('content')

{{-- ============================================================
     HERO SECTION
============================================================ --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-charcoal-950" aria-label="Hero">

    {{-- Background Effects --}}
    <div class="absolute inset-0 hero-grid opacity-30"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 70% 60% at 50% 0%, rgba(37,99,235,0.18) 0%, transparent 70%);"></div>
    <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-brand-600/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>

    <div class="relative container-wide pt-24 pb-20 text-center">

        {{-- Top Badge --}}
        <div data-animate class="flex justify-center mb-8">
            <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 text-white/80 text-xs font-semibold px-4 py-2 rounded-full backdrop-blur-sm">
                <div class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></div>
                Now serving founders &amp; enterprises globally
            </div>
        </div>

        {{-- Headline --}}
        <h1 data-animate data-animate-delay="100" class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-[1.08] tracking-tight max-w-5xl mx-auto">
            AI Systems for
            <span class="block bg-gradient-to-r from-brand-400 via-blue-300 to-brand-500 bg-clip-text text-transparent">
                Growth, Leadership
            </span>
            &amp; Modern Life
        </h1>

        {{-- Subheadline --}}
        <p data-animate data-animate-delay="200" class="mt-8 text-lg lg:text-xl text-charcoal-300 max-w-2xl mx-auto leading-relaxed">
            We help founders and businesses unlock growth through AI advisory, custom AI systems,
            and intelligent operating systems built for the real world.
        </p>

        {{-- CTA Buttons --}}
        <div data-animate data-animate-delay="300" class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('consultation') }}" class="btn-primary-lg animate-pulse-glow">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Book Consultation
            </a>
            <a href="{{ route('products.index') }}" class="btn-outline-white">
                Explore Products
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Trust Strip --}}
        <div data-animate data-animate-delay="400" class="mt-16 pt-12 border-t border-white/5">
            <p class="text-xs text-charcoal-500 font-medium uppercase tracking-widest mb-6">Trusted by ambitious founders, modern businesses &amp; future-ready teams</p>
            <div class="flex flex-wrap items-center justify-center gap-x-10 gap-y-4">
                @foreach(['Startups', 'SMEs', 'Interior Firms', 'Hospitality', 'Real Estate', 'Professional Services'] as $trust)
                <div class="flex items-center gap-2 text-charcoal-400 text-sm font-medium">
                    <svg class="w-3.5 h-3.5 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    {{ $trust }}
                </div>
                @endforeach
            </div>
        </div>

        {{-- Stats --}}
        <div data-animate data-animate-delay="500" class="mt-16 grid grid-cols-2 sm:grid-cols-4 gap-8 max-w-3xl mx-auto">
            @foreach([['95%', 'AI adoption rate', '95'], ['40+', 'Languages supported', '40'], ['3×', 'Average productivity gain', '3'], ['24/7', 'AI systems uptime', '24']] as $stat)
            <div class="text-center">
                <div class="text-3xl lg:text-4xl font-bold text-white">{{ $stat[0] }}</div>
                <div class="text-xs text-charcoal-500 mt-1">{{ $stat[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-charcoal-500">
        <span class="text-xs font-medium tracking-widest uppercase">Scroll</span>
        <div class="w-px h-12 bg-gradient-to-b from-charcoal-500 to-transparent"></div>
    </div>
</section>

{{-- ============================================================
     THREE PILLARS
============================================================ --}}
<section class="section-padding bg-white" aria-label="Core value pillars">
    <div class="container-wide">
        <div class="text-center mb-16" data-animate>
            <span class="section-label">What We Build</span>
            <h2 class="section-title mt-3">One Mission. Three Domains.</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @php
            $pillars = [
                [
                    'title'    => 'Build Better Companies',
                    'icon'     => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    'desc'     => 'AI transformation advisory, custom copilots, voice automation, and managed retainers for organisations that want to operate at a higher level.',
                    'features' => ['AI readiness audits', 'Custom AI copilots', 'Voice & chat automation', 'Managed AI teams'],
                    'cta'      => ['text' => 'Explore Services', 'route' => 'services.index'],
                    'delay'    => '100',
                ],
                [
                    'title'    => 'Build Better Homes',
                    'icon'     => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                    'desc'     => 'HSI OS — the AI operating system for interior design, renovation, and home management. For homeowners, architects, and interior firms.',
                    'features' => ['Project management AI', 'Vendor coordination', 'Budget intelligence', 'Client portals'],
                    'cta'      => ['text' => 'Explore HSI OS', 'route' => 'products.hsios'],
                    'delay'    => '200',
                ],
                [
                    'title'    => 'Build Better Lives',
                    'icon'     => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                    'desc'     => 'HandleLife OS — intelligent life management for modern families, NRIs, busy professionals, and anyone who wants to live with more clarity.',
                    'features' => ['Family command centre', 'Health & wellness AI', 'Finance intelligence', 'Life OS dashboard'],
                    'cta'      => ['text' => 'Explore HandleLife OS', 'route' => 'products.handlelife'],
                    'delay'    => '300',
                ],
            ];
            @endphp

            @foreach($pillars as $pillar)
            <div data-animate data-animate-delay="{{ $pillar['delay'] }}" class="group relative bg-white rounded-2xl p-8 border border-charcoal-100 hover:border-brand-200 hover:shadow-card-hover transition-all duration-300 flex flex-col">
                <div class="w-12 h-12 rounded-xl bg-brand-50 flex items-center justify-center mb-6 group-hover:bg-brand-100 transition-colors">
                    <svg class="w-6 h-6 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $pillar['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-charcoal-950 mb-3">{{ $pillar['title'] }}</h3>
                <p class="text-charcoal-500 text-sm leading-relaxed mb-6 flex-1">{{ $pillar['desc'] }}</p>
                <ul class="space-y-2 mb-8">
                    @foreach($pillar['features'] as $feature)
                    <li class="flex items-center gap-2 text-sm text-charcoal-600">
                        <svg class="w-3.5 h-3.5 text-brand-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route($pillar['cta']['route']) }}" class="btn-secondary w-full justify-center group-hover:border-brand-300 group-hover:text-brand-700 transition-colors">
                    {{ $pillar['cta']['text'] }}
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     SERVICES SECTION
============================================================ --}}
<section class="section-padding bg-charcoal-50" aria-label="Services preview">
    <div class="container-wide">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-14" data-animate>
            <div>
                <span class="section-label">What We Do</span>
                <h2 class="section-title mt-3">Premium AI Services</h2>
                <p class="section-subtitle mt-4">Consulting, implementation, and recurring AI systems for growth-focused organisations.</p>
            </div>
            <a href="{{ route('services.index') }}" class="btn-secondary flex-shrink-0">
                View All Services
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $services = [
                ['route' => 'services.advisory', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'number' => '01', 'title' => 'AI Transformation Advisory', 'desc' => 'AI readiness audits, roadmap creation, ROI prioritisation, and leadership workshops to guide your AI transformation.', 'cta' => 'Book Strategy Session', 'delay' => '0'],
                ['route' => 'services.copilot', 'icon' => 'M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18', 'number' => '02', 'title' => 'Custom AI Copilot Development', 'desc' => 'Build internal AI copilots for CEOs, sales, HR, operations and support teams — trained on your data.', 'cta' => 'Request Demo', 'delay' => '100'],
                ['route' => 'services.voiceai', 'icon' => 'M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z', 'number' => '03', 'title' => 'Voice AI & Conversational Automation', 'desc' => 'AI voice callers, multilingual bots, booking bots, support bots and WhatsApp automation at enterprise scale.', 'cta' => 'See Use Cases', 'delay' => '200'],
                ['route' => 'services.retainers', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'number' => '04', 'title' => 'Managed AI Retainers', 'desc' => 'Monthly AI optimisation, bot management, workflow enhancement, reporting automation, and innovation support.', 'cta' => 'Talk to Expert', 'delay' => '300'],
                ['route' => 'services.founder', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'number' => '05', 'title' => 'Founder Growth Advisory', 'desc' => 'High-level strategic AI systems for founders, business owners, and leaders who demand more from their operations.', 'cta' => 'Apply Now', 'delay' => '400'],
            ];
            @endphp

            @foreach($services as $service)
            <div data-animate data-animate-delay="{{ $service['delay'] }}" class="service-card flex flex-col {{ $loop->last ? 'sm:col-span-2 lg:col-span-1' : '' }}">
                <div class="flex items-start justify-between mb-6">
                    <div class="w-11 h-11 rounded-xl bg-brand-50 flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                        <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $service['icon'] }}"/>
                        </svg>
                    </div>
                    <span class="text-4xl font-black text-charcoal-100 group-hover:text-brand-100 transition-colors">{{ $service['number'] }}</span>
                </div>
                <h3 class="text-lg font-bold text-charcoal-950 mb-3 group-hover:text-brand-700 transition-colors">{{ $service['title'] }}</h3>
                <p class="text-charcoal-500 text-sm leading-relaxed flex-1 mb-6">{{ $service['desc'] }}</p>
                <a href="{{ route($service['route']) }}" class="btn-ghost p-0 text-brand-600 hover:text-brand-800 font-semibold text-sm group/btn flex items-center gap-1.5">
                    {{ $service['cta'] }}
                    <svg class="w-3.5 h-3.5 group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     PRODUCTS SECTION
============================================================ --}}
<section class="section-padding bg-charcoal-950 overflow-hidden" aria-label="AI Products">
    <div class="container-wide">
        <div class="text-center mb-16" data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">Our Products</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-white mt-3 leading-tight">AI Operating Systems</h2>
            <p class="text-charcoal-400 text-lg mt-4 max-w-2xl mx-auto">Scalable products designed to solve real-world complexity — for founders, homes, and life.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @php
            $products = [
                [
                    'route'    => 'products.sarathios',
                    'tag'      => 'Founder OS',
                    'name'     => 'SarathiOS',
                    'tagline'  => 'The AI brain for ambitious founders and CEOs.',
                    'desc'     => 'A complete AI operating system for startup founders and decision-makers. Command centre, strategy copilot, team alignment, and fundraising readiness in one intelligent system.',
                    'features' => ['Founder dashboard', 'Growth command centre', 'AI strategy copilot', 'Decision support engine', 'Team alignment tools', 'Fundraising readiness'],
                    'color'    => 'from-brand-900/40 to-brand-800/20 border-brand-700/30',
                    'badge'    => 'bg-brand-600/20 text-brand-300 border-brand-500/20',
                    'delay'    => '100',
                ],
                [
                    'route'    => 'products.hsios',
                    'tag'      => 'Interior OS',
                    'name'     => 'HSI OS',
                    'tagline'  => 'The AI brain for interior design and renovation.',
                    'desc'     => 'AI-powered project management, client portals, vendor coordination, and budget intelligence for interior designers, architects, and homeowners.',
                    'features' => ['Project timeline AI', 'Client portal', 'Vendor coordination', 'Budget intelligence', 'Design brief AI', 'Progress tracking'],
                    'color'    => 'from-emerald-900/40 to-emerald-800/20 border-emerald-700/30',
                    'badge'    => 'bg-emerald-600/20 text-emerald-300 border-emerald-500/20',
                    'delay'    => '200',
                ],
                [
                    'route'    => 'products.handlelife',
                    'tag'      => 'Life OS',
                    'name'     => 'HandleLife OS',
                    'tagline'  => 'The AI brain for modern family life.',
                    'desc'     => 'Intelligent life management for families, NRIs, busy professionals, and anyone who wants to live with less chaos and more clarity.',
                    'features' => ['Family command centre', 'Health & wellness AI', 'Finance intelligence', 'School & schedule AI', 'NRI services', 'Emergency response'],
                    'color'    => 'from-violet-900/40 to-violet-800/20 border-violet-700/30',
                    'badge'    => 'bg-violet-600/20 text-violet-300 border-violet-500/20',
                    'delay'    => '300',
                ],
            ];
            @endphp

            @foreach($products as $product)
            <div data-animate data-animate-delay="{{ $product['delay'] }}" class="relative bg-gradient-to-br {{ $product['color'] }} rounded-2xl p-8 border flex flex-col product-glow hover:scale-[1.02] transition-all duration-300 group">
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <span class="inline-block px-2.5 py-1 rounded-md text-xs font-semibold border {{ $product['badge'] }} mb-3">{{ $product['tag'] }}</span>
                        <h3 class="text-2xl font-bold text-white">{{ $product['name'] }}</h3>
                        <p class="text-charcoal-300 text-sm mt-1">{{ $product['tagline'] }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                </div>

                <p class="text-charcoal-300 text-sm leading-relaxed mb-8 flex-1">{{ $product['desc'] }}</p>

                <ul class="space-y-2 mb-8">
                    @foreach($product['features'] as $feature)
                    <li class="flex items-center gap-2 text-sm text-charcoal-300">
                        <svg class="w-3.5 h-3.5 text-charcoal-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route($product['route']) }}" class="inline-flex items-center justify-between gap-2 w-full bg-white/10 hover:bg-white/20 text-white font-semibold text-sm px-5 py-3 rounded-xl transition-all group-hover:bg-white/15">
                    <span>Explore {{ $product['name'] }}</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     WHY FAIRIT SECTION
============================================================ --}}
<section class="section-padding bg-white" aria-label="Why FairIT">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-animate>
                <span class="section-label">Our Difference</span>
                <h2 class="text-4xl lg:text-5xl font-bold text-charcoal-950 mt-3 leading-tight">
                    Most Companies Buy Tools.<br>
                    <span class="text-gradient">We Build Systems.</span>
                </h2>
                <p class="text-charcoal-500 text-lg mt-6 leading-relaxed">
                    The difference between an AI tool and an AI system is the difference between a hammer and a house. We build the house.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('consultation') }}" class="btn-primary-lg">Start Your Transformation</a>
                    <a href="{{ route('about') }}" class="btn-secondary-lg">Learn About Us</a>
                </div>
            </div>

            <div class="space-y-4">
                @php
                $whyPoints = [
                    ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Faster Execution', 'desc' => 'AI systems reduce decision lag, automate repetitive tasks, and free your team to focus on what moves the needle.', 'delay' => '100'],
                    ['icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'title' => 'Better Decisions', 'desc' => 'Real-time intelligence, trend detection, and scenario modelling that turns data into confident action.', 'delay' => '200'],
                    ['icon' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15', 'title' => 'Lower Operational Chaos', 'desc' => 'Automated workflows, intelligent routing, and proactive alerts eliminate the noise that drains organisations.', 'delay' => '300'],
                    ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'AI That Actually Gets Used', 'desc' => 'We design for adoption, not just capability. Our systems achieve 90%+ usage rates because they fit how people actually work.', 'delay' => '400'],
                    ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 0V4m0 3L7 8m5 0l5 1M12 16c-1.657 0-3-.895-3-2h6c0 1.105-1.343 2-3 2zm0 0v1m0 1v3', 'title' => 'Measurable ROI', 'desc' => 'Every engagement includes clear success metrics, regular performance reporting, and proven ROI frameworks.', 'delay' => '500'],
                ];
                @endphp

                @foreach($whyPoints as $point)
                <div data-animate data-animate-delay="{{ $point['delay'] }}" class="flex items-start gap-4 p-5 rounded-xl hover:bg-charcoal-50 transition-colors group">
                    <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0 group-hover:bg-brand-100 transition-colors">
                        <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $point['icon'] }}"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-charcoal-950 mb-1">{{ $point['title'] }}</h3>
                        <p class="text-charcoal-500 text-sm leading-relaxed">{{ $point['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     INDUSTRIES SECTION
============================================================ --}}
<section class="section-padding bg-charcoal-50" aria-label="Industries served">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <span class="section-label">Who We Serve</span>
            <h2 class="section-title mt-3">Industries We Transform</h2>
            <p class="section-subtitle mt-4 mx-auto">AI solutions tailored to the unique challenges and opportunities of every sector.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
            $industries = [
                ['slug' => 'startups', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'name' => 'Startups', 'delay' => '0'],
                ['slug' => 'smes', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'name' => 'SMEs', 'delay' => '50'],
                ['slug' => 'real-estate', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'name' => 'Real Estate', 'delay' => '100'],
                ['slug' => 'hospitality', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'name' => 'Hospitality', 'delay' => '150'],
                ['slug' => 'interior-design', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'name' => 'Interior Design', 'delay' => '200'],
                ['slug' => 'healthcare', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'name' => 'Healthcare', 'delay' => '250'],
                ['slug' => 'education', 'icon' => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222', 'name' => 'Education', 'delay' => '300'],
                ['slug' => 'professional-services', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'name' => 'Professional Services', 'delay' => '350'],
            ];
            @endphp

            @foreach($industries as $industry)
            <a href="{{ route('industries.show', $industry['slug']) }}" data-animate data-animate-delay="{{ $industry['delay'] }}" class="group bg-white rounded-2xl p-6 border border-charcoal-100 hover:border-brand-200 hover:shadow-card-hover transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-12 h-12 rounded-xl bg-charcoal-50 flex items-center justify-center mb-4 group-hover:bg-brand-50 transition-colors">
                    <svg class="w-6 h-6 text-charcoal-500 group-hover:text-brand-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $industry['icon'] }}"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-charcoal-800 group-hover:text-brand-700 transition-colors">{{ $industry['name'] }}</span>
                <svg class="w-3.5 h-3.5 text-charcoal-300 group-hover:text-brand-500 group-hover:translate-x-0.5 transition-all mt-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================
     TESTIMONIALS SECTION
============================================================ --}}
<section class="section-padding bg-white" aria-label="Testimonials">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <span class="section-label">Social Proof</span>
            <h2 class="section-title mt-3">What Our Clients Say</h2>
        </div>

        @if($testimonials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $t)
            <div data-animate data-animate-delay="{{ ($loop->index * 100) }}" class="bg-white rounded-2xl p-8 border border-charcoal-100 hover:shadow-card-hover transition-all duration-300 flex flex-col">
                {{-- Stars --}}
                <div class="flex gap-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $t->rating ? 'text-amber-400' : 'text-charcoal-200' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>

                <blockquote class="text-charcoal-600 text-sm leading-relaxed flex-1 mb-6">"{{ $t->content }}"</blockquote>

                <div class="flex items-center gap-3">
                    @if($t->avatar)
                    <img src="{{ $t->avatar }}" alt="{{ $t->name }}" class="w-10 h-10 rounded-full object-cover" loading="lazy">
                    @else
                    <div class="w-10 h-10 rounded-full bg-brand-100 flex items-center justify-center flex-shrink-0">
                        <span class="text-brand-700 font-bold text-sm">{{ substr($t->name, 0, 1) }}</span>
                    </div>
                    @endif
                    <div>
                        <div class="text-sm font-bold text-charcoal-900">{{ $t->name }}</div>
                        <div class="text-xs text-charcoal-500">{{ $t->role }}{{ $t->company ? ' · ' . $t->company : '' }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- Placeholder testimonials for when DB is empty --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['name' => 'Rajiv Sharma', 'role' => 'CEO, TechScale Ventures', 'content' => 'FairIT transformed how we operate. Our AI copilot handles 80% of internal queries — saving us 20+ hours per week. The ROI in month one paid for the entire engagement.'],
                ['name' => 'Priya Mehta', 'role' => 'Operations Director, Horizon Group', 'content' => 'The voice AI they built for our booking line is incredible. Bookings are up 34% and our team handles zero inbound calls. Exceptional execution.'],
                ['name' => 'Marcus Klein', 'role' => 'Founder, NextGen Properties', 'content' => 'The Founder Growth Advisory programme completely changed how I make decisions. I now have a system, not just a vision. Worth every franc.'],
            ] as $i => $t)
            <div data-animate data-animate-delay="{{ $i * 150 }}" class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100 flex flex-col">
                <div class="flex gap-1 mb-4">
                    @for($star = 0; $star < 5; $star++)<svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor
                </div>
                <blockquote class="text-charcoal-600 text-sm leading-relaxed flex-1 mb-6">"{{ $t['content'] }}"</blockquote>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-brand-100 flex items-center justify-center flex-shrink-0">
                        <span class="text-brand-700 font-bold text-sm">{{ substr($t['name'], 0, 1) }}</span>
                    </div>
                    <div>
                        <div class="text-sm font-bold text-charcoal-900">{{ $t['name'] }}</div>
                        <div class="text-xs text-charcoal-500">{{ $t['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- ============================================================
     LATEST INSIGHTS
============================================================ --}}
@if($latestPosts->count() > 0)
<section class="section-padding bg-charcoal-50" aria-label="Latest insights">
    <div class="container-wide">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-14" data-animate>
            <div>
                <span class="section-label">Latest Thinking</span>
                <h2 class="section-title mt-3">Insights &amp; Perspectives</h2>
            </div>
            <a href="{{ route('blog.index') }}" class="btn-secondary flex-shrink-0">
                View All Insights
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" data-animate data-animate-delay="{{ $loop->index * 100 }}" class="group bg-white rounded-2xl overflow-hidden border border-charcoal-100 hover:shadow-card-hover transition-all duration-300 flex flex-col">
                @if($post->featured_image)
                <div class="aspect-video bg-charcoal-100 overflow-hidden">
                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                @else
                <div class="aspect-video bg-gradient-to-br from-brand-900 to-charcoal-950 flex items-center justify-center">
                    <svg class="w-12 h-12 text-brand-400/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                </div>
                @endif
                <div class="p-6 flex-1 flex flex-col">
                    @if($post->category)
                    <span class="badge badge-blue mb-3">{{ $post->category }}</span>
                    @endif
                    <h3 class="font-bold text-charcoal-950 group-hover:text-brand-700 transition-colors mb-2 line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-charcoal-500 text-sm leading-relaxed flex-1 line-clamp-3 mb-4">{{ $post->excerpt }}</p>
                    <div class="flex items-center justify-between text-xs text-charcoal-400">
                        <span>{{ $post->published_at->format('d M Y') }}</span>
                        <span>{{ $post->read_time }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============================================================
     FINAL CTA
============================================================ --}}
<section class="section-padding bg-charcoal-950 relative overflow-hidden" aria-label="Call to action">
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 100%, rgba(37,99,235,0.2) 0%, transparent 70%);"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-brand-600/5 rounded-full blur-3xl"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">Get Started</span>
            <h2 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-white mt-4 leading-tight">
                Ready to Build Your<br>
                <span class="bg-gradient-to-r from-brand-400 to-blue-300 bg-clip-text text-transparent">AI Advantage?</span>
            </h2>
            <p class="text-charcoal-400 text-lg mt-6 max-w-xl mx-auto leading-relaxed">
                Join the growing number of founders and businesses operating with AI intelligence at their core.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('consultation') }}" class="btn-primary-lg animate-pulse-glow">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Book Consultation
                </a>
                <a href="{{ route('contact') }}" class="btn-outline-white">
                    Contact Us
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </a>
            </div>

            {{-- Trust signals --}}
            <div class="mt-12 flex flex-wrap items-center justify-center gap-6 text-sm text-charcoal-500">
                @foreach(['No long-term contracts required', '24h response guaranteed', 'Confidentiality assured', 'Based in Switzerland'] as $trust)
                <div class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    {{ $trust }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
