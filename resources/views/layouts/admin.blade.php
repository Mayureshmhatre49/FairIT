<!DOCTYPE html>
<html lang="en" class="h-full bg-charcoal-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') — FairIT Solutions Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full antialiased">
<div class="flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <aside class="w-64 bg-charcoal-950 flex flex-col flex-shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-charcoal-800">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                <div class="w-7 h-7 bg-brand-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0"/></svg>
                </div>
                <span class="text-white font-bold text-sm">FairIT Admin</span>
            </a>
        </div>

        <nav class="flex-1 px-3 py-6 overflow-y-auto space-y-1">
            <p class="text-[10px] font-bold text-charcoal-500 uppercase tracking-widest px-4 mb-3">Overview</p>
            <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            <p class="text-[10px] font-bold text-charcoal-500 uppercase tracking-widest px-4 mb-3 mt-6">Leads</p>
            <a href="{{ route('admin.leads.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.leads.index') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                All Leads
            </a>
            <a href="{{ route('admin.consultations.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.consultations*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Consultations
            </a>

            <p class="text-[10px] font-bold text-charcoal-500 uppercase tracking-widest px-4 mb-3 mt-6">Content</p>
            <a href="{{ route('admin.posts.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.posts*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Blog Posts
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Testimonials
            </a>
        </nav>

        <div class="px-3 py-4 border-t border-charcoal-800">
            <div class="flex items-center gap-3 px-4 mb-3">
                <div class="w-8 h-8 rounded-full bg-brand-600 flex items-center justify-center text-sm font-bold text-white">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</div>
                <div class="flex-1 min-w-0">
                    <p class="text-white text-xs font-semibold truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-charcoal-500 text-[10px] truncate">{{ auth()->user()->email ?? '' }}</p>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="admin-sidebar-link w-full text-red-400 hover:text-red-300 hover:bg-red-900/20">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-charcoal-100 flex items-center justify-between px-6 flex-shrink-0">
            <h1 class="text-lg font-bold text-charcoal-950">@yield('title', 'Dashboard')</h1>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="btn-ghost text-xs gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View Site
                </a>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
            <div data-dismiss class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl px-4 py-3 mb-6 text-sm flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
            @endif
            @yield('admin-content')
        </main>
    </div>
</div>
</body>
</html>
