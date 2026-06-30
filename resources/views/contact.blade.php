@extends('layouts.app')

@section('title', 'Contact FairIT Solutions — Get in Touch')
@section('description', 'Contact FairIT Solutions to discuss your AI needs. We respond within 24 hours. Headquartered in Pune, India, with offices in Switzerland and Germany.')

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "ContactPage",
            "@id": "{{ route('contact') }}#webpage",
            "url": "{{ route('contact') }}",
            "name": "Contact FairIT Solutions",
            "description": "Contact FairIT Solutions to discuss your AI needs. We respond within 24 hours.",
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" },
            "mainEntity": { "@id": "https://fairitsolutions.ch/#organization" }
        },
        {
            "@type": "Organization",
            "@id": "https://fairitsolutions.ch/#organization",
            "name": "FairIT Solutions",
            "legalName": "TRNM Digital Consulting LLP",
            "alternateName": "FairIT Solutions",
            "url": "https://fairitsolutions.ch",
            "sameAs": [
                "https://www.linkedin.com/company/fair-it-solutions/",
                "https://www.facebook.com/FairITSolutions/"
            ],
            "address": [
                {
                    "@type": "PostalAddress",
                    "streetAddress": "B 706, Teerth Technospace, Mumbai Bangalore Highway, Baner",
                    "postalCode": "411045",
                    "addressLocality": "Pune",
                    "addressRegion": "Maharashtra",
                    "addressCountry": "IN"
                },
                {
                    "@type": "PostalAddress",
                    "streetAddress": "Glärnischstrasse 7",
                    "postalCode": "9524",
                    "addressLocality": "Zuzwil",
                    "addressCountry": "CH"
                },
                {
                    "@type": "PostalAddress",
                    "streetAddress": "Steinstrasse 25",
                    "postalCode": "20095",
                    "addressLocality": "Hamburg",
                    "addressCountry": "DE"
                },
                {
                    "@type": "PostalAddress",
                    "streetAddress": "House No. 518, At Post Dhokawade (Bhag), Taluka Alibag",
                    "postalCode": "402201",
                    "addressLocality": "Raigad",
                    "addressRegion": "Maharashtra",
                    "addressCountry": "IN"
                }
            ]
        },
        {
            "@type": "Person",
            "@id": "https://fairitsolutions.ch/about#nishant",
            "name": "Nishant Mhatre",
            "givenName": "Nishant",
            "familyName": "Mhatre",
            "jobTitle": "Co-Founder & CEO",
            "description": "Bridges real estate, technology, and AI to build future-ready ecosystems. 20+ years across telecom, digital transformation, and real-estate entrepreneurship in the USA, UK, Europe, Australia, New Zealand, and India.",
            "worksFor": { "@id": "https://fairitsolutions.ch/#organization" },
            "email": "Nishant@fairitsolutions.in",
            "sameAs": ["https://www.linkedin.com/in/nishantmhatre/"],
            "knowsAbout": ["Artificial Intelligence", "Digital Transformation", "Real Estate", "Telecom", "AI Strategy", "Voice AI", "Startup Advisory"]
        },
        {
            "@type": "Person",
            "@id": "https://fairitsolutions.ch/about#annemarie",
            "name": "Annemarie M. Sickeler",
            "givenName": "Annemarie",
            "familyName": "Sickeler",
            "jobTitle": "Co-Founder",
            "description": "Entrepreneur with deep experience in organisational management, brand leadership, and luxury businesses. Partner at Hestia Villas and an alumna of the University of St. Gallen (HSG).",
            "alumniOf": { "@type": "CollegeOrUniversity", "name": "University of St. Gallen (HSG)", "url": "https://www.unisg.ch" },
            "worksFor": { "@id": "https://fairitsolutions.ch/#organization" },
            "email": "Annemarie@fairitsolutions.ch",
            "sameAs": ["https://www.linkedin.com/in/annemariesickeler/"],
            "knowsAbout": ["Organisational Management", "Brand Leadership", "Luxury Business", "Hospitality", "Residential Design"]
        },
        {
            "@type": "Person",
            "@id": "https://fairitsolutions.ch/about#sanjay",
            "name": "Sanjay Joshi",
            "givenName": "Sanjay",
            "familyName": "Joshi",
            "jobTitle": "Co-Founder & CTO",
            "description": "Entrepreneur, management consultant, corporate trainer and teacher with two decades of experience translating complex technology into clear business outcomes.",
            "worksFor": { "@id": "https://fairitsolutions.ch/#organization" },
            "email": "Sanjay@fairitsolutions.in",
            "sameAs": ["https://www.linkedin.com/in/joshisanjay/"],
            "knowsAbout": ["Information Technology", "Management Consulting", "Corporate Training", "Systems Analysis", "Solution Architecture", "Social Media Marketing"]
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Contact", "item": "{{ route('contact') }}" }
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
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('contact.hero.label') }}</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{{ __('contact.hero.title') }}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-xl mx-auto leading-relaxed">
                {{ __('contact.hero.subtitle') }}
            </p>
        </div>
    </div>
</section>

{{-- Our Offices --}}
<section class="bg-white pt-16 md:pt-20 pb-4">
    <div class="container-wide">
        <div class="text-center mb-10" data-animate>
            <span class="text-brand-600 font-semibold text-sm uppercase tracking-widest">Our Offices</span>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-charcoal-950 mt-3 leading-tight">Where to Find Us</h2>
            <p class="text-charcoal-600 text-base md:text-lg mt-4 max-w-2xl mx-auto">Headquartered in Pune, India, with offices in Switzerland, Germany, and a registered office in Alibag.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- Pune HQ --}}
            <div data-animate class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-100 flex flex-col">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-2xl leading-none" aria-hidden="true">🇮🇳</span>
                    <div class="flex-1">
                        <div class="font-bold text-charcoal-950 text-sm">India — Pune</div>
                        <div class="text-[11px] uppercase tracking-widest text-brand-600 font-semibold">Headquarters</div>
                    </div>
                </div>
                <address class="text-sm text-charcoal-700 leading-relaxed not-italic flex-1">
                    FairIT Solutions<br>
                    B 706, Teerth Technospace<br>
                    Mumbai Bangalore Highway<br>
                    Baner, Pune 411045
                </address>
                <a href="https://www.google.com/maps/search/?api=1&query=Teerth+Technospace%2C+Baner%2C+Pune+411045" target="_blank" rel="noopener" class="text-xs font-semibold text-brand-600 hover:text-brand-700 mt-4 inline-flex items-center gap-1">
                    View on Maps
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>

            {{-- Switzerland --}}
            <div data-animate data-animate-delay="100" class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-100 flex flex-col">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-2xl leading-none" aria-hidden="true">🇨🇭</span>
                    <div class="flex-1">
                        <div class="font-bold text-charcoal-950 text-sm">Switzerland</div>
                        <div class="text-[11px] uppercase tracking-widest text-charcoal-400 font-semibold">Zuzwil Office</div>
                    </div>
                </div>
                <address class="text-sm text-charcoal-700 leading-relaxed not-italic flex-1">
                    FairIT Solutions<br>
                    Glärnischstrasse 7<br>
                    9524 Zuzwil<br>
                    Switzerland
                </address>
                <a href="https://www.google.com/maps/search/?api=1&query=Gl%C3%A4rnischstrasse+7%2C+9524+Zuzwil%2C+Switzerland" target="_blank" rel="noopener" class="text-xs font-semibold text-brand-600 hover:text-brand-700 mt-4 inline-flex items-center gap-1">
                    View on Maps
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>

            {{-- Germany --}}
            <div data-animate data-animate-delay="200" class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-100 flex flex-col">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-2xl leading-none" aria-hidden="true">🇩🇪</span>
                    <div class="flex-1">
                        <div class="font-bold text-charcoal-950 text-sm">Germany</div>
                        <div class="text-[11px] uppercase tracking-widest text-charcoal-400 font-semibold">Hamburg Office</div>
                    </div>
                </div>
                <address class="text-sm text-charcoal-700 leading-relaxed not-italic flex-1">
                    FairIT Solutions<br>
                    Steinstrasse 25<br>
                    20095 Hamburg<br>
                    Germany
                </address>
                <a href="https://www.google.com/maps/search/?api=1&query=Steinstrasse+25%2C+20095+Hamburg%2C+Germany" target="_blank" rel="noopener" class="text-xs font-semibold text-brand-600 hover:text-brand-700 mt-4 inline-flex items-center gap-1">
                    View on Maps
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>

            {{-- Alibag --}}
            <div data-animate data-animate-delay="300" class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-100 flex flex-col">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-2xl leading-none" aria-hidden="true">🇮🇳</span>
                    <div class="flex-1">
                        <div class="font-bold text-charcoal-950 text-sm">India — Alibag</div>
                        <div class="text-[11px] uppercase tracking-widest text-charcoal-400 font-semibold">Registered Office</div>
                    </div>
                </div>
                <address class="text-sm text-charcoal-700 leading-relaxed not-italic flex-1">
                    FairIT Solutions<br>
                    House No. 518, At Post Dhokawade (Bhag)<br>
                    Taluka Alibag, District Raigad<br>
                    Maharashtra 402201
                </address>
                <a href="https://www.google.com/maps/search/?api=1&query=Dhokawade%2C+Alibag%2C+Raigad%2C+Maharashtra+402201" target="_blank" rel="noopener" class="text-xs font-semibold text-brand-600 hover:text-brand-700 mt-4 inline-flex items-center gap-1">
                    View on Maps
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>

        </div>

        {{-- Legal entity disclosure --}}
        <p class="text-xs text-charcoal-500 text-center mt-8" data-animate>
            <strong class="text-charcoal-700">FairIT Solutions</strong> is a brand of <strong class="text-charcoal-700">TRNM Digital Consulting LLP</strong>, a Limited Liability Partnership incorporated in India.
        </p>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Founders & Contact Info --}}
            <div data-animate class="lg:col-span-1 space-y-8">
                {{-- Meet the Founders --}}
                <div class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100">
                    <h2 class="text-xl font-bold text-charcoal-950 mb-6">{{ __('contact.founders.title') }}</h2>
                    <div class="space-y-6">
                        {{-- Nishant --}}
                        <div class="flex items-center gap-4">
                            @if(file_exists(public_path('images/founders/nishant.jpg')))
                            <img src="{{ asset('images/founders/nishant.jpg') }}" alt="Nishant Mhatre" class="w-14 h-14 rounded-xl object-cover flex-shrink-0 shadow-sm" loading="lazy" width="56" height="56">
                            @else
                            <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold bg-brand-600 text-white shadow-glow-sm">NM</div>
                            @endif
                            <div class="flex-1">
                                <p class="font-bold text-charcoal-950 text-base">Nishant Mhatre</p>
                                <p class="text-xs text-charcoal-500 mb-2">{{ __('contact.founders.nishant.role') }}</p>
                                <div class="space-y-1">
                                    <a href="mailto:Nishant@fairitsolutions.in" class="text-xs font-medium text-brand-600 hover:text-brand-700 block transition-colors">Nishant@fairitsolutions.in</a>
                                    <a href="https://www.linkedin.com/in/nishantmhatre/" target="_blank" rel="noopener" class="text-xs font-medium text-charcoal-400 hover:text-brand-600 block transition-colors">LinkedIn</a>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-charcoal-100"></div>

                        {{-- Annemarie --}}
                        <div class="flex items-center gap-4">
                            @if(file_exists(public_path('images/founders/annemarie.jpg')))
                            <img src="{{ asset('images/founders/annemarie.jpg') }}" alt="Annemarie M. Sickeler" class="w-14 h-14 rounded-xl object-cover flex-shrink-0 shadow-sm" loading="lazy" width="56" height="56">
                            @else
                            <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold bg-amber-600 text-white shadow-glow-sm">AMS</div>
                            @endif
                            <div class="flex-1">
                                <p class="font-bold text-charcoal-950 text-base">Annemarie M. Sickeler</p>
                                <p class="text-xs text-charcoal-500 mb-2">{{ __('contact.founders.annemarie.role') }}</p>
                                <div class="space-y-1">
                                    <a href="mailto:Annemarie@fairitsolutions.ch" class="text-xs font-medium text-brand-600 hover:text-brand-700 block transition-colors">Annemarie@fairitsolutions.ch</a>
                                    <a href="https://www.linkedin.com/in/annemariesickeler/" target="_blank" rel="noopener" class="text-xs font-medium text-charcoal-400 hover:text-brand-600 block transition-colors">LinkedIn</a>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-charcoal-100"></div>

                        {{-- Sanjay --}}
                        <div class="flex items-center gap-4">
                            @if(file_exists(public_path('images/founders/sanjay.jpg')))
                            <img src="{{ asset('images/founders/sanjay.jpg') }}" alt="Sanjay Joshi" class="w-14 h-14 rounded-xl object-cover flex-shrink-0 shadow-sm" loading="lazy" width="56" height="56">
                            @else
                            <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold bg-emerald-600 text-white shadow-glow-sm">SJ</div>
                            @endif
                            <div class="flex-1">
                                <p class="font-bold text-charcoal-950 text-base">Sanjay Joshi</p>
                                <p class="text-xs text-charcoal-500 mb-2">Co-Founder &amp; CTO</p>
                                <div class="space-y-1">
                                    <a href="mailto:Sanjay@fairitsolutions.in" class="text-xs font-medium text-brand-600 hover:text-brand-700 block transition-colors">Sanjay@fairitsolutions.in</a>
                                    <a href="https://www.linkedin.com/in/joshisanjay/" target="_blank" rel="noopener" class="text-xs font-medium text-charcoal-400 hover:text-brand-600 block transition-colors">LinkedIn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Information --}}
                <div>
                    <h2 class="text-2xl font-bold text-charcoal-950 mb-6">{{ __('contact.info.title') }}</h2>
                    <div class="space-y-4">
                        <a href="mailto:hello@fairitsolutions.ch" class="flex items-center gap-3 p-4 rounded-xl hover:bg-charcoal-50 transition-colors group">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center group-hover:bg-brand-100 transition-colors flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">{{ __('contact.info.email_label') }}</div>
                                <div class="text-charcoal-800 font-medium">hello@fairitsolutions.ch</div>
                            </div>
                        </a>
                        <a href="tel:+41789055040" class="flex items-center gap-3 p-4 rounded-xl hover:bg-charcoal-50 transition-colors group">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center group-hover:bg-brand-100 transition-colors flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">Switzerland 🇨🇭</div>
                                <div class="text-charcoal-800 font-medium">+41 78 905 50 40</div>
                            </div>
                        </a>
                        <a href="https://wa.me/919881149629" target="_blank" rel="noopener" class="flex items-center gap-3 p-4 rounded-xl hover:bg-charcoal-50 transition-colors group">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center group-hover:bg-emerald-100 transition-colors flex-shrink-0">
                                <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.817 11.817 0 018.413 3.488 11.824 11.824 0 013.48 8.414c-.003 6.554-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884a9.86 9.86 0 001.595 5.391l-.999 3.648 3.893-1.738z"/></svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-xs text-charcoal-400 font-medium">India 🇮🇳 · WhatsApp</div>
                                <div class="text-charcoal-800 font-medium">+91 98811 49629</div>
                            </div>
                        </a>
                        <div class="flex items-center gap-3 p-4 rounded-xl">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">{{ __('contact.info.location_label') }}</div>
                                <div class="text-charcoal-800 font-medium">{{ __('contact.info.location_value') }}</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-xl">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">{{ __('contact.info.response_label') }}</div>
                                <div class="text-charcoal-800 font-medium">{{ __('contact.info.response_value') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-charcoal-950 rounded-2xl p-6 text-white">
                    <h3 class="font-bold mb-3">{{ __('contact.info.book_title') }}</h3>
                    <p class="text-charcoal-400 text-sm mb-5">{{ __('contact.info.book_subtitle') }}</p>
                    <a href="{{ route('consultation') }}" class="btn-primary w-full justify-center">{{ __('contact.info.book_cta') }}</a>
                </div>
            </div>

            {{-- Contact Form --}}
            <div data-animate data-animate-delay="200" class="lg:col-span-2">
                <div class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100">
                    <h2 class="text-2xl font-bold text-charcoal-950 mb-8">{{ __('contact.form.title') }}</h2>

                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                        <ul class="text-sm text-red-700 space-y-1">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Honeypot --}}
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="honeypot" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="form-label">{{ __('contact.form.name_label') }} <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('contact.form.name_placeholder') }}" class="form-input @error('name') border-red-400 @enderror" required>
                                @error('name')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="form-label">{{ __('contact.form.email_label') }} <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('contact.form.email_placeholder') }}" class="form-input @error('email') border-red-400 @enderror" required>
                                @error('email')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="company" class="form-label">{{ __('contact.form.company_label') }}</label>
                                <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="{{ __('contact.form.company_placeholder') }}" class="form-input">
                            </div>
                            <div>
                                <label for="phone" class="form-label">{{ __('contact.form.phone_label') }}</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="{{ __('contact.form.phone_placeholder') }}" class="form-input">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="form-label">{{ __('contact.form.subject_label') }} <span class="text-red-500">*</span></label>
                            <select id="subject" name="subject" class="form-input @error('subject') border-red-400 @enderror" required>
                                <option value="">{{ __('contact.form.subject_placeholder') }}</option>
                                @foreach(__('contact.form.subject_options') as $opt)
                                <option {{ old('subject') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                            @error('subject')<p class="form-error">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="message" class="form-label">{{ __('contact.form.message_label') }} <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="5" placeholder="{{ __('contact.form.message_placeholder') }}" class="form-input resize-none @error('message') border-red-400 @enderror" required>{{ old('message') }}</textarea>
                            @error('message')<p class="form-error">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="btn-primary w-full justify-center py-4 text-base">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            {{ __('contact.form.submit') }}
                        </button>

                        @include('partials.trust-badges')

                        <p class="text-xs text-charcoal-400 text-center">{{ __('contact.form.footer_note') }}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
