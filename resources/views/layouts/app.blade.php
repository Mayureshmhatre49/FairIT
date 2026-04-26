<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta --}}
    <title>@yield('title', 'FairIT Solutions — AI Operating Systems for Founders, Homes & Life')</title>
    <meta name="description" content="@yield('description', 'FairIT Solutions builds AI operating systems for founders, enterprises and modern families. AI advisory, custom copilots, voice AI and managed AI retainers.')">
    <meta name="keywords" content="@yield('keywords', 'AI consulting, AI transformation, AI copilots, voice AI, founder AI, AI operating systems, Switzerland AI company')">
    <meta name="author" content="FairIT Solutions">
    <meta name="robots" content="@yield('robots', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta name="theme-color" content="#1e293b">

    {{-- Hreflang — multilingual signals --}}
    <link rel="alternate" hreflang="en" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="de" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="fr" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    @php
        $ogLocaleMap = ['en' => 'en_US', 'de' => 'de_DE', 'fr' => 'fr_FR'];
        $currentLocale = app()->getLocale();
        $ogLocale = $ogLocaleMap[$currentLocale] ?? 'en_US';
    @endphp
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:title" content="@yield('og_title', 'FairIT Solutions — AI Operating Systems')">
    <meta property="og:description" content="@yield('og_description', 'We help founders, enterprises, and modern families unlock growth through AI advisory, custom AI systems, and intelligent operating systems.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="@yield('og_image_alt', 'FairIT Solutions — AI Operating Systems')">
    <meta property="og:site_name" content="FairIT Solutions">
    <meta property="og:locale" content="{{ $ogLocale }}">
    @foreach($ogLocaleMap as $code => $locale)
        @if($code !== $currentLocale)
    <meta property="og:locale:alternate" content="{{ $locale }}">
        @endif
    @endforeach

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fairitsolutions">
    <meta name="twitter:creator" content="@fairitsolutions">
    <meta name="twitter:title" content="@yield('og_title', 'FairIT Solutions — AI Operating Systems')">
    <meta name="twitter:description" content="@yield('og_description', 'We help founders and enterprises unlock growth through AI.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.png'))">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- Preconnect for performance --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Schema.org Structured Data --}}
    @yield('schema')

    {{-- Page-specific head --}}
    @stack('head')
</head>
<body class="antialiased" x-data>

    {{-- Skip to content (Accessibility) --}}
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[999] focus:px-4 focus:py-2 focus:bg-brand-600 focus:text-white focus:rounded-lg focus:font-medium">
        Skip to main content
    </a>

    {{-- ============================================================
         NAVIGATION
    ============================================================ --}}
    <nav id="navbar" class="navbar fixed top-0 left-0 right-0 z-50 transition-all duration-300" role="navigation" aria-label="Main navigation">
        <div class="container-wide">
            <div class="flex items-center justify-between h-16 lg:h-18">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group" aria-label="FairIT Solutions Home">
                    <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="font-bold text-charcoal-950 text-base leading-tight block group-hover:text-brand-600 transition-colors">FairIT Solutions</span>
                        <span class="text-[10px] text-charcoal-400 leading-tight block font-medium tracking-wide">AI OPERATING SYSTEMS</span>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
                <div class="hidden lg:flex items-center gap-1">

                    {{-- Services Mega Menu --}}
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="nav-link flex items-center gap-1 px-3 py-2 rounded-lg hover:bg-charcoal-50" :class="{ 'nav-link-active': open }">
                            {{ __('ui.nav.services') }}
                            <svg class="w-3.5 h-3.5 transition-transform" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="mega-menu absolute top-full left-1/2 -translate-x-1/2 mt-2 w-[600px] bg-white rounded-2xl shadow-premium border border-charcoal-100 p-6"
                             :class="open ? 'opacity-100 visible translate-y-0' : 'opacity-0 invisible -translate-y-2'"
                             style="transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;">
                            <div class="grid grid-cols-2 gap-2">
                                @php
                                $services = [
                                    ['route' => 'services.advisory', 'key' => 'advisory', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
                                    ['route' => 'services.copilot',  'key' => 'copilot',  'icon' => 'M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18'],
                                    ['route' => 'services.voiceai',  'key' => 'voiceai',  'icon' => 'M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z'],
                                    ['route' => 'services.retainers','key' => 'retainers','icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                                    ['route' => 'services.founder',  'key' => 'founder',  'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                                ];
                                @endphp
                                @foreach($services as $s)
                                <a href="{{ route($s['route']) }}" class="flex items-start gap-3 p-3 rounded-xl hover:bg-charcoal-50 transition-colors group">
                                    <div class="w-9 h-9 rounded-lg bg-brand-50 flex items-center justify-center flex-shrink-0 group-hover:bg-brand-100 transition-colors">
                                        <svg class="w-4.5 h-4.5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-charcoal-900 group-hover:text-brand-600 transition-colors">{{ __('ui.services.'.$s['key'].'.title') }}</div>
                                        <div class="text-xs text-charcoal-500 mt-0.5">{{ __('ui.services.'.$s['key'].'.desc') }}</div>
                                    </div>
                                </a>
                                @endforeach
                                <a href="{{ route('services.index') }}" class="col-span-2 flex items-center justify-between p-3 rounded-xl bg-charcoal-950 text-white hover:bg-brand-700 transition-colors mt-1">
                                    <span class="text-sm font-semibold">{{ __('ui.nav.view_all_services') }}</span>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Products Mega Menu --}}
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="nav-link flex items-center gap-1 px-3 py-2 rounded-lg hover:bg-charcoal-50" :class="{ 'nav-link-active': open }">
                            {{ __('ui.nav.products') }}
                            <svg class="w-3.5 h-3.5 transition-transform" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="mega-menu absolute top-full left-1/2 -translate-x-1/2 mt-2 w-[480px] bg-white rounded-2xl shadow-premium border border-charcoal-100 p-6"
                             :class="open ? 'opacity-100 visible translate-y-0' : 'opacity-0 invisible -translate-y-2'"
                             style="transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;">
                            <div class="space-y-2">
                                @php
                                $products = [
                                    ['route' => 'products.sarathios',   'key' => 'sarathios',  'color' => 'blue'],
                                    ['route' => 'products.hsios',       'key' => 'hsios',      'color' => 'emerald'],
                                    ['route' => 'products.handlelife',  'key' => 'handlelife', 'color' => 'violet'],
                                ];
                                @endphp
                                @foreach($products as $p)
                                <a href="{{ route($p['route']) }}" class="flex items-center gap-4 p-4 rounded-xl hover:bg-charcoal-50 transition-colors group border border-transparent hover:border-charcoal-100">
                                    <div class="w-10 h-10 rounded-xl bg-charcoal-900 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-bold text-charcoal-950 group-hover:text-brand-600 transition-colors">{{ __('ui.products.'.$p['key'].'.title') }}</span>
                                            <span class="badge badge-blue text-[10px]">{{ __('ui.products.'.$p['key'].'.badge') }}</span>
                                        </div>
                                        <div class="text-xs text-charcoal-500 mt-0.5">{{ __('ui.products.'.$p['key'].'.desc') }}</div>
                                    </div>
                                    <svg class="w-4 h-4 text-charcoal-300 group-hover:text-brand-500 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('industries.index') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-charcoal-50 {{ request()->routeIs('industries*') ? 'nav-link-active bg-charcoal-50' : '' }}">{{ __('ui.nav.industries') }}</a>
                    <a href="{{ route('about') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-charcoal-50 {{ request()->routeIs('about') ? 'nav-link-active bg-charcoal-50' : '' }}">{{ __('ui.nav.about') }}</a>
                    <a href="{{ route('blog.index') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-charcoal-50 {{ request()->routeIs('blog*') ? 'nav-link-active bg-charcoal-50' : '' }}">{{ __('ui.nav.insights') }}</a>
                </div>

                {{-- CTA Buttons + Language Switcher --}}
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('contact') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-charcoal-50">{{ __('ui.nav.contact') }}</a>

                    {{-- Language Switcher --}}
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open" class="flex items-center gap-1.5 px-3 py-2 rounded-lg border border-charcoal-200 hover:border-brand-400 hover:bg-charcoal-50 text-charcoal-600 hover:text-charcoal-900 text-sm font-semibold transition-colors" aria-label="Select language">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                            </svg>
                            {{ strtoupper(app()->getLocale()) }}
                            <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute right-0 top-full mt-2 w-36 bg-white rounded-xl shadow-premium border border-charcoal-100 py-1 z-50">
                            @foreach(['en' => '🇬🇧', 'de' => '🇩🇪', 'fr' => '🇫🇷'] as $code => $flag)
                            <a href="{{ route('lang.switch', $code) }}"
                               class="flex items-center gap-2.5 px-3 py-2.5 text-sm transition-colors {{ app()->getLocale() === $code ? 'text-brand-600 font-semibold bg-brand-50' : 'text-charcoal-700 hover:bg-charcoal-50' }}">
                                <span class="text-base leading-none">{{ $flag }}</span>
                                <span>{{ __('ui.lang.'.$code) }}</span>
                                @if(app()->getLocale() === $code)
                                <svg class="w-3.5 h-3.5 ml-auto text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                @endif
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('consultation') }}" class="btn-primary">
                        {{ __('ui.nav.book_consultation') }}
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-charcoal-600 hover:bg-charcoal-100 transition-colors" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobile-menu">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" role="menu" class="lg:hidden border-t border-charcoal-100">
                <div class="py-4 space-y-1">
                    <div class="px-4 py-2 text-xs font-bold text-charcoal-400 uppercase tracking-widest">{{ __('ui.nav.services') }}</div>
                    <a href="{{ route('services.index') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.nav.all_services') }}</a>
                    <a href="{{ route('services.advisory') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.services.advisory.title') }}</a>
                    <a href="{{ route('services.copilot') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.services.copilot.title') }}</a>
                    <a href="{{ route('services.voiceai') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.services.voiceai.title') }}</a>
                    <a href="{{ route('services.retainers') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.services.retainers.title') }}</a>
                    <a href="{{ route('services.founder') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.services.founder.title') }}</a>

                    <div class="px-4 py-2 text-xs font-bold text-charcoal-400 uppercase tracking-widest mt-2">{{ __('ui.nav.products') }}</div>
                    <a href="{{ route('products.sarathios') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.products.sarathios.title') }} — {{ __('ui.products.sarathios.badge') }}</a>
                    <a href="{{ route('products.hsios') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.products.hsios.title') }} — {{ __('ui.products.hsios.badge') }}</a>
                    <a href="{{ route('products.handlelife') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.products.handlelife.title') }} — {{ __('ui.products.handlelife.badge') }}</a>

                    <div class="px-4 py-2 text-xs font-bold text-charcoal-400 uppercase tracking-widest mt-2">{{ __('ui.nav.company') }}</div>
                    <a href="{{ route('industries.index') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.nav.industries') }}</a>
                    <a href="{{ route('about') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.nav.about') }}</a>
                    <a href="{{ route('blog.index') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.nav.insights') }}</a>
                    <a href="{{ route('contact') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">{{ __('ui.nav.contact') }}</a>

                    {{-- Mobile Language Switcher --}}
                    <div class="px-4 py-2 text-xs font-bold text-charcoal-400 uppercase tracking-widest mt-2">Language</div>
                    <div class="flex gap-2 px-2">
                        @foreach(['en' => '🇬🇧', 'de' => '🇩🇪', 'fr' => '🇫🇷'] as $code => $flag)
                        <a href="{{ route('lang.switch', $code) }}"
                           class="flex items-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ app()->getLocale() === $code ? 'bg-brand-600 text-white' : 'bg-charcoal-100 text-charcoal-700 hover:bg-charcoal-200' }}">
                            <span>{{ $flag }}</span>
                            <span>{{ strtoupper($code) }}</span>
                        </a>
                        @endforeach
                    </div>

                    <div class="pt-3 px-2">
                        <a href="{{ route('consultation') }}" class="btn-primary w-full justify-center">{{ __('ui.nav.book_consultation') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main id="main-content">
        {{-- Flash Messages --}}
        @if(session('success'))
        <div data-dismiss class="fixed top-20 right-4 z-50 bg-emerald-600 text-white px-6 py-4 rounded-xl shadow-premium text-sm font-medium max-w-sm">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        </div>
        @endif

        @if(session('error'))
        <div data-dismiss class="fixed top-20 right-4 z-50 bg-red-600 text-white px-6 py-4 rounded-xl shadow-premium text-sm font-medium max-w-sm">
            {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </main>

    {{-- ============================================================
         FOOTER
    ============================================================ --}}
    <footer class="bg-charcoal-950 text-white" aria-label="Site footer">
        <div class="container-wide py-16 lg:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">

                {{-- Brand Column --}}
                <div class="lg:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-2.5 mb-6">
                        <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-bold text-white text-base block">FairIT Solutions</span>
                            <span class="text-[10px] text-charcoal-400 block font-medium tracking-wide">AI OPERATING SYSTEMS</span>
                        </div>
                    </a>
                    <p class="text-charcoal-400 text-sm leading-relaxed max-w-xs">
                        {{ __('ui.footer.tagline') }}
                    </p>
                    <div class="mt-6 flex items-center gap-3">
                        <a href="{{ route('consultation') }}" class="btn-primary text-sm py-2.5">{{ __('ui.footer.book_consultation') }}</a>
                    </div>
                    <div class="mt-8 flex items-center gap-2 text-xs text-charcoal-500">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ __('ui.footer.location') }}
                    </div>
                </div>

                {{-- Services --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">{{ __('ui.footer.services') }}</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('services.advisory') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.advisory') }}</a></li>
                        <li><a href="{{ route('services.copilot') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.copilots') }}</a></li>
                        <li><a href="{{ route('services.voiceai') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.voiceai') }}</a></li>
                        <li><a href="{{ route('services.retainers') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.retainers') }}</a></li>
                        <li><a href="{{ route('services.founder') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.founder') }}</a></li>
                    </ul>
                </div>

                {{-- Products --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">{{ __('ui.footer.products') }}</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('products.sarathios') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.products.sarathios.title') }}</a></li>
                        <li><a href="{{ route('products.hsios') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.products.hsios.title') }}</a></li>
                        <li><a href="{{ route('products.handlelife') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.products.handlelife.title') }}</a></li>
                        <li><a href="{{ route('industries.index') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.nav.industries') }}</a></li>
                    </ul>

                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest mt-8">{{ __('ui.footer.company') }}</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('about') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.about') }}</a></li>
                        <li><a href="{{ route('blog.index') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.insights') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.contact') }}</a></li>
                        <li><a href="{{ route('consultation') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.book_consultation') }}</a></li>
                    </ul>
                </div>

                {{-- Legal & Contact --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">{{ __('ui.footer.legal') }}</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('privacy') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.privacy') }}</a></li>
                        <li><a href="{{ route('terms') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.terms') }}</a></li>
                        <li><a href="{{ route('cookies') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.cookies') }}</a></li>
                        <li><a href="{{ route('sitemap') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">{{ __('ui.footer.sitemap') }}</a></li>
                    </ul>

                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest mt-8">{{ __('ui.footer.contact') }}</h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="mailto:hello@fairitsolutions.ch" class="text-sm text-charcoal-400 hover:text-white transition-colors flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                hello@fairitsolutions.ch
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="mt-12 pt-8 border-t border-charcoal-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-charcoal-500">
                    &copy; {{ date('Y') }} FairIT Solutions. {{ __('ui.footer.copyright') }}
                </p>
                <div class="flex items-center gap-4">
                    <span class="text-xs text-charcoal-600">{{ __('ui.footer.built_in') }}</span>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                        <span class="text-xs text-charcoal-500">{{ __('ui.footer.systems_ok') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Cookie Consent Banner --}}
    <div id="cookie-banner" class="hidden fixed bottom-4 left-4 right-4 md:left-auto md:right-6 md:w-[400px] z-50 bg-charcoal-950 text-white rounded-2xl p-5 shadow-premium border border-charcoal-700" role="dialog" aria-label="Cookie consent">
        <div class="flex items-start gap-3 mb-4">
            <div class="w-8 h-8 bg-amber-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-sm font-semibold">{{ __('ui.cookie.title') }}</p>
                <p class="text-xs text-charcoal-400 mt-1">{{ __('ui.cookie.message') }} <a href="{{ route('cookies') }}" class="underline hover:text-white">{{ __('ui.cookie.learn') }}</a>.</p>
            </div>
        </div>
        <div class="flex gap-2">
            <button id="cookie-accept" class="flex-1 bg-brand-600 hover:bg-brand-700 text-white text-xs font-semibold py-2 px-3 rounded-lg transition-colors">{{ __('ui.cookie.accept') }}</button>
            <button id="cookie-decline" class="flex-1 bg-charcoal-800 hover:bg-charcoal-700 text-charcoal-300 text-xs font-semibold py-2 px-3 rounded-lg transition-colors">{{ __('ui.cookie.decline') }}</button>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
