@extends('layouts.app')

@section('title', $industry['title'] . ' AI Solutions — FairIT Solutions')
@section('description', $industry['description'])

@section('content')

<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight">
        <div data-animate>
            <a href="{{ route('industries.index') }}" class="inline-flex items-center gap-2 text-charcoal-400 hover:text-white text-sm mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                All Industries
            </a>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest block mb-3">Industry Solutions</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">{{ $industry['title'] }}</h1>
            <p class="text-brand-300 text-xl font-medium italic mb-6">{{ $industry['headline'] }}</p>
            <p class="text-charcoal-300 text-lg leading-relaxed max-w-2xl mb-10">{{ $industry['description'] }}</p>
            <a href="{{ route('consultation') }}" class="btn-primary-lg">Book a Discovery Call</a>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <h2 class="section-title mb-12" data-animate>AI Solutions for {{ $industry['title'] }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($industry['solutions'] as $i => $solution)
            <div data-animate data-animate-delay="{{ $i * 100 }}" class="flex items-start gap-4 p-6 rounded-2xl border border-charcoal-100 hover:border-brand-200 hover:shadow-card transition-all">
                <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-brand-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <p class="font-semibold text-charcoal-900">{{ $solution }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Transform Your {{ $industry['title'] }} Business?</h2>
        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
            <a href="{{ route('consultation') }}" class="btn-primary-lg">Book Strategy Session</a>
            <a href="{{ route('services.index') }}" class="btn-outline-white">View All Services</a>
        </div>
    </div>
</section>

@endsection
