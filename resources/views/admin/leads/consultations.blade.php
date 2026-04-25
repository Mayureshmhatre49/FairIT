@extends('layouts.admin')
@section('title', 'Consultations')

@section('admin-content')
<div class="bg-white rounded-2xl border border-charcoal-100 overflow-hidden">
    <div class="flex items-center justify-between p-6 border-b border-charcoal-100">
        <h2 class="font-bold text-charcoal-950">Consultation Requests ({{ $leads->total() }})</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-charcoal-50 border-b border-charcoal-100">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Name</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Company</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Service</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Status</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Date</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-charcoal-50">
                @forelse($leads as $lead)
                <tr class="hover:bg-charcoal-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-charcoal-900">{{ $lead->name }}</div>
                        <div class="text-xs text-charcoal-400">{{ $lead->email }}</div>
                    </td>
                    <td class="px-4 py-4 text-charcoal-600">{{ $lead->company ?? '—' }}</td>
                    <td class="px-4 py-4 text-charcoal-600 max-w-xs truncate">{{ str_replace('Consultation: ', '', $lead->subject) }}</td>
                    <td class="px-4 py-4"><span class="badge {{ $lead->status_badge }} capitalize text-xs">{{ $lead->status }}</span></td>
                    <td class="px-4 py-4 text-charcoal-400 text-xs">{{ $lead->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-4"><a href="{{ route('admin.leads.show', $lead) }}" class="text-brand-600 hover:text-brand-800 text-xs font-semibold">View →</a></td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-16 text-center text-charcoal-400">No consultation requests yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($leads->hasPages())
    <div class="px-6 py-4 border-t border-charcoal-100">{{ $leads->links() }}</div>
    @endif
</div>
@endsection
