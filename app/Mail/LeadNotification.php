<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Lead $lead)
    {
    }

    public function envelope(): Envelope
    {
        $subject = match ($this->lead->type) {
            'consultation' => "🔔 New Consultation Request: {$this->lead->name}",
            'demo'         => "🔔 New Demo Request: {$this->lead->name}",
            'audit'        => "🔔 New AI Audit Request: {$this->lead->name}",
            default        => "🔔 New Contact: {$this->lead->name}",
        };

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(view: 'emails.lead-notification');
    }
}
