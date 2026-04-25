@extends('layouts.app')
@section('title', 'Cookie Policy — FairIT Solutions')
@section('description', 'Cookie Policy for FairIT Solutions. Learn about the cookies we use and how to manage your preferences.')
@section('content')
<section class="bg-charcoal-50 pt-32 pb-20">
    <div class="container-tight">
        <div class="mb-10" data-animate>
            <span class="section-label">Legal</span>
            <h1 class="text-4xl font-bold text-charcoal-950 mt-3">Cookie Policy</h1>
            <p class="text-charcoal-500 mt-2 text-sm">Last updated: {{ date('d F Y') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-8 lg:p-12 border border-charcoal-100 prose prose-gray max-w-none" data-animate data-animate-delay="100">
            <h2>1. What Are Cookies?</h2>
            <p>Cookies are small text files stored on your device when you visit a website. They help websites remember your preferences and improve your experience.</p>

            <h2>2. Cookies We Use</h2>
            <h3>Essential Cookies</h3>
            <p>Required for the website to function correctly. These cannot be disabled. They include session cookies, CSRF protection, and security cookies.</p>

            <h3>Analytics Cookies</h3>
            <p>Help us understand how visitors interact with our website. Data is anonymised and aggregated. We may use Google Analytics or similar tools.</p>

            <h3>Preference Cookies</h3>
            <p>Remember your settings and preferences, such as cookie consent status.</p>

            <h2>3. Managing Cookies</h2>
            <p>You can control and delete cookies through your browser settings. Disabling certain cookies may affect website functionality. Most browsers allow you to:</p>
            <ul>
                <li>View cookies currently stored on your device</li>
                <li>Allow, block, or delete cookies</li>
                <li>Set preferences for specific websites</li>
            </ul>

            <h2>4. Third-Party Cookies</h2>
            <p>Our website may include content or tools from third parties (e.g., Google Analytics, reCAPTCHA). These third parties may set their own cookies. We do not control these cookies.</p>

            <h2>5. Updates</h2>
            <p>This Cookie Policy may be updated periodically. Please revisit this page for the latest version.</p>

            <h2>6. Contact</h2>
            <p>Questions about cookies? Contact us at <a href="mailto:privacy@fairitsolutions.ch">privacy@fairitsolutions.ch</a>.</p>
        </div>
    </div>
</section>
@endsection
