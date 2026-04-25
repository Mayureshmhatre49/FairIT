@extends('layouts.app')

@section('title', 'AI Products — SarathiOS, HSI OS, HandleLife OS | FairIT Solutions')
@section('description', 'Explore our AI Operating Systems: SarathiOS for founders, HSI OS for interior design, and HandleLife OS for modern family life. Purpose-built AI products for real-world complexity.')

@section('content')

<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">Our Products</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">AI Operating Systems</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                Three purpose-built AI products solving real-world complexity — for founders who need leverage, homes that need intelligence, and lives that need order.
            </p>
        </div>
    </div>
</section>

<section class="section-padding bg-charcoal-950">
    <div class="container-wide space-y-8">

        {{-- SarathiOS --}}
        <div data-animate class="bg-gradient-to-br from-brand-900/50 to-charcoal-900/80 rounded-3xl border border-brand-700/20 p-10 lg:p-14 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="badge bg-brand-600/20 text-brand-300 border-brand-500/20 mb-4">Founder OS</span>
                <h2 class="text-4xl font-bold text-white mb-4">SarathiOS</h2>
                <p class="text-charcoal-300 text-lg leading-relaxed mb-6">The AI brain for startup founders, CEOs, and decision-makers. From growth strategy to team alignment — command your business from one intelligent system.</p>
                <p class="text-charcoal-400 text-sm leading-relaxed mb-8">
                    Built for founders who are done juggling spreadsheets, Notion docs, and WhatsApp chains. SarathiOS centralises your entire operating system into one AI-powered command centre — so you can move faster, decide better, and build smarter.
                </p>
                <div class="grid grid-cols-2 gap-3 mb-10">
                    @foreach(['Founder dashboard', 'Growth command centre', 'AI strategy copilot', 'Decision support engine', 'Team alignment tools', 'Fundraising readiness']) as $f)
                    <div class="flex items-center gap-2 text-sm text-charcoal-300">
                        <svg class="w-3.5 h-3.5 text-brand-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $f }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('products.sarathios') }}" class="btn-primary-lg">Explore SarathiOS →</a>
            </div>
            <div class="relative">
                <div class="bg-charcoal-950/60 rounded-2xl border border-white/10 p-6 backdrop-blur-sm">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-white font-bold text-sm">Growth Command Centre</span>
                        <span class="badge bg-emerald-500/20 text-emerald-300 border-emerald-500/20">Live</span>
                    </div>
                    @foreach([['Revenue', '+34%', 'emerald'], ['Pipeline', '₹2.4Cr', 'blue'], ['Team Velocity', '8.2/10', 'violet'], ['Burn Rate', 'On Track', 'amber']]) as $metric)
                    <div class="flex justify-between items-center py-3 border-b border-white/5 last:border-0">
                        <span class="text-charcoal-400 text-sm">{{ $metric[0] }}</span>
                        <span class="font-bold text-{{ $metric[2] }}-400 text-sm">{{ $metric[1] }}</span>
                    </div>
                    @endforeach
                    <div class="mt-6 bg-brand-600/10 rounded-xl p-4 border border-brand-500/20">
                        <div class="text-xs text-charcoal-400 mb-2">AI Copilot Insight</div>
                        <p class="text-white text-sm">"Based on Q3 data, prioritising enterprise channel could increase MRR by 28% in 90 days."</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- HSI OS --}}
        <div data-animate data-animate-delay="100" class="bg-gradient-to-br from-emerald-900/50 to-charcoal-900/80 rounded-3xl border border-emerald-700/20 p-10 lg:p-14 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1 relative">
                <div class="bg-charcoal-950/60 rounded-2xl border border-white/10 p-6 backdrop-blur-sm">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-white font-bold text-sm">Project Overview</span>
                        <span class="badge bg-amber-500/20 text-amber-300 border-amber-500/20">In Progress</span>
                    </div>
                    @foreach([['Timeline', 'Week 8/14', '57%'], ['Budget', '₹84L / 1.2Cr', '70%'], ['Tasks Done', '142/198', '72%']]) as $bar)
                    <div class="mb-4">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-charcoal-400">{{ $bar[0] }}</span>
                            <span class="text-white font-medium">{{ $bar[1] }}</span>
                        </div>
                        <div class="h-1.5 bg-white/5 rounded-full">
                            <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $bar[2] }}"></div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-4 bg-emerald-600/10 rounded-xl p-4 border border-emerald-500/20">
                        <div class="text-xs text-charcoal-400 mb-2">AI Alert</div>
                        <p class="text-white text-sm">"Tile delivery delayed 4 days. Timeline auto-adjusted. Contractor notified."</p>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <span class="badge bg-emerald-600/20 text-emerald-300 border-emerald-500/20 mb-4">Interior OS</span>
                <h2 class="text-4xl font-bold text-white mb-4">HSI OS</h2>
                <p class="text-charcoal-300 text-lg leading-relaxed mb-6">The AI brain for interior design, renovation, and home execution. For homeowners, architects, contractors, and interior firms.</p>
                <p class="text-charcoal-400 text-sm leading-relaxed mb-8">HSI OS ends the chaos of renovation. Intelligent project management, vendor coordination, budget tracking, and client communication — all automated and intelligent.</p>
                <div class="grid grid-cols-2 gap-3 mb-10">
                    @foreach(['Project timeline AI', 'Client portal', 'Vendor coordination', 'Budget intelligence', 'Progress tracking', 'Design brief AI']) as $f)
                    <div class="flex items-center gap-2 text-sm text-charcoal-300">
                        <svg class="w-3.5 h-3.5 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $f }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('products.hsios') }}" class="btn-primary-lg">Explore HSI OS →</a>
            </div>
        </div>

        {{-- HandleLife OS --}}
        <div data-animate data-animate-delay="200" class="bg-gradient-to-br from-violet-900/50 to-charcoal-900/80 rounded-3xl border border-violet-700/20 p-10 lg:p-14 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="badge bg-violet-600/20 text-violet-300 border-violet-500/20 mb-4">Life OS</span>
                <h2 class="text-4xl font-bold text-white mb-4">HandleLife OS</h2>
                <p class="text-charcoal-300 text-lg leading-relaxed mb-6">The AI brain for modern family life. For families, NRIs, busy professionals, and anyone who wants to live with less chaos and more clarity.</p>
                <p class="text-charcoal-400 text-sm leading-relaxed mb-8">HandleLife OS is your family's command centre. Health, finances, school, emergencies, and daily life — intelligently orchestrated so you can focus on what actually matters.</p>
                <div class="grid grid-cols-2 gap-3 mb-10">
                    @foreach(['Family command centre', 'Health & wellness AI', 'Finance intelligence', 'School & schedule AI', 'NRI services', 'Emergency response']) as $f)
                    <div class="flex items-center gap-2 text-sm text-charcoal-300">
                        <svg class="w-3.5 h-3.5 text-violet-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $f }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('products.handlelife') }}" class="btn-primary-lg">Explore HandleLife OS →</a>
            </div>
            <div class="relative">
                <div class="bg-charcoal-950/60 rounded-2xl border border-white/10 p-6 backdrop-blur-sm">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-white font-bold text-sm">Family Dashboard</span>
                        <span class="badge bg-violet-500/20 text-violet-300 border-violet-500/20">Active</span>
                    </div>
                    @foreach([['Health Check', '3 members due', 'violet'], ['Finances', 'CHF 4,200 saved', 'emerald'], ['School Events', '2 upcoming', 'amber'], ['Services', '1 renewal due', 'red']]) as $item)
                    <div class="flex justify-between items-center py-3 border-b border-white/5 last:border-0">
                        <span class="text-charcoal-400 text-sm">{{ $item[0] }}</span>
                        <span class="font-medium text-{{ $item[2] }}-400 text-sm">{{ $item[1] }}</span>
                    </div>
                    @endforeach
                    <div class="mt-4 bg-violet-600/10 rounded-xl p-4 border border-violet-500/20">
                        <div class="text-xs text-charcoal-400 mb-2">Life OS Reminder</div>
                        <p class="text-white text-sm">"Car insurance renewal in 14 days. Renewal quote ready — save 18%."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding-sm bg-white">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-charcoal-950 mb-4">Which AI OS Is Right for You?</h2>
        <p class="text-charcoal-500 mb-8">Book a discovery call and we'll help you find the perfect fit.</p>
        <a href="{{ route('consultation') }}" class="btn-primary-lg">Book Discovery Call</a>
    </div>
</section>

@endsection
