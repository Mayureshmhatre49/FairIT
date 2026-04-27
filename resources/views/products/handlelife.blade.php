@extends('layouts.app')

@section('title', 'HandleLife OS — AI Operating System for Modern Families | FairIT Solutions')
@section('description', 'HandleLife OS is the AI operating system for modern family life. Health, finances, school, NRI services, and emergency management — intelligently orchestrated for busy families.')

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "SoftwareApplication",
            "@id": "{{ route('products.handlelife') }}#app",
            "name": "HandleLife OS",
            "url": "{{ route('products.handlelife') }}",
            "applicationCategory": "LifestyleApplication",
            "operatingSystem": "Web",
            "description": "The AI operating system for modern family life. Health, finances, school, NRI services, and emergency management — intelligently orchestrated.",
            "offers": { "@type": "Offer", "url": "{{ route('consultation') }}", "availability": "https://schema.org/PreOrder" },
            "creator": { "@id": "https://fairitsolutions.ch/#organization" },
            "featureList": "Family command centre, Health & wellness AI, Finance intelligence, School & schedule AI, NRI services, Emergency response"
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Products", "item": "{{ route('products.index') }}" },
                { "@type": "ListItem", "position": 3, "name": "HandleLife OS", "item": "{{ route('products.handlelife') }}" }
            ]
        }
    ]
}
</script>
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
                <a href="{{ route('consultation') }}" class="btn-primary-lg">Get Early Access</a>
                <a href="{{ route('contact') }}" class="btn-outline-white">Learn More</a>
            </div>
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
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">Take Back Control of Your Family Life</h2>
        <p class="text-charcoal-400 mb-8">Join the waitlist for HandleLife OS early access.</p>
        <a href="{{ route('consultation') }}" class="btn-primary-lg">Get Early Access</a>
    </div>
</section>

@endsection
