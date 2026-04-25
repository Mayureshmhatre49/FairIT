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
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Open Graph --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:title" content="@yield('og_title', 'FairIT Solutions — AI Operating Systems')">
    <meta property="og:description" content="@yield('og_description', 'We help founders, enterprises, and modern families unlock growth through AI advisory, custom AI systems, and intelligent operating systems.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.png'))">
    <meta property="og:site_name" content="FairIT Solutions">
    <meta property="og:locale" content="en_US">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'FairIT Solutions — AI Operating Systems')">
    <meta name="twitter:description" content="@yield('og_description', 'We help founders and enterprises unlock growth through AI.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.png'))">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    {{-- Preconnect for performance --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
                        <span class="navbar-brand-title font-bold text-charcoal-950 text-base leading-tight block group-hover:text-brand-600 transition-colors">FairIT Solutions</span>
                        <span class="navbar-brand-subtitle text-[10px] text-charcoal-400 leading-tight block font-medium tracking-wide">AI OPERATING SYSTEMS</span>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
                <div class="hidden lg:flex items-center gap-1">

                    {{-- Services Mega Menu --}}
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="nav-link flex items-center gap-1 px-3 py-2 rounded-lg hover:bg-charcoal-50" :class="{ 'nav-link-active': open }">
                            Services
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
                                    ['route' => 'services.advisory', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'title' => 'AI Transformation Advisory', 'desc' => 'Strategy, roadmaps & ROI'],
                                    ['route' => 'services.copilot', 'icon' => 'M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18', 'title' => 'Custom AI Copilot Development', 'desc' => 'Bespoke AI for your team'],
                                    ['route' => 'services.voiceai', 'icon' => 'M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z', 'title' => 'Voice AI & Conversational Automation', 'desc' => 'Multilingual bots & voice agents'],
                                    ['route' => 'services.retainers', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Managed AI Retainers', 'desc' => 'Your dedicated AI team'],
                                    ['route' => 'services.founder', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Founder Growth Advisory', 'desc' => 'AI systems for leaders'],
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
                                        <div class="text-sm font-semibold text-charcoal-900 group-hover:text-brand-600 transition-colors">{{ $s['title'] }}</div>
                                        <div class="text-xs text-charcoal-500 mt-0.5">{{ $s['desc'] }}</div>
                                    </div>
                                </a>
                                @endforeach
                                <a href="{{ route('services.index') }}" class="col-span-2 flex items-center justify-between p-3 rounded-xl bg-charcoal-950 text-white hover:bg-brand-700 transition-colors mt-1">
                                    <span class="text-sm font-semibold">View All Services</span>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Products Mega Menu --}}
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="nav-link flex items-center gap-1 px-3 py-2 rounded-lg hover:bg-charcoal-50" :class="{ 'nav-link-active': open }">
                            Products
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
                                    ['route' => 'products.sarathios', 'badge' => 'Founder OS', 'color' => 'blue', 'title' => 'SarathiOS', 'desc' => 'AI Operating System for startup founders & CEOs'],
                                    ['route' => 'products.hsios', 'badge' => 'Interior OS', 'color' => 'emerald', 'title' => 'HSI OS', 'desc' => 'AI for interior design, renovation & execution'],
                                    ['route' => 'products.handlelife', 'badge' => 'Life OS', 'color' => 'violet', 'title' => 'HandleLife OS', 'desc' => 'AI operating system for modern family life'],
                                ];
                                @endphp
                                @foreach($products as $p)
                                <a href="{{ route($p['route']) }}" class="flex items-center gap-4 p-4 rounded-xl hover:bg-charcoal-50 transition-colors group border border-transparent hover:border-charcoal-100">
                                    <div class="w-10 h-10 rounded-xl bg-charcoal-900 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-bold text-charcoal-950 group-hover:text-brand-600 transition-colors">{{ $p['title'] }}</span>
                                            <span class="badge badge-blue text-[10px]">{{ $p['badge'] }}</span>
                                        </div>
                                        <div class="text-xs text-charcoal-500 mt-0.5">{{ $p['desc'] }}</div>
                                    </div>
                                    <svg class="w-4 h-4 text-charcoal-300 group-hover:text-brand-500 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('industries.index') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-charcoal-50 {{ request()->routeIs('industries*') ? 'nav-link-active bg-charcoal-50' : '' }}">Industries</a>
                    <a href="{{ route('about') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-charcoal-50 {{ request()->routeIs('about') ? 'nav-link-active bg-charcoal-50' : '' }}">About</a>
                    <a href="{{ route('blog.index') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-charcoal-50 {{ request()->routeIs('blog*') ? 'nav-link-active bg-charcoal-50' : '' }}">Insights</a>
                </div>

                {{-- CTA Buttons --}}
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('contact') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-charcoal-50">Contact</a>
                    <a href="{{ route('consultation') }}" class="btn-primary">
                        Book Consultation
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
                    <div class="px-4 py-2 text-xs font-bold text-charcoal-400 uppercase tracking-widest">Services</div>
                    <a href="{{ route('services.index') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">All Services</a>
                    <a href="{{ route('services.advisory') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">AI Transformation Advisory</a>
                    <a href="{{ route('services.copilot') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">AI Copilot Development</a>
                    <a href="{{ route('services.voiceai') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">Voice AI & Automation</a>
                    <a href="{{ route('services.retainers') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">Managed AI Retainers</a>
                    <a href="{{ route('services.founder') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">Founder Growth Advisory</a>

                    <div class="px-4 py-2 text-xs font-bold text-charcoal-400 uppercase tracking-widest mt-2">Products</div>
                    <a href="{{ route('products.sarathios') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">SarathiOS — Founder OS</a>
                    <a href="{{ route('products.hsios') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">HSI OS — Interior OS</a>
                    <a href="{{ route('products.handlelife') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">HandleLife OS — Life OS</a>

                    <div class="px-4 py-2 text-xs font-bold text-charcoal-400 uppercase tracking-widest mt-2">Company</div>
                    <a href="{{ route('industries.index') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">Industries</a>
                    <a href="{{ route('about') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">About</a>
                    <a href="{{ route('blog.index') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">Insights</a>
                    <a href="{{ route('contact') }}" class="block px-4 py-2.5 text-sm font-medium text-charcoal-700 hover:bg-charcoal-50 hover:text-charcoal-950 rounded-lg mx-2 transition-colors" role="menuitem">Contact</a>

                    <div class="pt-3 px-2">
                        <a href="{{ route('consultation') }}" class="btn-primary w-full justify-center">Book Consultation</a>
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
                        Building AI Operating Systems for Founders, Homes &amp; Life. We help organisations unlock growth through intelligent systems.
                    </p>
                    <div class="mt-6 flex items-center gap-3">
                        <a href="{{ route('consultation') }}" class="btn-primary text-sm py-2.5">Book Consultation</a>
                    </div>
                    <div class="mt-8 flex items-center gap-2 text-xs text-charcoal-500">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Switzerland &amp; Global
                    </div>
                </div>

                {{-- Services --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">Services</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('services.advisory') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">AI Transformation Advisory</a></li>
                        <li><a href="{{ route('services.copilot') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Custom AI Copilots</a></li>
                        <li><a href="{{ route('services.voiceai') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Voice AI & Automation</a></li>
                        <li><a href="{{ route('services.retainers') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Managed AI Retainers</a></li>
                        <li><a href="{{ route('services.founder') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Founder Growth Advisory</a></li>
                    </ul>
                </div>

                {{-- Products --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">Products</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('products.sarathios') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">SarathiOS</a></li>
                        <li><a href="{{ route('products.hsios') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">HSI OS</a></li>
                        <li><a href="{{ route('products.handlelife') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">HandleLife OS</a></li>
                        <li><a href="{{ route('industries.index') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Industries</a></li>
                    </ul>

                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest mt-8">Company</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('about') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('blog.index') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Insights</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Contact</a></li>
                        <li><a href="{{ route('consultation') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Book Consultation</a></li>
                    </ul>
                </div>

                {{-- Legal & Contact --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">Legal</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('privacy') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="{{ route('cookies') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Cookie Policy</a></li>
                        <li><a href="{{ route('sitemap') }}" class="text-sm text-charcoal-400 hover:text-white transition-colors">Sitemap</a></li>
                    </ul>

                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest mt-8">Contact</h4>
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
                    &copy; {{ date('Y') }} FairIT Solutions. All rights reserved.
                </p>
                <div class="flex items-center gap-4">
                    <span class="text-xs text-charcoal-600">Built with precision in Switzerland</span>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                        <span class="text-xs text-charcoal-500">All systems operational</span>
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
                <p class="text-sm font-semibold">Cookie Preferences</p>
                <p class="text-xs text-charcoal-400 mt-1">We use cookies to improve your experience. <a href="{{ route('cookies') }}" class="underline hover:text-white">Learn more</a>.</p>
            </div>
        </div>
        <div class="flex gap-2">
            <button id="cookie-accept" class="flex-1 bg-brand-600 hover:bg-brand-700 text-white text-xs font-semibold py-2 px-3 rounded-lg transition-colors">Accept All</button>
            <button id="cookie-decline" class="flex-1 bg-charcoal-800 hover:bg-charcoal-700 text-charcoal-300 text-xs font-semibold py-2 px-3 rounded-lg transition-colors">Decline</button>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
