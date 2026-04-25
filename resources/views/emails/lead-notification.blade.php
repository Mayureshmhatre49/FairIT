<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Lead — FairIT Solutions</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #1e3a8a, #2563eb); padding: 32px; color: white; }
        .header h1 { margin: 0; font-size: 22px; }
        .header p { margin: 8px 0 0; opacity: 0.8; font-size: 14px; }
        .badge { display: inline-block; background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 8px; }
        .body { padding: 32px; }
        .field { margin-bottom: 20px; }
        .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #6b7280; margin-bottom: 4px; }
        .value { font-size: 16px; color: #111827; }
        .message-box { background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin-top: 4px; }
        .footer { background: #f8fafc; border-top: 1px solid #e5e7eb; padding: 20px 32px; text-align: center; font-size: 12px; color: #9ca3af; }
        .btn { display: inline-block; background: #2563eb; color: white; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; font-size: 14px; margin-top: 24px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Lead Received</h1>
            <p>FairIT Solutions — Lead Management</p>
            <span class="badge">{{ strtoupper($lead->type) }}</span>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">Name</div>
                <div class="value">{{ $lead->name }}</div>
            </div>
            <div class="field">
                <div class="label">Email</div>
                <div class="value"><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></div>
            </div>
            @if($lead->phone)
            <div class="field">
                <div class="label">Phone</div>
                <div class="value">{{ $lead->phone }}</div>
            </div>
            @endif
            @if($lead->company)
            <div class="field">
                <div class="label">Company</div>
                <div class="value">{{ $lead->company }}</div>
            </div>
            @endif
            @if($lead->subject)
            <div class="field">
                <div class="label">Subject / Service</div>
                <div class="value">{{ $lead->subject }}</div>
            </div>
            @endif
            @if($lead->message)
            <div class="field">
                <div class="label">Message</div>
                <div class="message-box">{{ $lead->message }}</div>
            </div>
            @endif
            <div class="field">
                <div class="label">Source</div>
                <div class="value">{{ $lead->source }}</div>
            </div>
            <div class="field">
                <div class="label">Received At</div>
                <div class="value">{{ $lead->created_at->format('D, d M Y H:i') }} UTC</div>
            </div>
            <a href="{{ route('admin.leads.show', $lead) }}" class="btn">View in Admin Panel →</a>
        </div>
        <div class="footer">
            FairIT Solutions — Building AI Operating Systems for Founders, Homes &amp; Life<br>
            <a href="https://fairitsolutions.ch">fairitsolutions.ch</a>
        </div>
    </div>
</body>
</html>
