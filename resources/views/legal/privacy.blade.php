@extends('layouts.app')
@section('title', 'Privacy Policy — FairIT Solutions')
@section('description', 'Privacy Policy for FairIT Solutions (a brand of TRNM Digital Consulting LLP, India). Learn how we collect, use, and protect your personal data under India DPDP Act, GDPR, and Swiss FADP.')
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
            <p><strong>FairIT Solutions</strong> is a brand operated by <strong>TRNM Digital Consulting LLP</strong> ("we", "us", "our"). This Privacy Policy explains how we collect, use, store, and protect information about you when you use our website at <strong>fairitsolutions.ch</strong>, our consultation services, and any communications you have with us.</p>
            <p>This policy is designed to meet the requirements of India's Digital Personal Data Protection Act, 2023 (DPDP Act), the EU General Data Protection Regulation (GDPR), and the revised Swiss Federal Act on Data Protection (revFADP).</p>

            <h2>2. Who we are</h2>
            <p><strong>TRNM Digital Consulting LLP</strong> is the legal entity behind the FairIT Solutions brand and is the <strong>data controller</strong> for the purposes of the India DPDP Act, the GDPR, and the revised Swiss FADP. Our principal place of business is in Pune, India, with operating offices in Switzerland and Germany and a registered office in Alibag (Raigad), India. The same data-protection standards apply across all locations.</p>

            <h2>3. Data we collect</h2>
            <ul>
                <li><strong>Contact information:</strong> name, email address, phone number, company name, job title</li>
                <li><strong>Communication data:</strong> messages you send us via contact forms, email, calls, or chat</li>
                <li><strong>Engagement data:</strong> budget bands, timelines, service interests, company size (provided during consultation requests)</li>
                <li><strong>Technical data:</strong> IP address, browser type, device, pages visited, referrer, session duration (via privacy-respecting analytics)</li>
                <li><strong>Marketing data:</strong> newsletter subscription status, click and open data on emails you receive from us</li>
            </ul>
            <p>We do not knowingly collect data from individuals under 16.</p>

            <h2>4. How we use your data</h2>
            <ul>
                <li>To respond to enquiries and deliver our services</li>
                <li>To prepare proposals, scopes, and engagement documents</li>
                <li>To send transactional and service-related communications</li>
                <li>To send marketing communications where you have opted in (or where permitted as a soft opt-in to existing clients)</li>
                <li>To improve our website, services, and user experience</li>
                <li>To detect, prevent, and respond to fraud or abuse</li>
                <li>To comply with legal, tax, and accounting obligations</li>
            </ul>

            <h2>5. Legal basis for processing (GDPR Art. 6)</h2>
            <ul>
                <li><strong>Consent:</strong> for marketing emails and non-essential cookies</li>
                <li><strong>Contract:</strong> to provide the services you have requested</li>
                <li><strong>Legitimate interests:</strong> service improvement, security, business development with B2B contacts where reasonably expected</li>
                <li><strong>Legal obligation:</strong> tax, accounting, regulatory compliance</li>
            </ul>
            <p>Under the India DPDP Act, our lawful grounds are typically your consent and certain "legitimate uses" defined in the Act (such as responding to your enquiry or fulfilling a contract).</p>

            <h2>6. Data retention</h2>
            <p>We retain personal data only as long as necessary for the purposes set out in this policy or as required by applicable law.</p>
            <ul>
                <li><strong>Lead and enquiry data:</strong> 3 years from last meaningful interaction, after which it is anonymised or deleted. The 3-year period reflects the typical B2B sales cycle and post-engagement follow-up window in our industry.</li>
                <li><strong>Client engagement records:</strong> 10 years (statutory accounting and contractual requirement)</li>
                <li><strong>Newsletter subscribers:</strong> until unsubscribe request</li>
                <li><strong>Website analytics:</strong> 14 months</li>
            </ul>

            <h2>7. Cross-border data transfers (India ↔ EU ↔ Switzerland)</h2>
            <p>Because the controlling entity is based in India and we serve clients globally with operating presence in Switzerland and Germany, personal data may be transferred between these jurisdictions and to sub-processors in the EU, UK, and US. We rely on the following mechanisms:</p>
            <ul>
                <li><strong>EU/EEA → India:</strong> Standard Contractual Clauses (SCCs) plus supplementary technical and organisational measures</li>
                <li><strong>Switzerland → India:</strong> the Swiss FADP transfer regime, including SCCs adapted to Swiss requirements and the FDPIC-recognised safeguards</li>
                <li><strong>EU/EEA → US sub-processors:</strong> SCCs or EU-US Data Privacy Framework certification where applicable</li>
                <li><strong>India → outside India:</strong> made only in compliance with the DPDP Act and applicable notifications</li>
            </ul>

            <h2>8. Your rights</h2>
            <p>Subject to applicable law, you have the right to:</p>
            <ul>
                <li>Access the personal data we hold about you</li>
                <li>Correct inaccurate or incomplete data</li>
                <li>Erase your data ("right to be forgotten")</li>
                <li>Restrict or object to processing</li>
                <li>Port your data to another controller in a structured, machine-readable format</li>
                <li>Withdraw consent at any time (without affecting the lawfulness of prior processing)</li>
                <li>Lodge a complaint with a supervisory authority (Swiss FDPIC, your local EU DPA, or India's Data Protection Board)</li>
                <li>Nominate another individual to exercise rights on your behalf in the event of incapacity (DPDP Act)</li>
            </ul>
            <p>To exercise these rights, email <a href="mailto:privacy@fairitsolutions.ch">privacy@fairitsolutions.ch</a>. We will respond within 30 days (or 1 month under GDPR; sooner where reasonably possible).</p>

            <h2>9. Data Protection point of contact</h2>
            <p>FairIT Solutions has not formally appointed a Data Protection Officer (DPO) because our processing does not currently meet the mandatory DPO thresholds under GDPR Art. 37 (large-scale systematic monitoring or large-scale special-category processing). Privacy matters are nonetheless escalated through a single point of contact:</p>
            <p><strong>Privacy contact:</strong> <a href="mailto:privacy@fairitsolutions.ch">privacy@fairitsolutions.ch</a></p>
            <p>For DPDP Act matters, the same contact functions as the designated Data Protection Officer / Grievance Officer in India.</p>

            <h2>10. Data security</h2>
            <p>We implement appropriate technical and organisational measures including TLS encryption in transit, encryption at rest, role-based access control, least-privilege for sub-processors, regular security reviews, and a documented incident-response plan.</p>

            <h2>11. Breach notification</h2>
            <p>In the event of a personal data breach that is likely to result in a risk to your rights and freedoms, we will:</p>
            <ul>
                <li>Notify the competent supervisory authority within <strong>72 hours</strong> of becoming aware of the breach (GDPR Art. 33; revFADP).</li>
                <li>Notify affected individuals without undue delay where the breach is likely to result in a high risk.</li>
                <li>Notify the Data Protection Board of India in accordance with the DPDP Act and applicable rules.</li>
            </ul>

            <h2>12. Sub-processors and third-party services</h2>
            <p>We use trusted sub-processors to operate our services. Categories include cloud hosting and infrastructure, transactional email, customer support tooling, privacy-respecting analytics, and payment processing. All sub-processors are bound by written data-processing agreements equivalent in protection to this policy. A current list is available on request.</p>

            <h2>13. Cookies and analytics</h2>
            <p>We use a minimal set of cookies and similar technologies. Non-essential cookies (analytics, marketing) require your consent. See our <a href="{{ route('cookies') }}">Cookie Policy</a> for details, including the specific analytics provider in use.</p>

            <h2>14. Automated decision-making</h2>
            <p>We do not engage in any automated decision-making — including profiling — that produces legal or similarly significant effects on you.</p>

            <h2>15. Changes to this policy</h2>
            <p>We may update this policy from time to time. Material changes will be highlighted on this page with a revised "last updated" date. Where required, we will obtain your consent again.</p>

            <h2>16. Contact</h2>
            <p>For privacy-related enquiries, please email <a href="mailto:privacy@fairitsolutions.ch">privacy@fairitsolutions.ch</a> or visit our <a href="{{ route('contact') }}">Contact page</a>.</p>
        </div>
    </div>
</section>
@endsection
