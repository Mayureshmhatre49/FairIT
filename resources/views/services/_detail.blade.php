@extends('layouts.app')

@section('title', $service['title'] . ' — FairIT Solutions')
@section('description', $service['description'])

@section('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "provider": { "@type": "Organization", "name": "FairIT Solutions", "url": "https://fairitsolutions.ch" },
    "name": "{{ $service['title'] }}",
    "description": "{{ $service['description'] }}"
}
</script>
@endsection

@section('content')

{{-- Hero --}}
<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 50% 60% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight">
        <div data-animate>
            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-charcoal-400 hover:text-white text-sm mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                {{ __('services.detail.all_services') }}
            </a>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest block mb-3">{{ __('services.detail.service_label') }}</span>
            <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-white leading-tight mb-6">{{ $service['title'] }}</h1>
            <p class="text-charcoal-300 text-xl font-medium italic mb-6">{{ $service['tagline'] }}</p>
            <p class="text-charcoal-400 text-lg leading-relaxed max-w-2xl">{{ $service['description'] }}</p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="{{ route($service['cta_route']) }}" class="btn-primary-lg">
                    {{ $service['cta_text'] }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="btn-outline-white">{{ __('services.detail.ask_question') }}</a>
            </div>
        </div>
    </div>
</section>

{{-- Benefits + Deliverables --}}
<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">

            {{-- Benefits --}}
            <div data-animate>
                <h2 class="text-2xl font-bold text-charcoal-950 mb-8">{{ __('services.detail.what_you_get') }}</h2>
                <div class="space-y-4">
                    @foreach($service['benefits'] as $i => $benefit)
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-charcoal-50 transition-colors">
                        <div class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center flex-shrink-0 text-sm font-bold text-brand-700">{{ $i + 1 }}</div>
                        <p class="text-charcoal-700 pt-1">{{ $benefit }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Deliverables --}}
            <div data-animate data-animate-delay="200">
                <h2 class="text-2xl font-bold text-charcoal-950 mb-8">{{ __('services.detail.deliverables') }}</h2>
                <div class="bg-charcoal-50 rounded-2xl p-8">
                    <div class="space-y-3">
                        @foreach($service['deliverables'] as $deliverable)
                        <div class="flex items-center gap-3 py-3 border-b border-charcoal-100 last:border-0">
                            <div class="w-6 h-6 rounded-full bg-brand-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-charcoal-800 font-medium text-sm">{{ $deliverable }}</span>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route($service['cta_route']) }}" class="btn-primary w-full justify-center mt-8">
                        {{ $service['cta_text'] }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Process --}}
<section class="section-padding bg-charcoal-50">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <span class="section-label">{{ __('services.detail.how_it_works') }}</span>
            <h2 class="section-title mt-3">{{ __('services.detail.engagement_process') }}</h2>
        </div>

        <div class="relative">
            <div class="hidden lg:block absolute top-8 left-0 right-0 h-px bg-gradient-to-r from-transparent via-brand-200 to-transparent"></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                @foreach($service['process'] as $step)
                <div data-animate data-animate-delay="{{ $loop->index * 100 }}" class="text-center relative">
                    <div class="w-16 h-16 rounded-2xl bg-charcoal-950 text-white flex items-center justify-center font-black text-lg mx-auto mb-4 relative z-10">{{ $step['step'] }}</div>
                    <h3 class="font-bold text-charcoal-950 mb-2">{{ $step['title'] }}</h3>
                    <p class="text-charcoal-500 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="section-padding bg-white">
    <div class="container-tight">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">{{ __('services.detail.common_questions') }}</span>
            <h2 class="section-title mt-3">{{ __('services.detail.faqs_title') }}</h2>
        </div>

        <div class="space-y-4" x-data="{ open: null }">
            @foreach($service['faqs'] as $i => $faq)
            <div data-animate data-animate-delay="{{ $i * 100 }}" class="border border-charcoal-100 rounded-2xl overflow-hidden hover:border-brand-200 transition-colors">
                <button @click="open === {{ $i }} ? open = null : open = {{ $i }}" class="w-full flex items-center justify-between gap-4 p-6 text-left hover:bg-charcoal-50 transition-colors" :aria-expanded="open === {{ $i }}">
                    <span class="font-semibold text-charcoal-950">{{ $faq['q'] }}</span>
                    <svg class="w-5 h-5 text-charcoal-400 flex-shrink-0 transition-transform" :class="{ 'rotate-180': open === {{ $i }} }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open === {{ $i }}" x-collapse class="px-6 pb-6">
                    <p class="text-charcoal-600 leading-relaxed">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">{{ __('services.detail.ready') }}</h2>
        <p class="text-charcoal-400 mb-8">{{ $service['description'] }}</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route($service['cta_route']) }}" class="btn-primary-lg">{{ $service['cta_text'] }}</a>
            <a href="{{ route('contact') }}" class="btn-outline-white">{{ __('services.detail.ask_question') }}</a>
        </div>
    </div>
</section>

@endsection
