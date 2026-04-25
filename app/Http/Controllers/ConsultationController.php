<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Mail\LeadNotification;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ConsultationController extends Controller
{
    public function index(): View
    {
        return view('consultation');
    }

    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:150'],
            'phone'         => ['nullable', 'string', 'max:30'],
            'company'       => ['nullable', 'string', 'max:150'],
            'company_size'  => ['nullable', 'string', 'max:50'],
            'service'       => ['required', 'string', 'max:200'],
            'budget'        => ['nullable', 'string', 'max:100'],
            'timeline'      => ['nullable', 'string', 'max:100'],
            'goals'         => ['required', 'string', 'min:20', 'max:3000'],
            'how_heard'     => ['nullable', 'string', 'max:200'],
            'honeypot'      => ['nullable', 'size:0'],
        ]);

        if ($request->filled('honeypot')) {
            return back()->with('success', 'Consultation request received!');
        }

        $lead = Lead::create([
            'type'    => 'consultation',
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'subject' => 'Consultation: ' . $validated['service'],
            'message' => implode("\n\n", [
                'Service: ' . $validated['service'],
                'Company Size: ' . ($validated['company_size'] ?? 'N/A'),
                'Budget: ' . ($validated['budget'] ?? 'N/A'),
                'Timeline: ' . ($validated['timeline'] ?? 'N/A'),
                'Goals: ' . $validated['goals'],
                'How heard: ' . ($validated['how_heard'] ?? 'N/A'),
            ]),
            'source'  => 'consultation_form',
            'status'  => 'new',
            'meta'    => json_encode([
                'company_size' => $validated['company_size'] ?? null,
                'budget'       => $validated['budget'] ?? null,
                'timeline'     => $validated['timeline'] ?? null,
                'how_heard'    => $validated['how_heard'] ?? null,
            ]),
        ]);

        try {
            Mail::to(config('mail.admin_notification_email', 'admin@fairitsolutions.ch'))
                ->send(new LeadNotification($lead));
        } catch (\Throwable $e) {
            logger()->error('Consultation email failed', ['error' => $e->getMessage()]);
        }

        return redirect()->route('consultation')->with('success', 'Your consultation request has been received! We will reach out within 24 hours to confirm your session.');
    }
}
