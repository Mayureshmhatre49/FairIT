@extends('layouts.app')

@section('title', 'AI Products — SarathiOS, HSI OS, HandleLife OS | FairIT Solutions')
@section('description', 'Explore our AI Operating Systems: SarathiOS for founders, HSI OS for interior design, and HandleLife OS for modern family life. Purpose-built AI products for real-world complexity.')

@section('schema')
<script type="application/ld+json" nonce="{{ csp_nonce() }}">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "CollectionPage",
            "@id": "{{ route('products.index') }}#webpage",
            "url": "{{ route('products.index') }}",
            "name": "AI Products — FairIT Solutions",
            "description": "Three purpose-built AI Operating Systems: SarathiOS, HSI OS, and HandleLife OS.",
            "isPartOf": { "@id": "https://fairitsolutions.ch/#website" }
        },
        {
            "@type": "ItemList",
            "name": "AI Operating Systems by FairIT Solutions",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "SarathiOS — Founder AI Operating System", "url": "{{ route('products.sarathios') }}" },
                { "@type": "ListItem", "position": 2, "name": "HSI OS — Interior Design AI Operating System", "url": "{{ route('products.hsios') }}" },
                { "@type": "ListItem", "position": 3, "name": "HandleLife OS — Family AI Operating System", "url": "{{ route('products.handlelife') }}" }
            ]
        },
        {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
                { "@type": "ListItem", "position": 2, "name": "Products", "item": "{{ route('products.index') }}" }
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
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('products.hero.label') }}</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{{ __('products.hero.title') }}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                {{ __('products.hero.subtitle') }}
            </p>
        </div>
    </div>
</section>

<section class="section-padding bg-charcoal-950">
    <div class="container-wide space-y-8">

        {{-- SarathiOS --}}
        <div data-animate class="bg-gradient-to-br from-brand-900/50 to-charcoal-900/80 rounded-3xl border border-brand-700/20 p-10 lg:p-14 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="badge bg-brand-600/20 text-brand-300 border-brand-500/20 mb-4">{{ __('products.sarathios.tag') }}</span>
                <h2 class="text-4xl font-bold text-white mb-4">{{ __('products.sarathios.name') }}</h2>
                <p class="text-charcoal-300 text-lg leading-relaxed mb-6">{{ __('products.sarathios.tagline') }}</p>
                <p class="text-charcoal-400 text-sm leading-relaxed mb-8">{{ __('products.sarathios.desc') }}</p>
                <div class="grid grid-cols-2 gap-3 mb-10">
                    @foreach(__('products.sarathios.features') as $f)
                    <div class="flex items-center gap-2 text-sm text-charcoal-300">
                        <svg class="w-3.5 h-3.5 text-brand-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $f }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('products.sarathios') }}" class="btn-primary-lg">{{ __('products.sarathios.cta') }}</a>
            </div>
            <div class="relative">
                <div class="bg-charcoal-950/60 rounded-2xl border border-white/10 p-6 backdrop-blur-sm">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-white font-bold text-sm">{{ __('products.sarathios.dashboard_title') }}</span>
                        <span class="badge bg-emerald-500/20 text-emerald-300 border-emerald-500/20">{{ __('products.sarathios.live_badge') }}</span>
                    </div>
                    @php $colors = ['emerald', 'blue', 'violet', 'amber']; @endphp
                    @foreach(__('products.sarathios.metrics') as $i => $metric)
                    <div class="flex justify-between items-center py-3 border-b border-white/5 last:border-0">
                        <span class="text-charcoal-400 text-sm">{{ $metric['label'] }}</span>
                        <span class="font-bold text-{{ $colors[$i] }}-400 text-sm">{{ $metric['value'] }}</span>
                    </div>
                    @endforeach
                    <div class="mt-6 bg-brand-600/10 rounded-xl p-4 border border-brand-500/20">
                        <div class="text-xs text-charcoal-400 mb-2">{{ __('products.sarathios.insight_label') }}</div>
                        <p class="text-white text-sm">{{ __('products.sarathios.insight_text') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- HSI OS --}}
        <div data-animate data-animate-delay="100" class="bg-gradient-to-br from-emerald-900/50 to-charcoal-900/80 rounded-3xl border border-emerald-700/20 p-10 lg:p-14 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1 relative">
                <div class="bg-charcoal-950/60 rounded-2xl border border-white/10 p-6 backdrop-blur-sm">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-white font-bold text-sm">{{ __('products.hsios.dashboard_title') }}</span>
                        <span class="badge bg-amber-500/20 text-amber-300 border-amber-500/20">{{ __('products.hsios.progress_badge') }}</span>
                    </div>
                    @foreach(__('products.hsios.bars') as $bar)
                    <div class="mb-4">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-charcoal-400">{{ $bar['label'] }}</span>
                            <span class="text-white font-medium">{{ $bar['value'] }}</span>
                        </div>
                        <div class="h-1.5 bg-white/5 rounded-full">
                            <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $bar['pct'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-4 bg-emerald-600/10 rounded-xl p-4 border border-emerald-500/20">
                        <div class="text-xs text-charcoal-400 mb-2">{{ __('products.hsios.alert_label') }}</div>
                        <p class="text-white text-sm">{{ __('products.hsios.alert_text') }}</p>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <span class="badge bg-emerald-600/20 text-emerald-300 border-emerald-500/20 mb-4">{{ __('products.hsios.tag') }}</span>
                <h2 class="text-4xl font-bold text-white mb-4">{{ __('products.hsios.name') }}</h2>
                <p class="text-charcoal-300 text-lg leading-relaxed mb-6">{{ __('products.hsios.tagline') }}</p>
                <p class="text-charcoal-400 text-sm leading-relaxed mb-8">{{ __('products.hsios.desc') }}</p>
                <div class="grid grid-cols-2 gap-3 mb-10">
                    @foreach(__('products.hsios.features') as $f)
                    <div class="flex items-center gap-2 text-sm text-charcoal-300">
                        <svg class="w-3.5 h-3.5 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $f }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('products.hsios') }}" class="btn-primary-lg">{{ __('products.hsios.cta') }}</a>
            </div>
        </div>

        {{-- HandleLife OS --}}
        <div data-animate data-animate-delay="200" class="bg-gradient-to-br from-violet-900/50 to-charcoal-900/80 rounded-3xl border border-violet-700/20 p-10 lg:p-14 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="badge bg-violet-600/20 text-violet-300 border-violet-500/20 mb-4">{{ __('products.handlelife.tag') }}</span>
                <h2 class="text-4xl font-bold text-white mb-4">{{ __('products.handlelife.name') }}</h2>
                <p class="text-charcoal-300 text-lg leading-relaxed mb-6">{{ __('products.handlelife.tagline') }}</p>
                <p class="text-charcoal-400 text-sm leading-relaxed mb-8">{{ __('products.handlelife.desc') }}</p>
                <div class="grid grid-cols-2 gap-3 mb-10">
                    @foreach(__('products.handlelife.features') as $f)
                    <div class="flex items-center gap-2 text-sm text-charcoal-300">
                        <svg class="w-3.5 h-3.5 text-violet-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $f }}
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('products.handlelife') }}" class="btn-primary-lg">{{ __('products.handlelife.cta') }}</a>
            </div>
            <div class="relative">
                <div class="bg-charcoal-950/60 rounded-2xl border border-white/10 p-6 backdrop-blur-sm">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-white font-bold text-sm">{{ __('products.handlelife.dashboard_title') }}</span>
                        <span class="badge bg-violet-500/20 text-violet-300 border-violet-500/20">{{ __('products.handlelife.active_badge') }}</span>
                    </div>
                    @php $hlColors = ['violet', 'emerald', 'amber', 'red']; @endphp
                    @foreach(__('products.handlelife.metrics') as $i => $item)
                    <div class="flex justify-between items-center py-3 border-b border-white/5 last:border-0">
                        <span class="text-charcoal-400 text-sm">{{ $item['label'] }}</span>
                        <span class="font-medium text-{{ $hlColors[$i] }}-400 text-sm">{{ $item['value'] }}</span>
                    </div>
                    @endforeach
                    <div class="mt-4 bg-violet-600/10 rounded-xl p-4 border border-violet-500/20">
                        <div class="text-xs text-charcoal-400 mb-2">{{ __('products.handlelife.reminder_label') }}</div>
                        <p class="text-white text-sm">{{ __('products.handlelife.reminder_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding-sm bg-white">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-charcoal-950 mb-4">{{ __('products.cta.title') }}</h2>
        <p class="text-charcoal-500 mb-8">{{ __('products.cta.subtitle') }}</p>
        <a href="{{ route('consultation') }}" class="btn-primary-lg">{{ __('products.cta.button') }}</a>
    </div>
</section>

@endsection
