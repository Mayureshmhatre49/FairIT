@extends('layouts.app')

@section('title', 'About FairIT Solutions — AI Consulting Anchored in Enterprise Delivery')
@section('description', 'Two decades of enterprise software delivery across 16 industries — now powering strategic AI consulting and custom AI Operating Systems for founders and growth-focused enterprises.')

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

{{-- Delivery credentials — the engineering pedigree behind the AI positioning --}}
<section class="bg-white pb-20" aria-label="Delivery credentials">
    <div class="container-wide">
        <div class="bg-charcoal-950 rounded-2xl p-8 lg:p-12 relative overflow-hidden" data-animate>
            <div class="absolute inset-0 hero-grid opacity-20"></div>
            <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 80% at 100% 0%, rgba(37,99,235,0.18) 0%, transparent 70%);"></div>
            <div class="relative">
                <div class="max-w-3xl">
                    <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">Engineering pedigree</span>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mt-3 leading-tight">Two decades of enterprise software delivery, now applied to the AI era.</h2>
                    <p class="text-charcoal-300 text-base md:text-lg mt-6 leading-relaxed">Long before generative AI, our team was shipping the systems on which AI now sits — healthcare EMRs at hospital scale, multi-payer insurance verification platforms, peer-to-peer FinTech marketplaces, eGovernance survey platforms used by state governments, and global advertising data engines. The same engineering rigor now powers our AI consulting and custom AI Operating System work.</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 mt-10 pt-10 border-t border-white/10">
                    <div>
                        <div class="text-3xl lg:text-4xl font-black text-white">60+</div>
                        <div class="text-xs text-charcoal-400 mt-1.5 uppercase tracking-wider font-medium">Projects delivered</div>
                    </div>
                    <div>
                        <div class="text-3xl lg:text-4xl font-black text-white">16</div>
                        <div class="text-xs text-charcoal-400 mt-1.5 uppercase tracking-wider font-medium">Industries served</div>
                    </div>
                    <div>
                        <div class="text-3xl lg:text-4xl font-black text-white">47</div>
                        <div class="text-xs text-charcoal-400 mt-1.5 uppercase tracking-wider font-medium">Named clients</div>
                    </div>
                    <div>
                        <div class="text-3xl lg:text-4xl font-black text-white">20+</div>
                        <div class="text-xs text-charcoal-400 mt-1.5 uppercase tracking-wider font-medium">Years of founder experience</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="{{ route('case-studies.index') }}" class="inline-flex items-center gap-1 text-brand-300 hover:text-white font-semibold text-sm transition-colors">
                        Explore the full case study portfolio
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
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

{{-- Meet the Founders --}}
<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">Meet the founders</span>
            <h2 class="section-title mt-3">The humans behind the systems</h2>
            <p class="section-subtitle mt-4 mx-auto">Two operators. One conviction: AI should serve humans, not the other way round.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 max-w-6xl mx-auto" data-animate data-animate-delay="100">

            {{-- Nishant --}}
            <article class="bg-charcoal-50 rounded-2xl p-6 lg:p-8 border border-charcoal-100 hover:border-brand-200 transition-colors flex flex-col" x-data="{ open: false }">
                <header class="flex items-start gap-4 mb-5">
                    @if(file_exists(public_path('images/founders/nishant.jpg')))
                    <img src="{{ asset('images/founders/nishant.jpg') }}" alt="Nishant Mhatre — Co-Founder &amp; CEO of FairIT Solutions" class="w-20 h-20 rounded-2xl object-cover flex-shrink-0" loading="lazy" width="80" height="80">
                    @else
                    <div class="w-20 h-20 rounded-2xl bg-brand-600 text-white flex items-center justify-center text-xl font-bold flex-shrink-0">NM</div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-bold text-charcoal-950">Nishant Mhatre</h3>
                        <p class="text-brand-600 text-sm font-medium">Co-Founder &amp; CEO</p>
                        <p class="text-xs text-charcoal-500 mt-1 leading-relaxed">20+ years across telecom, real estate &amp; AI · USA, UK, EU, AU, NZ, India</p>
                    </div>
                </header>

                <p class="text-charcoal-700 text-sm leading-relaxed mb-3">I bridge real estate, technology, and AI to build future-ready ecosystems — leveraging 20+ years of international experience to create value for investors, businesses, and communities.</p>

                <div x-show="open" x-collapse class="text-charcoal-600 text-sm leading-relaxed space-y-3 mb-3">
                    <p>After a decade of driving large-scale telecom and digital transformation programmes across the USA, UK, Europe, Australia, New Zealand, and India, I transitioned into real estate entrepreneurship, founding a premium villa brand that reimagines luxury living through design, sustainability, and hospitality partnerships.</p>
                    <p class="font-medium text-charcoal-800">My entrepreneurial journey is fuelled by a passion for innovation and impact:</p>
                    <ul class="space-y-2 list-none pl-0">
                        <li class="flex gap-2"><span class="text-brand-500 mt-1">▸</span><span>Designing and developing investment-ready luxury villa communities powered by clean energy and managed for long-term returns.</span></li>
                        <li class="flex gap-2"><span class="text-brand-500 mt-1">▸</span><span>Advising businesses on AI-driven digital transformation, from intelligent customer engagement to scalable automation.</span></li>
                        <li class="flex gap-2"><span class="text-brand-500 mt-1">▸</span><span>Mentoring early-stage startups, helping founders sharpen business models, craft investor pitches, and accelerate growth.</span></li>
                    </ul>
                    <p>I thrive at the intersection of vision and execution — taking bold ideas, shaping them into market-ready ventures, and building collaborative ecosystems that create lasting value.</p>
                    <p>Today, my focus is on bridging real estate, technology, and AI to unlock new opportunities for investors, businesses, and communities. I believe the next decade belongs to entrepreneurs who can merge sustainability with intelligence — and I am committed to leading that change.</p>
                </div>

                <button type="button" @click="open = !open" class="text-xs font-semibold text-brand-600 hover:text-brand-800 transition-colors inline-flex items-center gap-1 mb-5 self-start">
                    <span x-text="open ? 'Show less' : 'Read full bio'"></span>
                    <svg class="w-3 h-3 transition-transform" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <footer class="flex items-center gap-4 pt-4 border-t border-charcoal-100 mt-auto">
                    <a href="mailto:Nishant@fairitsolutions.in" class="text-xs font-medium text-brand-600 hover:text-brand-800 transition-colors">Nishant@fairitsolutions.in</a>
                    <a href="https://www.linkedin.com/in/nishantmhatre/" target="_blank" rel="noopener" class="text-xs font-medium text-charcoal-500 hover:text-brand-600 transition-colors inline-flex items-center gap-1">
                        LinkedIn
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </footer>
            </article>

            {{-- Annemarie --}}
            <article class="bg-charcoal-50 rounded-2xl p-6 lg:p-8 border border-charcoal-100 hover:border-brand-200 transition-colors flex flex-col" x-data="{ open: false }">
                <header class="flex items-start gap-4 mb-5">
                    @if(file_exists(public_path('images/founders/annemarie.jpg')))
                    <img src="{{ asset('images/founders/annemarie.jpg') }}" alt="Annemarie M. Sickeler — Co-Founder of FairIT Solutions" class="w-20 h-20 rounded-2xl object-cover flex-shrink-0" loading="lazy" width="80" height="80">
                    @else
                    <div class="w-20 h-20 rounded-2xl bg-amber-600 text-white flex items-center justify-center text-xl font-bold flex-shrink-0">AMS</div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-bold text-charcoal-950">Annemarie M. Sickeler</h3>
                        <p class="text-brand-600 text-sm font-medium">Co-Founder</p>
                        <p class="text-xs text-charcoal-500 mt-1 leading-relaxed">Partner at Hestia Villas · University of St. Gallen (HSG) alumna</p>
                    </div>
                </header>

                <p class="text-charcoal-700 text-sm leading-relaxed mb-3">An entrepreneur with a strong background in organisational management, brand leadership, and luxury-focused businesses, shaped by international expatriate experience across diverse business cultures.</p>

                <div x-show="open" x-collapse class="text-charcoal-600 text-sm leading-relaxed space-y-3 mb-3">
                    <p>Annemarie is a Partner at Hestia Villas and an alumna of the University of St. Gallen (HSG). She has lived and worked internationally as an expatriate, gaining extensive exposure to diverse business cultures and global markets.</p>
                    <p>Her long-standing involvement in the international fashion industry — as a founder and owner of a global fashion brand — has shaped her deep understanding of luxury, aesthetics, material sensibility, and attention to detail. This experience informs her perspective on residential design, where quality, proportion, and timeless elegance are central to creating refined living environments.</p>
                    <p>At Hestia Villas, Annemarie plays a key role in overseeing day-to-day operations, organisational structure, and business expansion, while safeguarding the brand's design integrity and luxury positioning. Her involvement ensures that every Hestia Villas project reflects coherence, sophistication, and a consistently elevated standard, aligned with the expectations of discerning UHNI clients.</p>
                </div>

                <button type="button" @click="open = !open" class="text-xs font-semibold text-brand-600 hover:text-brand-800 transition-colors inline-flex items-center gap-1 mb-5 self-start">
                    <span x-text="open ? 'Show less' : 'Read full bio'"></span>
                    <svg class="w-3 h-3 transition-transform" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <footer class="flex items-center gap-4 pt-4 border-t border-charcoal-100 mt-auto">
                    <a href="mailto:Annemarie@fairitsolutions.ch" class="text-xs font-medium text-brand-600 hover:text-brand-800 transition-colors">Annemarie@fairitsolutions.ch</a>
                    <a href="https://www.linkedin.com/in/annemariesickeler/" target="_blank" rel="noopener" class="text-xs font-medium text-charcoal-500 hover:text-brand-600 transition-colors inline-flex items-center gap-1">
                        LinkedIn
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </footer>
            </article>

            {{-- Sanjay --}}
            <article class="bg-charcoal-50 rounded-2xl p-6 lg:p-8 border border-charcoal-100 hover:border-brand-200 transition-colors flex flex-col" x-data="{ open: false }">
                <header class="flex items-start gap-4 mb-5">
                    @if(file_exists(public_path('images/founders/sanjay.jpg')))
                    <img src="{{ asset('images/founders/sanjay.jpg') }}" alt="Sanjay Joshi — Co-Founder of FairIT Solutions" class="w-20 h-20 rounded-2xl object-cover flex-shrink-0" loading="lazy" width="80" height="80">
                    @else
                    <div class="w-20 h-20 rounded-2xl bg-emerald-600 text-white flex items-center justify-center text-xl font-bold flex-shrink-0">SJ</div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-bold text-charcoal-950">Sanjay Joshi</h3>
                        <p class="text-brand-600 text-sm font-medium">Co-Founder</p>
                        <p class="text-xs text-charcoal-500 mt-1 leading-relaxed">2 decades across IT, Manufacturing, Agriculture &amp; Direct Selling · Boston &amp; Pune</p>
                    </div>
                </header>

                <p class="text-charcoal-700 text-sm leading-relaxed mb-3">Entrepreneur, management consultant, corporate trainer and teacher with two decades of experience translating complex technology into clear business outcomes for clients in India and abroad.</p>

                <div x-show="open" x-collapse class="text-charcoal-600 text-sm leading-relaxed space-y-3 mb-3">
                    <p>Sanjay has been instrumental in providing technology and management consulting to numerous clients across India and overseas. He continuously studies emerging technologies and their applicability in today's world, and currently serves on the panel of four companies providing technology and management support.</p>
                    <p>He has an uncanny ability to translate the complex technical world into layman terms, helping people understand how technology can be implemented simply to make life easier. As a corporate trainer, he has worked with organisations in manufacturing, warehouse management, and B2B/B2C segments.</p>
                    <p>Sanjay runs the <strong>Sunjay Joshi Training Academy</strong>, where courses are conducted on the impact of social media in marketing — equipping businesses to use social platforms as a tool to boost sales and build product awareness.</p>
                    <p class="font-medium text-charcoal-800">Current &amp; recent roles:</p>
                    <ul class="space-y-2 list-none pl-0">
                        <li class="flex gap-2"><span class="text-brand-500 mt-1">▸</span><span>Chief Technology Officer — Ellora Systems (2021–present)</span></li>
                        <li class="flex gap-2"><span class="text-brand-500 mt-1">▸</span><span>Co-Founder — Boston Byte LLC, Greater Boston (2016–present)</span></li>
                        <li class="flex gap-2"><span class="text-brand-500 mt-1">▸</span><span>Director — Dynamic Corporate Solutions Pvt. Ltd., Pune</span></li>
                        <li class="flex gap-2"><span class="text-brand-500 mt-1">▸</span><span>Founder Director — xPointers Consulting Private Limited</span></li>
                    </ul>
                    <p>Before entrepreneurship, Sanjay worked with Tata Consultancy Services (Head — Composite Applications, SAP xMII), Infodat Inc., and Al-Hind Enterprises. He is a Master in Economics, Post Graduate in Business Management (MBA — Operations &amp; Marketing, Symbiosis), and a Mechanical Engineer from Savitribai Phule Pune University. He is also a member of ISPI.</p>
                    <p class="text-charcoal-500 text-xs italic">Specialties: industry analysis, business process mapping, system analysis, and solution architecture.</p>
                </div>

                <button type="button" @click="open = !open" class="text-xs font-semibold text-brand-600 hover:text-brand-800 transition-colors inline-flex items-center gap-1 mb-5 self-start">
                    <span x-text="open ? 'Show less' : 'Read full bio'"></span>
                    <svg class="w-3 h-3 transition-transform" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <footer class="flex items-center gap-4 pt-4 border-t border-charcoal-100 mt-auto">
                    <a href="mailto:Sanjay@fairitsolutions.in" class="text-xs font-medium text-brand-600 hover:text-brand-800 transition-colors">Sanjay@fairitsolutions.in</a>
                    <a href="https://www.linkedin.com/in/joshisanjay/" target="_blank" rel="noopener" class="text-xs font-medium text-charcoal-500 hover:text-brand-600 transition-colors inline-flex items-center gap-1">
                        LinkedIn
                    </a>
                </footer>
            </article>
        </div>
    </div>
</section>

{{-- Approach --}}
<section class="section-padding bg-charcoal-50">
    <div class="container-tight">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">{{ __('about.approach.label') }}</span>
            <h2 class="section-title mt-3">{{ __('about.approach.title') }}</h2>
        </div>
        <div class="space-y-6">
            @foreach(__('about.approach.steps') as $item)
            <div data-animate class="flex items-start gap-6 p-6 rounded-2xl bg-white border border-charcoal-100 hover:border-brand-200 hover:shadow-card transition-all">
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
