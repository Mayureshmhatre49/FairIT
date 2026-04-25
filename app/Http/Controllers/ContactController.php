<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Mail\LeadNotification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact');
    }

    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'company' => ['nullable', 'string', 'max:150'],
            'phone'   => ['nullable', 'string', 'max:30'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'min:20', 'max:3000'],
            'honeypot'=> ['nullable', 'size:0'],
        ]);

        if ($request->filled('honeypot')) {
            return back()->with('success', 'Thank you! We will be in touch shortly.');
        }

        $lead = Lead::create([
            'type'    => 'contact',
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'company' => $validated['company'] ?? null,
            'phone'   => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'source'  => 'contact_form',
            'status'  => 'new',
        ]);

        $this->sendNotification($lead);

        return back()->with('success', 'Thank you! Your message has been received. We will get back to you within 24 hours.');
    }

    public function demo(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'company' => ['nullable', 'string', 'max:150'],
            'product' => ['required', 'string', 'max:100'],
            'honeypot'=> ['nullable', 'size:0'],
        ]);

        if ($request->filled('honeypot')) {
            return response()->json(['success' => true]);
        }

        $lead = Lead::create([
            'type'    => 'demo',
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'company' => $validated['company'] ?? null,
            'subject' => 'Demo Request: ' . $validated['product'],
            'message' => 'Demo requested for: ' . $validated['product'],
            'source'  => 'demo_form',
            'status'  => 'new',
        ]);

        $this->sendNotification($lead);

        return response()->json(['success' => true, 'message' => 'Demo request received! We will reach out within 24 hours.']);
    }

    public function audit(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'company' => ['nullable', 'string', 'max:150'],
            'size'    => ['nullable', 'string', 'max:50'],
            'honeypot'=> ['nullable', 'size:0'],
        ]);

        if ($request->filled('honeypot')) {
            return response()->json(['success' => true]);
        }

        $lead = Lead::create([
            'type'    => 'audit',
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'company' => $validated['company'] ?? null,
            'subject' => 'AI Audit Request',
            'message' => 'Company size: ' . ($validated['size'] ?? 'Not provided'),
            'source'  => 'audit_form',
            'status'  => 'new',
        ]);

        $this->sendNotification($lead);

        return response()->json(['success' => true, 'message' => 'Audit request received! We will reach out within 24 hours.']);
    }

    private function sendNotification(Lead $lead): void
    {
        try {
            Mail::to(config('mail.admin_notification_email', 'admin@fairitsolutions.ch'))
                ->send(new LeadNotification($lead));
        } catch (\Throwable $e) {
            logger()->error('Lead notification email failed', ['error' => $e->getMessage()]);
        }
    }
}
