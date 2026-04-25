@extends('layouts.admin')
@section('title', 'Leads')

@section('admin-content')
<div class="bg-white rounded-2xl border border-charcoal-100 overflow-hidden">
    <div class="flex items-center justify-between p-6 border-b border-charcoal-100">
        <h2 class="font-bold text-charcoal-950">All Leads ({{ $leads->total() }})</h2>
        <div class="flex items-center gap-3">
            <form action="{{ route('admin.leads.index') }}" method="GET" class="flex gap-2">
                <select name="type" onchange="this.form.submit()" class="text-sm border border-charcoal-200 rounded-lg px-3 py-2 focus:border-brand-500 focus:outline-none">
                    <option value="">All Types</option>
                    @foreach(['contact', 'consultation', 'demo', 'audit'] as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
                <select name="status" onchange="this.form.submit()" class="text-sm border border-charcoal-200 rounded-lg px-3 py-2 focus:border-brand-500 focus:outline-none">
                    <option value="">All Statuses</option>
                    @foreach(['new', 'contacted', 'qualified', 'converted', 'closed'] as $status)
                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="text-sm border border-charcoal-200 rounded-lg px-3 py-2 focus:border-brand-500 focus:outline-none">
                <button type="submit" class="btn-primary text-sm py-2">Search</button>
            </form>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-charcoal-50 border-b border-charcoal-100">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Name / Email</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Type</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Subject</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Status</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Date</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-charcoal-50">
                @forelse($leads as $lead)
                <tr class="hover:bg-charcoal-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center text-xs font-bold text-brand-700 flex-shrink-0">{{ substr($lead->name, 0, 1) }}</div>
                            <div>
                                <div class="font-semibold text-charcoal-900">{{ $lead->name }}</div>
                                <div class="text-xs text-charcoal-400">{{ $lead->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <span class="badge bg-charcoal-100 text-charcoal-700 border-charcoal-200 capitalize text-xs">{{ $lead->type }}</span>
                    </td>
                    <td class="px-4 py-4 text-charcoal-600 max-w-xs truncate">{{ $lead->subject }}</td>
                    <td class="px-4 py-4">
                        <span class="badge {{ $lead->status_badge }} text-xs capitalize">{{ $lead->status }}</span>
                    </td>
                    <td class="px-4 py-4 text-charcoal-400 text-xs">{{ $lead->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-4">
                        <a href="{{ route('admin.leads.show', $lead) }}" class="text-brand-600 hover:text-brand-800 text-xs font-semibold">View →</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-16 text-center text-charcoal-400">No leads found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($leads->hasPages())
    <div class="px-6 py-4 border-t border-charcoal-100">
        {{ $leads->links() }}
    </div>
    @endif
</div>
@endsection
