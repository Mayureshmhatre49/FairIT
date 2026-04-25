@extends('layouts.app')
@section('title', 'Privacy Policy — FairIT Solutions')
@section('description', 'Privacy Policy for FairIT Solutions. Learn how we collect, use, and protect your personal data.')
@section('content')
<section class="bg-charcoal-50 pt-32 pb-20">
    <div class="container-tight">
        <div class="mb-10" data-animate>
            <span class="section-label">Legal</span>
            <h1 class="text-4xl font-bold text-charcoal-950 mt-3">Privacy Policy</h1>
            <p class="text-charcoal-500 mt-2 text-sm">Last updated: {{ date('d F Y') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-8 lg:p-12 border border-charcoal-100 prose prose-gray max-w-none" data-animate data-animate-delay="100">
            <h2>1. Introduction</h2>
            <p>FairIT Solutions ("we", "us", "our") is committed to protecting your personal data and respecting your privacy. This Privacy Policy explains how we collect, use, store, and protect information about you when you use our website at <strong>fairitsolutions.ch</strong>.</p>

            <h2>2. Data We Collect</h2>
            <p>We may collect the following categories of personal data:</p>
            <ul>
                <li><strong>Contact information:</strong> Name, email address, phone number, company name</li>
                <li><strong>Communication data:</strong> Messages you send us via contact forms or email</li>
                <li><strong>Technical data:</strong> IP address, browser type, device type, pages visited (via analytics)</li>
                <li><strong>Business data:</strong> Information you provide during consultation or service enquiries</li>
            </ul>

            <h2>3. How We Use Your Data</h2>
            <p>We use your personal data to:</p>
            <ul>
                <li>Respond to your enquiries and provide our services</li>
                <li>Send service-related communications</li>
                <li>Improve our website and services</li>
                <li>Comply with legal obligations</li>
            </ul>

            <h2>4. Legal Basis</h2>
            <p>We process your data based on: (a) your consent; (b) the performance of a contract; (c) our legitimate interests; or (d) compliance with a legal obligation.</p>

            <h2>5. Data Retention</h2>
            <p>We retain personal data for as long as necessary to fulfil the purposes for which it was collected, or as required by applicable law. Lead and enquiry data is typically retained for 3 years.</p>

            <h2>6. Your Rights</h2>
            <p>Under GDPR and Swiss Data Protection Act, you have the right to: access, correct, erase, restrict, or port your data; object to processing; and withdraw consent. To exercise these rights, contact us at <a href="mailto:privacy@fairitsolutions.ch">privacy@fairitsolutions.ch</a>.</p>

            <h2>7. Data Security</h2>
            <p>We implement appropriate technical and organisational measures to protect your personal data against unauthorised access, alteration, disclosure, or destruction.</p>

            <h2>8. Third-Party Services</h2>
            <p>We may share data with trusted service providers (hosting, email, analytics) who process data on our behalf. We ensure these providers maintain appropriate data protection standards.</p>

            <h2>9. Cookies</h2>
            <p>We use cookies and similar tracking technologies. Please see our <a href="{{ route('cookies') }}">Cookie Policy</a> for details.</p>

            <h2>10. Contact</h2>
            <p>For privacy-related enquiries, contact us at: <a href="mailto:privacy@fairitsolutions.ch">privacy@fairitsolutions.ch</a> or visit our <a href="{{ route('contact') }}">Contact page</a>.</p>
        </div>
    </div>
</section>
@endsection
