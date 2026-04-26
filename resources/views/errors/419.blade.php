@extends('layouts.app')

@section('title', '419 — Session Expired | FairIT Solutions')
@section('description', 'Your session has expired. Please refresh and try again.')
@section('robots', 'noindex, nofollow')

@section('content')
<section class="relative bg-charcoal-950 min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 50%, rgba(245,158,11,0.08) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center py-32">
        <p class="text-amber-400 font-black text-8xl lg:text-9xl mb-4 leading-none">419</p>
        <h1 class="text-3xl lg:text-4xl font-bold text-white mb-4">Session Expired</h1>
        <p class="text-charcoal-400 text-lg mb-10 max-w-md mx-auto leading-relaxed">Your session has timed out. Please go back and refresh the page before submitting again.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="javascript:history.back()" class="btn-primary-lg">Go Back</a>
            <a href="{{ url('/') }}" class="btn-outline-white">Go Home</a>
        </div>
    </div>
</section>
@endsection
