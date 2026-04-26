@extends('layouts.app')

@section('title', '403 — Access Forbidden | FairIT Solutions')
@section('description', 'You do not have permission to access this page.')
@section('robots', 'noindex, nofollow')

@section('content')
<section class="relative bg-charcoal-950 min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 50%, rgba(239,68,68,0.08) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center py-32">
        <p class="text-red-400 font-black text-8xl lg:text-9xl mb-4 leading-none">403</p>
        <h1 class="text-3xl lg:text-4xl font-bold text-white mb-4">Access Forbidden</h1>
        <p class="text-charcoal-400 text-lg mb-10 max-w-md mx-auto leading-relaxed">You don't have permission to access this resource.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/') }}" class="btn-primary-lg">Go Home</a>
            <a href="{{ route('contact') }}" class="btn-outline-white">Contact Us</a>
        </div>
    </div>
</section>
@endsection
