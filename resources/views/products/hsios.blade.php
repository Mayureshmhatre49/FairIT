@extends('layouts.app')

@section('title', 'HSI OS — Interior Design AI Operating System | FairIT Solutions')
@section('description', 'HSI OS is the AI operating system for interior design, renovation, and home execution. Project management AI, vendor coordination, budget intelligence for homeowners and interior firms.')

@section('content')

<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(16,185,129,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight">
        <div data-animate>
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-charcoal-400 hover:text-white text-sm mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                All Products
            </a>
            <span class="badge bg-emerald-600/20 text-emerald-300 border-emerald-500/20 mb-4">Interior OS</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">HSI OS</h1>
            <p class="text-emerald-300 text-xl font-medium italic mb-6">Design smarter. Execute flawlessly. Deliver on time.</p>
            <p class="text-charcoal-300 text-lg leading-relaxed max-w-2xl mb-10">
                The AI operating system built for interior designers, renovation firms, architects, and homeowners who are tired of projects going over budget and over time.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('consultation') }}" class="btn-primary-lg">Get Early Access</a>
                <a href="{{ route('contact') }}" class="btn-outline-white">Schedule Demo</a>
            </div>
        </div>
    </div>
</section>

{{-- Features --}}
<section class="section-padding bg-charcoal-950">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <h2 class="text-4xl font-bold text-white">Everything Your Project Needs</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach([
                ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'title' => 'Project Timeline AI', 'desc' => 'Automated scheduling, dependency tracking, and proactive alerts when timelines are at risk. No more manual Gantt charts.'],
                ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Client Portal', 'desc' => 'Beautiful client-facing portal for approvals, updates, payment tracking, and communication. Clients love it.'],
                ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5', 'title' => 'Vendor Coordination', 'desc' => 'AI-assisted vendor management. Track deliveries, raise purchase orders, and manage relationships in one place.'],
                ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 0V4', 'title' => 'Budget Intelligence', 'desc' => 'Real-time budget tracking with variance analysis and cost-to-complete projections. Never get surprised by overruns.'],
                ['icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'title' => 'Design Brief AI', 'desc' => 'AI-assisted design briefs, moodboards, and scope documentation. Cut brief creation time from days to hours.'],
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Quality & Snagging', 'desc' => 'Digital snagging lists, photo documentation, and contractor sign-off workflows for professional project closure.'],
            ] as $i => $feature)
            <div data-animate data-animate-delay="{{ $i * 80 }}" class="bg-white/5 hover:bg-white/8 border border-white/10 hover:border-emerald-500/30 rounded-2xl p-6 transition-all duration-300 group">
                <div class="w-11 h-11 rounded-xl bg-emerald-600/20 flex items-center justify-center mb-5 group-hover:bg-emerald-600/30 transition-colors">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}"/>
                    </svg>
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
            <h2 class="section-title">Built for the Interior World</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
            @foreach(['Homeowners', 'Interior Designers', 'Architects', 'Contractors & Firms'] as $i => $who)
            <div data-animate data-animate-delay="{{ $i * 100 }}" class="text-center p-6 rounded-2xl border border-charcoal-100 hover:border-brand-200 hover:shadow-card transition-all">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div class="font-bold text-charcoal-950 text-sm">{{ $who }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">End Renovation Chaos Forever</h2>
        <p class="text-charcoal-400 mb-8">Join the waitlist for HSI OS early access.</p>
        <a href="{{ route('consultation') }}" class="btn-primary-lg">Get Early Access</a>
    </div>
</section>

@endsection
