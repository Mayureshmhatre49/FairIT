@extends('layouts.app')

@section('title', __('seo.products.handlelife_title'))
@section('description', __('seo.products.handlelife_description'))

@section('schema')
@php
    $schema = new \App\Services\SchemaBuilder();
    $schema->add([
        "@type" => "SoftwareApplication",
        "@id" => route('products.handlelife') . "#app",
        "name" => "HandleLife OS",
        "url" => "https://www.handlelifeos.com",
        "sameAs" => ["https://www.handlelifeos.com"],
        "applicationCategory" => "LifestyleApplication",
        "operatingSystem" => "Web",
        "description" => "The AI operating system for modern family life. Health, finances, school, NRI services, and emergency management — intelligently orchestrated.",
        "offers" => [ "@type" => "Offer", "url" => "https://www.handlelifeos.com", "availability" => "https://schema.org/PreOrder" ],
        "creator" => [ "@id" => "https://fairitsolutions.ch/#organization" ],
        "featureList" => "Family command centre, Health & wellness AI, Finance intelligence, School & schedule AI, NRI services, Emergency response"
    ]);
    $schema->addBreadcrumbs([
        "Home" => url('/'),
        "Products" => route('products.index'),
        "HandleLife OS" => route('products.handlelife')
    ]);
@endphp
{!! $schema->render() !!}
@endsection

@section('content')

<section class="relative bg-charcoal-950 pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(139,92,246,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight">
        <div data-animate>
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-charcoal-400 hover:text-white text-sm mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                All Products
            </a>
            <span class="badge bg-violet-600/20 text-violet-300 border-violet-500/20 mb-4">Life OS</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">HandleLife OS</h1>
            <p class="text-violet-300 text-xl font-medium italic mb-6">Life is complex. Your AI shouldn't make it more so.</p>
            <p class="text-charcoal-300 text-lg leading-relaxed max-w-2xl mb-10">
                HandleLife OS is the AI operating system for modern families — from health and school to finances and emergencies. Everything you need to manage life intelligently, in one place.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="https://www.handlelifeos.com" target="_blank" rel="noopener" class="btn-primary-lg">
                    Visit HandleLifeOS.com
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="btn-outline-white">Learn More</a>
            </div>
            <p class="text-charcoal-400 text-xs mt-4">HandleLife OS lives at <a href="https://www.handlelifeos.com" target="_blank" rel="noopener" class="text-violet-300 hover:text-violet-100 underline underline-offset-2">handlelifeos.com</a> — the official product site.</p>
        </div>
    </div>
</section>

{{-- Features --}}
<section class="section-padding bg-charcoal-950">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <h2 class="text-4xl font-bold text-white">Every Dimension of Life, Intelligently Managed</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach([
                ['title' => 'Family Command Centre', 'desc' => 'One dashboard for the whole family. Schedules, tasks, reminders, and priorities — all intelligently coordinated.', 'color' => 'violet'],
                ['title' => 'Health & Wellness AI', 'desc' => 'Appointment scheduling, medication reminders, health record management, and wellness insights for every family member.', 'color' => 'red'],
                ['title' => 'Finance Intelligence', 'desc' => 'Family budgeting, expense tracking, investment monitoring, insurance renewals, and financial goal management — automated.', 'color' => 'emerald'],
                ['title' => 'School & Education AI', 'desc' => 'School schedules, assignment tracking, fee management, tutor coordination, and educational progress monitoring.', 'color' => 'amber'],
                ['title' => 'NRI Services Suite', 'desc' => 'India-specific services for NRIs: property management, banking assistance, family coordination, and regulatory compliance.', 'color' => 'blue'],
                ['title' => 'Emergency Response', 'desc' => 'Instant access to emergency contacts, medical information, insurance details, and pre-planned response protocols.', 'color' => 'orange'],
            ] as $i => $feature)
            <div data-animate data-animate-delay="{{ $i * 80 }}" class="bg-white/5 hover:bg-white/8 border border-white/10 hover:border-violet-500/30 rounded-2xl p-6 transition-all duration-300 group">
                <div class="w-11 h-11 rounded-xl bg-violet-600/20 flex items-center justify-center mb-5 group-hover:bg-violet-600/30 transition-colors">
                    <svg class="w-5 h-5 text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                </div>
                <h3 class="font-bold text-white mb-2">{{ $feature['title'] }}</h3>
                <p class="text-charcoal-400 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Who It's For --}}
<section class="section-padding bg-white">
    <div class="container-tight">
        <div class="text-center mb-12" data-animate>
            <h2 class="section-title">Who HandleLife OS Is For</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach(['Modern Families', 'NRIs', 'Busy Professionals', 'Senior Citizens', 'Special-Needs Households'] as $i => $who)
            <div data-animate data-animate-delay="{{ $i * 80 }}" class="text-center p-5 rounded-2xl border border-charcoal-100 hover:border-brand-200 hover:shadow-card transition-all">
                <div class="w-10 h-10 rounded-xl bg-violet-50 mx-auto mb-3 flex items-center justify-center">
                    <svg class="w-5 h-5 text-violet-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                </div>
                <div class="font-semibold text-charcoal-950 text-xs">{{ $who }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight" data-animate>
        <div class="max-w-xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-white mb-4">Take Back Control of Your Family Life</h2>
                <p class="text-charcoal-400">Join the waitlist for HandleLife OS early access. Beta opens 2026.</p>
            </div>

            @if(session('success') && str_contains(session('success'), 'HandleLife OS'))
            <div class="mb-4 p-3 rounded-xl bg-emerald-500/20 border border-emerald-400/30 text-emerald-100 text-sm">{{ session('success') }}</div>
            @endif
            @if($errors->any())
            <div class="mb-4 p-3 rounded-xl bg-red-500/20 border border-red-400/30 text-red-100 text-sm">
                <ul class="space-y-1">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
            @endif

            <form action="{{ route('waitlist.submit') }}" method="POST" class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 space-y-4">
                @csrf
                <input type="hidden" name="product" value="HandleLife OS">
                <x-honeypot />
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <input name="name" type="text" required maxlength="100" aria-label="Your name" placeholder="Your name" class="form-input bg-white/5 border-white/10 text-white placeholder-charcoal-400" value="{{ old('name') }}">
                    <input name="email" type="email" required maxlength="150" aria-label="Email" placeholder="Email" class="form-input bg-white/5 border-white/10 text-white placeholder-charcoal-400" value="{{ old('email') }}">
                </div>
                <input name="stage" type="text" maxlength="100" aria-label="Household type" placeholder="Household type (e.g. NRI family, Multi-home, Single-home)" class="form-input bg-white/5 border-white/10 text-white placeholder-charcoal-400" value="{{ old('stage') }}">
                <x-turnstile theme="dark" />
                @error('cf-turnstile-response')<p class="form-error">{{ $message }}</p>@enderror
                <button type="submit" class="btn-primary-lg w-full justify-center">
                    Get Early Access
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>

@endsection
