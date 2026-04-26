@extends('layouts.app')

@section('title', '404 — Page Not Found | FairIT Solutions')
@section('description', 'The page you are looking for could not be found.')
@section('robots', 'noindex, nofollow')

@section('content')
<section class="relative bg-charcoal-950 min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 50%, rgba(37,99,235,0.12) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center py-32">
        <p class="text-brand-400 font-black text-8xl lg:text-9xl mb-4 leading-none">404</p>
        <h1 class="text-3xl lg:text-4xl font-bold text-white mb-4">Page Not Found</h1>
        <p class="text-charcoal-400 text-lg mb-10 max-w-md mx-auto leading-relaxed">The page you're looking for has moved, been removed, or never existed.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/') }}" class="btn-primary-lg">Go Home</a>
            <a href="{{ route('services.index') }}" class="btn-outline-white">Explore Services</a>
        </div>
    </div>
</section>
@endsection
