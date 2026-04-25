@extends('layouts.admin')
@section('title', 'Lead: ' . $lead->name)

@section('admin-content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl border border-charcoal-100 p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-brand-100 flex items-center justify-center text-lg font-bold text-brand-700">{{ substr($lead->name, 0, 1) }}</div>
                    <div>
                        <h2 class="font-bold text-charcoal-950 text-xl">{{ $lead->name }}</h2>
                        <p class="text-charcoal-500 text-sm">{{ $lead->email }}@if($lead->phone) · {{ $lead->phone }}@endif</p>
                    </div>
                </div>
                <span class="badge {{ $lead->status_badge }} capitalize">{{ $lead->status }}</span>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                @if($lead->company)
                <div><div class="text-xs text-charcoal-400 font-semibold uppercase tracking-wider mb-1">Company</div><div class="text-charcoal-800">{{ $lead->company }}</div></div>
                @endif
                <div><div class="text-xs text-charcoal-400 font-semibold uppercase tracking-wider mb-1">Lead Type</div><div class="text-charcoal-800 capitalize">{{ $lead->type }}</div></div>
                <div><div class="text-xs text-charcoal-400 font-semibold uppercase tracking-wider mb-1">Source</div><div class="text-charcoal-800">{{ $lead->source }}</div></div>
                <div><div class="text-xs text-charcoal-400 font-semibold uppercase tracking-wider mb-1">Received</div><div class="text-charcoal-800">{{ $lead->created_at->format('d M Y H:i') }}</div></div>
            </div>

            @if($lead->subject)
            <div class="mb-4"><div class="text-xs text-charcoal-400 font-semibold uppercase tracking-wider mb-1">Subject</div><div class="text-charcoal-800">{{ $lead->subject }}</div></div>
            @endif

            @if($lead->message)
            <div><div class="text-xs text-charcoal-400 font-semibold uppercase tracking-wider mb-2">Message</div><div class="bg-charcoal-50 rounded-xl p-4 text-charcoal-700 text-sm leading-relaxed whitespace-pre-wrap">{{ $lead->message }}</div></div>
            @endif
        </div>
    </div>

    <div class="space-y-4">
        <div class="bg-white rounded-2xl border border-charcoal-100 p-6">
            <h3 class="font-bold text-charcoal-950 mb-4">Update Status</h3>
            <div class="space-y-2">
                @foreach(['new', 'contacted', 'qualified', 'converted', 'closed'] as $status)
                <button onclick="updateStatus('{{ $lead->id }}', '{{ $status }}')"
                        class="w-full text-left px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ $lead->status === $status ? 'bg-brand-50 text-brand-700 border border-brand-200' : 'hover:bg-charcoal-50 text-charcoal-600' }}">
                    {{ ucfirst($status) }}
                </button>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-charcoal-100 p-6">
            <h3 class="font-bold text-charcoal-950 mb-4">Quick Actions</h3>
            <div class="space-y-2">
                <a href="mailto:{{ $lead->email }}" class="btn-primary w-full justify-center text-sm">Reply via Email</a>
                <a href="{{ route('admin.leads.index') }}" class="btn-secondary w-full justify-center text-sm">Back to Leads</a>
                <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" onsubmit="return confirm('Delete this lead permanently?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full text-red-600 hover:text-red-800 text-sm font-medium py-2 transition-colors">Delete Lead</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
async function updateStatus(leadId, status) {
    const r = await fetch(`/x-admin-secure-2024/leads/${leadId}/status`, {
        method: 'PATCH',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Content-Type': 'application/json' },
        body: JSON.stringify({ status }),
    });
    if (r.ok) window.location.reload();
}
</script>
@endpush
@endsection
