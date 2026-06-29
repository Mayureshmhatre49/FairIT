@extends('layouts.admin')
@section('title', 'Case Studies')

@section('admin-content')
<div class="bg-white rounded-2xl border border-charcoal-100 overflow-hidden">
    <div class="flex flex-wrap items-center justify-between gap-3 p-6 border-b border-charcoal-100">
        <h2 class="font-bold text-charcoal-950">Case Studies ({{ $studies->total() }})</h2>
        <div class="flex items-center gap-2">
            <form action="{{ route('admin.case-studies.index') }}" method="GET" class="flex items-center gap-2">
                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                <select name="domain" onchange="this.form.submit()" class="form-input text-sm py-1.5">
                    <option value="">All Industries</option>
                    @foreach($domains as $d)
                    <option value="{{ $d }}" {{ request('domain') == $d ? 'selected' : '' }}>{{ $d }}</option>
                    @endforeach
                </select>
            </form>
            <form action="{{ route('admin.case-studies.index') }}" method="GET" class="flex items-center gap-2">
                @if(request('domain'))<input type="hidden" name="domain" value="{{ request('domain') }}">@endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search project / client..." class="form-input text-sm py-1.5">
            </form>
            <a href="{{ route('admin.case-studies.create') }}" class="btn-primary text-sm">+ New Case Study</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-charcoal-50 border-b border-charcoal-100">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Project</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Client</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Industry</th>
                    <th class="text-right px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Revenue (USD)</th>
                    <th class="text-left px-4 py-3 font-semibold text-charcoal-600 text-xs uppercase tracking-wider">Status</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-charcoal-50">
                @forelse($studies as $study)
                <tr class="hover:bg-charcoal-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-charcoal-900 max-w-xs truncate">{{ $study->project_name }}</div>
                        <div class="text-xs text-charcoal-400">/case-studies/{{ $study->slug }}</div>
                    </td>
                    <td class="px-4 py-4 text-charcoal-600 max-w-xs truncate">{{ $study->display_client_name }}</td>
                    <td class="px-4 py-4 text-charcoal-600">{{ $study->domain }}</td>
                    <td class="px-4 py-4 text-charcoal-600 text-right tabular-nums">
                        {{ $study->revenue_usd ? '$' . number_format($study->revenue_usd) : '—' }}
                        @if($study->is_ongoing) <span class="text-xs text-emerald-600">ongoing</span>@endif
                    </td>
                    <td class="px-4 py-4">
                        @if($study->is_featured)
                        <span class="badge badge-blue">Featured</span>
                        @endif
                        @if($study->is_published)
                        <span class="badge badge-green">Published</span>
                        @else
                        <span class="badge bg-charcoal-100 text-charcoal-600 border-charcoal-200">Draft</span>
                        @endif
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.case-studies.edit', $study) }}" class="text-brand-600 hover:text-brand-800 text-xs font-semibold">Edit</a>
                            @if($study->is_published)
                            <a href="{{ route('case-studies.show', $study->slug) }}" target="_blank" class="text-charcoal-400 hover:text-charcoal-700 text-xs font-semibold">View</a>
                            @endif
                            <form action="{{ route('admin.case-studies.destroy', $study) }}" method="POST" onsubmit="return confirm('Delete this case study?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-semibold">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-16 text-center text-charcoal-400">No case studies yet. <a href="{{ route('admin.case-studies.create') }}" class="text-brand-600 font-semibold">Create your first →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($studies->hasPages())
    <div class="px-6 py-4 border-t border-charcoal-100">{{ $studies->links() }}</div>
    @endif
</div>
@endsection
