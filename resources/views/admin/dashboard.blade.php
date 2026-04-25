@extends('layouts.admin')
@section('title', 'Dashboard')

@section('admin-content')
<div class="space-y-6">

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
        @foreach([
            ['label' => 'Total Leads', 'value' => $stats['total_leads'], 'color' => 'blue', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
            ['label' => 'New Leads', 'value' => $stats['new_leads'], 'color' => 'emerald', 'icon' => 'M12 4v16m8-8H4'],
            ['label' => 'Consultations', 'value' => $stats['consultations'], 'color' => 'violet', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['label' => 'Blog Posts', 'value' => $stats['total_posts'], 'color' => 'amber', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ['label' => 'Published', 'value' => $stats['published_posts'], 'color' => 'green', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['label' => 'Testimonials', 'value' => $stats['total_testimonials'], 'color' => 'pink', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888'],
        ] as $stat)
        <div class="bg-white rounded-2xl p-5 border border-charcoal-100">
            <div class="flex items-center justify-between mb-3">
                <div class="w-8 h-8 rounded-lg bg-{{ $stat['color'] }}-50 flex items-center justify-center">
                    <svg class="w-4 h-4 text-{{ $stat['color'] }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}"/></svg>
                </div>
            </div>
            <div class="text-2xl font-bold text-charcoal-950">{{ $stat['value'] }}</div>
            <div class="text-xs text-charcoal-500 mt-0.5">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Recent Leads + Quick Actions --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Recent Leads --}}
        <div class="lg:col-span-2 bg-white rounded-2xl border border-charcoal-100 overflow-hidden">
            <div class="flex items-center justify-between p-6 border-b border-charcoal-100">
                <h2 class="font-bold text-charcoal-950">Recent Leads</h2>
                <a href="{{ route('admin.leads.index') }}" class="text-xs text-brand-600 hover:text-brand-800 font-semibold">View All →</a>
            </div>
            <div class="divide-y divide-charcoal-50">
                @forelse($recentLeads as $lead)
                <div class="flex items-center gap-4 px-6 py-4 hover:bg-charcoal-50 transition-colors">
                    <div class="w-9 h-9 rounded-full bg-brand-100 flex items-center justify-center flex-shrink-0 text-sm font-bold text-brand-700">{{ substr($lead->name, 0, 1) }}</div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-charcoal-950 text-sm truncate">{{ $lead->name }}</div>
                        <div class="text-xs text-charcoal-400 truncate">{{ $lead->email }} · {{ $lead->type }}</div>
                    </div>
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <span class="badge {{ $lead->status_badge }} text-xs">{{ ucfirst($lead->status) }}</span>
                        <span class="text-xs text-charcoal-400">{{ $lead->created_at->diffForHumans() }}</span>
                        <a href="{{ route('admin.leads.show', $lead) }}" class="text-brand-600 hover:text-brand-800 text-xs font-semibold">View</a>
                    </div>
                </div>
                @empty
                <div class="px-6 py-12 text-center text-charcoal-400 text-sm">No leads yet. Check back after you launch!</div>
                @endforelse
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="space-y-4">
            <div class="bg-white rounded-2xl border border-charcoal-100 p-6">
                <h2 class="font-bold text-charcoal-950 mb-4">Quick Actions</h2>
                <div class="space-y-2">
                    <a href="{{ route('admin.posts.create') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-charcoal-50 transition-colors group">
                        <div class="w-8 h-8 rounded-lg bg-brand-50 flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                            <svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <span class="text-sm font-medium text-charcoal-700">New Blog Post</span>
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-charcoal-50 transition-colors group">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <span class="text-sm font-medium text-charcoal-700">Add Testimonial</span>
                    </a>
                    <a href="{{ route('admin.leads.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-charcoal-50 transition-colors group">
                        <div class="w-8 h-8 rounded-lg bg-violet-50 flex items-center justify-center group-hover:bg-violet-100 transition-colors">
                            <svg class="w-4 h-4 text-violet-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/></svg>
                        </div>
                        <span class="text-sm font-medium text-charcoal-700">Manage Leads</span>
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 p-3 rounded-xl hover:bg-charcoal-50 transition-colors group">
                        <div class="w-8 h-8 rounded-lg bg-charcoal-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-charcoal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                        <span class="text-sm font-medium text-charcoal-700">View Website</span>
                    </a>
                </div>
            </div>

            {{-- Leads by Type --}}
            @if($leadsByType->count() > 0)
            <div class="bg-white rounded-2xl border border-charcoal-100 p-6">
                <h2 class="font-bold text-charcoal-950 mb-4">Leads by Type</h2>
                <div class="space-y-3">
                    @foreach($leadsByType as $type => $count)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-charcoal-600 capitalize">{{ $type }}</span>
                            <span class="font-semibold text-charcoal-950">{{ $count }}</span>
                        </div>
                        <div class="h-1.5 bg-charcoal-100 rounded-full">
                            <div class="h-full bg-brand-600 rounded-full" style="width: {{ $leadsByType->sum() > 0 ? ($count / $leadsByType->sum() * 100) : 0 }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
