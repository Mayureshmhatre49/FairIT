@extends('layouts.app')
@section('title', 'Terms of Service — FairIT Solutions')
@section('description', 'Terms of Service for FairIT Solutions. Read our terms and conditions for using our website and services.')
@section('content')
<section class="bg-charcoal-50 pt-32 pb-20">
    <div class="container-tight">
        <div class="mb-10" data-animate>
            <span class="section-label">Legal</span>
            <h1 class="text-4xl font-bold text-charcoal-950 mt-3">Terms of Service</h1>
            <p class="text-charcoal-500 mt-2 text-sm">Last updated: {{ date('d F Y') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-8 lg:p-12 border border-charcoal-100 prose prose-gray max-w-none" data-animate data-animate-delay="100">
            <h2>1. Acceptance of Terms</h2>
            <p>By accessing or using the FairIT Solutions website (fairitsolutions.ch) and our services, you agree to be bound by these Terms of Service. If you do not agree, please do not use our website or services.</p>

            <h2>2. Our Services</h2>
            <p>FairIT Solutions provides AI consulting, AI system development, AI product access, and related advisory services. Specific service terms are governed by individual service agreements.</p>

            <h2>3. Intellectual Property</h2>
            <p>All content on this website, including text, graphics, logos, and code, is the property of FairIT Solutions and is protected by applicable intellectual property laws. Custom AI systems and products developed for clients are governed by the relevant client agreement.</p>

            <h2>4. Limitation of Liability</h2>
            <p>To the maximum extent permitted by law, FairIT Solutions shall not be liable for any indirect, incidental, special, or consequential damages arising from your use of our website or services.</p>

            <h2>5. Confidentiality</h2>
            <p>We treat all client information with strict confidentiality. We do not share proprietary business information without explicit written consent.</p>

            <h2>6. Governing Law</h2>
            <p>These Terms are governed by the laws of Switzerland. Any disputes shall be subject to the exclusive jurisdiction of the courts of Switzerland.</p>

            <h2>7. Changes to Terms</h2>
            <p>We reserve the right to modify these Terms at any time. Changes will be posted on this page with an updated date. Continued use of our website constitutes acceptance of the revised Terms.</p>

            <h2>8. Contact</h2>
            <p>For questions about these Terms, contact us at <a href="mailto:legal@fairitsolutions.ch">legal@fairitsolutions.ch</a>.</p>
        </div>
    </div>
</section>
@endsection
