<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $leads = Lead::when($request->type, fn ($q, $t) => $q->where('type', $t))
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->search, fn ($q, $s) => $q->where('name', 'like', "%{$s}%")->orWhere('email', 'like', "%{$s}%"))
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.leads.index', compact('leads'));
    }

    public function consultations(Request $request): View
    {
        $leads = Lead::where('type', 'consultation')
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.leads.consultations', compact('leads'));
    }

    public function show(Lead $lead): View
    {
        return view('admin.leads.show', compact('lead'));
    }

    public function updateStatus(Request $request, Lead $lead): JsonResponse
    {
        $request->validate(['status' => ['required', 'in:new,contacted,qualified,converted,closed']]);

        $lead->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }

    public function destroy(Lead $lead): RedirectResponse
    {
        $lead->delete();

        return redirect()->route('admin.leads.index')->with('success', 'Lead deleted.');
    }
}
