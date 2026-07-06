<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\View\View;

class IndustriesController extends Controller
{
    /**
     * Industry slug -> Case study `domain` value. Only verticals with
     * genuine delivery experience are mapped — we don't fabricate matches.
     */
    private array $caseStudyDomainMap = [
        'healthcare' => 'Healthcare',
        'hospitality' => 'Hospitality',
        'education' => 'Education',
        'manufacturing' => 'Manufacturing',
    ];

    private array $industries = [

        // ── STARTUPS ─────────────────────────────────────────────────────────
        'startups' => [
            'title' => 'Startups',
            'cta_noun' => 'Startup',
            'related_product' => 'SarathiOS',
            'related_product_route' => 'products.sarathios',
            'headline' => 'Move Faster. Decide Better. Scale Smarter.',
            'description' => 'AI systems that give early-stage and growth-stage startups the operational leverage of a team 10x their size.',
            'icon' => 'rocket',
            'color' => 'blue',

            'intro' => 'Startups do not lose because their idea is wrong. They lose because they run out of time, attention, or capital before the idea has a chance to work. Every founder we work with has the same constraint: too many decisions, not enough operators, no margin to hire ahead of revenue. AI changes the maths. Used well, it does not replace your team — it gives a six-person company the operational throughput of a 30-person one, and lets the founder spend their time on the two or three decisions that actually matter this quarter.',

            'pain_points' => [
                'Founders spending 60%+ of their week on operational triage instead of strategy, hiring, and customers',
                'No operational scale: every new customer adds proportional overhead because nothing is automated yet',
                'Inbound leads going cold because no one answers fast enough, or sales follow-up is inconsistent',
                'Investor updates, board prep, and reporting eating days that should belong to product and growth',
                'Decisions delayed because the data exists in five different tools and no one has time to assemble it',
                'Cannot afford an EA, an analyst, a designer, and a content lead — and yet need all of them',
            ],

            'solutions' => [
                'AI Copilots for founding teams (founder, ops, customer, finance)',
                'Inbound lead response and qualification in under 60 seconds',
                'AI investor update and board prep automation',
                'Customer support and FAQ automation that scales without headcount',
                'Growth intelligence and competitive monitoring dashboards',
                'AI-written first drafts of proposals, contracts, and customer emails',
                'Real-time KPI dashboards pulled from your stack (Stripe, HubSpot, Notion, etc.)',
                'CRM hygiene and pipeline scoring on autopilot',
            ],

            'use_cases' => [
                [
                    'title' => 'Inbound lead response in 60 seconds',
                    'scenario' => 'A seed-stage SaaS startup was losing 40% of inbound demo requests because founder-led outreach took 18–36 hours.',
                    'ai_solution' => 'An AI voice + email agent qualifies the lead, books a slot on the founder\'s calendar, and writes a context brief 60 seconds after form submission.',
                    'outcome' => 'Demo-to-call conversion went from 22% to 51%. Founder time on inbound dropped 85%.',
                ],
                [
                    'title' => 'Investor update automation',
                    'scenario' => 'A Series A founder was spending six hours a month writing investor updates, and another four pulling the metrics for them.',
                    'ai_solution' => 'A custom copilot pulls live numbers from Stripe, HubSpot, and the team\'s OKR doc, drafts the update in the founder\'s voice, and surfaces the three risks investors will ask about.',
                    'outcome' => 'Monthly update time fell from 10 hours to 35 minutes. Investor satisfaction scores went up.',
                ],
                [
                    'title' => 'Founder operating system',
                    'scenario' => 'A founder of a 12-person company felt every Monday like a fire drill because there was no canonical view of the week.',
                    'ai_solution' => 'SarathiOS — a personal AI operating system — became their morning command centre: priorities, blockers, team status, customer signals, all surfaced before 9am.',
                    'outcome' => 'Decision velocity doubled. The founder reclaimed 8 hours a week for product and customer work.',
                ],
            ],

            'compliance' => 'For Swiss and EU-incorporated startups, all data handling aligns with the revised Swiss FADP and EU GDPR. For India-incorporated startups, we align with the Digital Personal Data Protection Act, 2023. Investor-grade data rooms and audit logs are available on request.',
        ],

        // ── SMEs ─────────────────────────────────────────────────────────────
        'smes' => [
            'title' => 'SMEs',
            'cta_noun' => 'SME',
            'related_product' => null,
            'related_product_route' => null,
            'headline' => 'Enterprise AI. SME Budget.',
            'description' => 'Practical, affordable AI transformation for small and medium enterprises ready to compete on intelligence.',
            'icon' => 'building',
            'color' => 'indigo',

            'intro' => 'The single biggest competitive opportunity for small and medium enterprises in this decade is that AI now levels the playing field. The capabilities that were the exclusive preserve of Fortune 500 IT departments — voice agents, intelligent automation, real-time dashboards, custom copilots — can now be deployed by a 20-person company in a matter of weeks. The SMEs that move first build durable operating leverage that takes their larger, slower competitors years to replicate. The SMEs that wait, watch a generational gap open up.',

            'pain_points' => [
                'Lean teams stretched across too many functions, with no time to evaluate tools or technology',
                'Existing software stack accumulated over years — fragmented, duplicated, expensive in total',
                'Manual processes (invoicing, scheduling, lead handling, HR admin) silently consume 30%+ of staff hours',
                'Inability to compete on speed of response or service depth with larger, better-resourced rivals',
                'Owner-operators acting as the single point of failure for sales, ops, finance, and people decisions',
                'No bandwidth for change management — every new tool adoption is exhausting for the team',
            ],

            'solutions' => [
                'AI readiness audit with prioritised, ROI-ranked roadmap',
                'AI-powered operations: invoicing, scheduling, vendor management',
                'Sales automation: lead qualification, follow-up sequences, CRM hygiene',
                'HR and payroll intelligence: onboarding bots, leave management, policy assistants',
                'Finance reporting AI: monthly P&L digests, cashflow alerts, anomaly detection',
                'Customer support copilots trained on your business knowledge',
                'WhatsApp and voice automation for inbound and outbound at scale',
                'Managed AI retainers — ongoing optimisation without hiring an in-house AI team',
            ],

            'use_cases' => [
                [
                    'title' => 'Replacing five SaaS tools with one custom copilot',
                    'scenario' => 'A 35-person manufacturing SME was paying for five overlapping productivity tools and still doing data entry manually.',
                    'ai_solution' => 'A custom copilot, integrated with their ERP and CRM, handles invoice lookups, customer queries, and order status — replacing three of the five tools.',
                    'outcome' => 'CHF 22,000/year of SaaS spend eliminated; data entry hours dropped 60%.',
                ],
                [
                    'title' => 'Voice AI for inbound enquiries',
                    'scenario' => 'An SME in professional services missed roughly 30% of after-hours inbound calls — every missed call was a potential six-figure engagement.',
                    'ai_solution' => 'A multilingual voice AI agent handles the entire after-hours inbound: qualifying, booking, and notifying the team with a context brief.',
                    'outcome' => 'Captured 4 new client engagements in the first quarter that would have otherwise been missed.',
                ],
                [
                    'title' => 'Finance reporting automation',
                    'scenario' => 'The owner-operator of a 50-person services firm was spending Saturday mornings pulling monthly reports for the leadership team.',
                    'ai_solution' => 'A finance AI digests transactions from Bexio/Banana, flags anomalies, and produces the monthly leadership brief automatically every first Monday.',
                    'outcome' => 'Six hours a month returned to the owner; leadership now sees the same picture, same day, every month.',
                ],
            ],

            'compliance' => 'All SME engagements are scoped to the relevant data-protection regime: Swiss FADP and EU GDPR for European SMEs, India DPDP Act for Indian SMEs. Data residency options are available, including EU-only and Switzerland-only hosting.',
        ],

        // ── MANUFACTURING ────────────────────────────────────────────────────
        'manufacturing' => [
            'title' => 'Manufacturing',
            'cta_noun' => 'Manufacturing',
            'related_product' => null,
            'related_product_route' => null,
            'headline' => 'Less Downtime. Faster Quotes. Fewer Defects.',
            'description' => 'AI systems for industrial manufacturers — from engineered process equipment and heavy engineering to discrete production — covering predictive maintenance, quality inspection, RFQ automation, and workforce knowledge capture.',
            'icon' => 'cog',
            'color' => 'orange',

            'intro' => 'Manufacturing runs on three margins: uptime, quality, and cycle time. A shift lost to an unplanned stoppage is revenue that will never return. A defective batch caught by the customer instead of the line costs ten times what it would have cost to catch in-house. An RFQ that takes two weeks to price is an RFQ your competitor already answered. AI does not replace the engineers, planners, and supervisors who run the plant — it gives each of them the equivalent of a shift-long assistant who never gets tired, never misses a data point, and remembers every job the plant has ever run. The result is not "smart factory" theatre. It is measurable improvements in OEE, first-pass yield, quote turnaround, and the retention of senior tribal knowledge that too often walks out the door with retirement.',

            'pain_points' => [
                'Unplanned downtime on critical equipment — every stoppage measured in tens of thousands per hour, and root cause discovered only after the fact',
                'Quality inspection depends on tired human eyes on high-throughput lines — defects escape until the customer finds them',
                'Engineered-product RFQs and quotes take 5–15 days because pricing sits in three engineers\' heads and a legacy spreadsheet',
                'ERP, MES, CAD, CRM, and shop-floor data live in five systems that do not talk to each other — no single picture of the job',
                'Senior engineers and shop supervisors retiring with decades of tacit knowledge that was never written down',
                'Global project delivery (installation, commissioning, warranty) coordinated over email and phone — no real-time visibility for customers or management',
            ],

            'solutions' => [
                'Predictive maintenance from vibration, temperature, and PLC/SCADA telemetry — failure warnings hours or days before breakdown',
                'Computer-vision quality inspection integrated into the line (defect detection, dimensional QC, surface finish grading)',
                'AI RFQ / quote copilots that draft engineered pricing from customer specs, historic jobs, and material cost feeds',
                'Production planning and demand forecasting AI — schedules that adapt to changeovers, material availability, and unplanned events',
                'Knowledge-capture AI that ingests engineering drawings, job files, and senior-engineer notes into a searchable, question-answerable plant memory',
                'Voice AI for shop-floor supervisors (multilingual): raise NCRs, log downtime causes, request maintenance without leaving the line',
                'Vendor and supplier risk monitoring (delivery track record, financial signals, single-source dependency alerts)',
                'Customer-facing project portals: real-time production, QA, dispatch, and installation status for large engineered orders',
            ],

            'use_cases' => [
                [
                    'title' => 'Predictive maintenance on a critical extruder',
                    'scenario' => 'A specialty polymer processor was averaging 14 hours a month of unplanned downtime on its main extruder line, at an internal cost of ~€28,000 per lost hour of throughput.',
                    'ai_solution' => 'An AI layer on top of existing vibration and thermal sensors learned the equipment\'s failure signatures over eight weeks, then began issuing 12–72 hour early warnings tied to specific components.',
                    'outcome' => 'Unplanned downtime dropped 62% in the first quarter; maintenance shifted from reactive to planned; the extruder\'s OEE moved from 71% to 84%.',
                ],
                [
                    'title' => 'Engineered-product quote automation',
                    'scenario' => 'A process-equipment manufacturer\'s RFQ turnaround averaged 9 working days because pricing required a senior engineer to model materials, linings, and machining time from scratch each time.',
                    'ai_solution' => 'An AI quote copilot ingests the customer spec, retrieves the three closest historical jobs, drafts a first-pass BOM, and produces a pricing draft with a confidence score for the engineer to review — not replace.',
                    'outcome' => 'Median RFQ turnaround fell from 9 days to 36 hours. The senior engineer\'s time on routine quotes dropped 70%, freeing them for the complex, high-margin enquiries where their judgement actually moves the deal.',
                ],
                [
                    'title' => 'Retiring senior engineer, knowledge preserved',
                    'scenario' => 'A 40-year-old B2B industrial manufacturer was facing the retirement of two senior application engineers within 18 months. Their knowledge of client-specific anti-corrosion and lining selections was almost entirely undocumented.',
                    'ai_solution' => 'A structured knowledge-capture programme paired short weekly interview sessions with an AI that ingested drawings, historical project files, and inspection reports — producing a searchable, question-answerable plant memory available to every engineer.',
                    'outcome' => 'When the first engineer retired, quote-review handoff to the mid-level team took days, not months. Post-retirement, the AI answers roughly 60% of the questions that would previously have gone to him — the remaining 40% is exactly the judgement work that should sit with a human.',
                ],
            ],

            'compliance' => 'Manufacturing engagements are scoped to the relevant data-protection regime (EU GDPR, Swiss FADP, India DPDP Act) with additional controls for operational-technology environments: air-gapped or on-premise inference where the plant network demands it, no training of external models on customer drawings or specifications, and integration with existing safety and quality frameworks (ISO 9001, ISO 14001, IATF 16949, ATEX where applicable). Data residency in Switzerland, EU, or India is available.',
        ],

        // ── REAL ESTATE ──────────────────────────────────────────────────────
        'real-estate' => [
            'title' => 'Real Estate',
            'cta_noun' => 'Real Estate',
            'related_product' => null,
            'related_product_route' => null,
            'headline' => 'Close More. Manage Better. Grow Faster.',
            'description' => 'AI tools for property management, lead qualification, client communication, and market intelligence.',
            'icon' => 'home',
            'color' => 'emerald',

            'intro' => 'Real estate is a business of inventory, attention, and timing. Listings that surface in front of the right buyer in the first 48 hours sell at higher prices. Leads contacted in the first five minutes convert at 8x the rate of leads contacted after 30. Agents who follow up consistently across 8–12 touchpoints close deals that everyone else loses. None of these are problems of effort — they are problems of operational discipline that humans fail at predictably. AI does not get tired, distracted, or unmotivated. Deployed thoughtfully, it becomes the operational layer that turns a good agent into an unbeatable one.',

            'pain_points' => [
                'Inbound enquiries lost to slow first-response time — by hour 2 the lead is already talking to a competitor',
                'Inconsistent follow-up: agents give up after 3 touchpoints when the typical sale needs 8–12',
                'Listing description writing eats hours per property and is wildly inconsistent across portfolios',
                'No structured way to compare market signals (price, supply, time-on-market) without a paid analyst',
                'Client portfolio updates and quarterly reviews delayed because manually compiling data is painful',
                'Investor enquiries (NRIs, expats, fund managers) need rapid, polished, multilingual responses — and rarely get them',
            ],

            'solutions' => [
                'AI lead qualification with intent scoring and instant routing',
                'Multilingual voice agents for inbound property enquiries (24/7)',
                'Automated, personalised property follow-up sequences',
                'AI listing description writer (English, German, French, Hindi)',
                'Market intelligence dashboards with comparables, trends, and absorption rates',
                'Investor and NRI client portals with quarterly portfolio reporting',
                'WhatsApp automation for site-visit booking and reminders',
                'Property document AI: title checks, lease parsing, due-diligence summaries',
            ],

            'use_cases' => [
                [
                    'title' => 'NRI investor pipeline automation',
                    'scenario' => 'A boutique real estate firm in India was losing high-net-worth NRI enquiries because time-zone gaps delayed responses by 12–18 hours.',
                    'ai_solution' => 'A multilingual voice + WhatsApp agent qualifies investor enquiries 24/7, books site-visit slots with local time conversion, and sends a polished investment brief in under 90 seconds.',
                    'outcome' => 'NRI enquiry-to-site-visit conversion rose from 14% to 41%.',
                ],
                [
                    'title' => 'Listing description and SEO at scale',
                    'scenario' => 'A 12-agent firm took 90 minutes per listing to write a description, generate matching social copy, and SEO-tag the page.',
                    'ai_solution' => 'An AI listing engine drafts polished descriptions in the firm\'s tone, generates Instagram and LinkedIn variants, and applies local SEO best practice automatically.',
                    'outcome' => 'Per-listing time dropped to under 12 minutes; organic listing traffic up 3x in 90 days.',
                ],
                [
                    'title' => 'Quarterly investor reporting',
                    'scenario' => 'A property management firm with 80 owner-clients spent the first two weeks of every quarter producing reports.',
                    'ai_solution' => 'An AI report generator pulls occupancy, rent collection, maintenance, and market data per property and produces the personalised quarterly brief automatically.',
                    'outcome' => 'Quarterly reporting time fell 80%; clients reported visibly better communication scores.',
                ],
            ],

            'compliance' => 'KYC, AML, and customer-data handling are designed to meet the regulatory standards of each jurisdiction we deliver in: Swiss FADP for Switzerland, GDPR for the EU, India DPDP Act and SEBI/RERA-aligned disclosures for India.',
        ],

        // ── HOSPITALITY ──────────────────────────────────────────────────────
        'hospitality' => [
            'title' => 'Hospitality',
            'cta_noun' => 'Hospitality',
            'related_product' => 'HSI OS',
            'related_product_route' => 'products.hsios',
            'headline' => 'Deliver 5-Star Experiences at Scale.',
            'description' => 'AI-driven guest experiences, booking automation, and operational intelligence for hotels and restaurants.',
            'icon' => 'star',
            'color' => 'amber',

            'intro' => 'Hospitality is a business of warmth, repetition, and 11pm bookings. The repetition — confirmations, reminders, FAQ, scheduling — is exactly what AI does better than humans: no fatigue, no inconsistency, no missed calls at 2am when a leisure traveller finally has time to book. The warmth — the actual hospitality — is what humans do better than any machine will ever do. Hospitality businesses that win this decade are not the ones replacing their team with AI. They are the ones using AI to handle the operational layer so their team can spend every minute on the human one.',

            'pain_points' => [
                'After-hours, weekend, and lunchtime bookings missed because reservation desk is closed or overloaded',
                'Pre-arrival communication is templated and impersonal, missing high-value upsell moments',
                'Reviews go unanswered for days because no one has bandwidth for thoughtful, on-brand replies',
                'Multilingual guest enquiries answered slowly or in broken phrasing, hurting premium positioning',
                'Inventory and dynamic pricing decisions made on intuition rather than real-time demand signals',
                'Front-of-house staff drained by repetitive Tier-1 enquiries that could be answered by an AI agent',
            ],

            'solutions' => [
                'AI voice concierge for inbound reservations (24/7, multilingual)',
                'Booking automation across PMS (Mews, Cloudbeds, etc.) and direct channels',
                'AI-personalised pre-arrival emails based on guest profile, occasion, and stay history',
                'Review monitoring and on-brand AI reply drafts (Tripadvisor, Google, Booking.com)',
                'Dynamic pricing intelligence with real-time competitor and demand signals',
                'AI scheduling assistant matching staff to predicted demand',
                'In-stay guest copilot (WhatsApp) for amenities, recommendations, late check-out, etc.',
                'Restaurant table and event-space booking automation with deposit handling',
            ],

            'use_cases' => [
                [
                    'title' => 'After-hours booking recovery',
                    'scenario' => 'A Swiss boutique hotel was losing roughly 28% of inbound enquiries that arrived between 19:00 and 09:00, because the reservation desk was unstaffed.',
                    'ai_solution' => 'A multilingual AI voice agent (EN/DE/FR) handles the entire after-hours channel: availability, payment, confirmation email, and PMS update.',
                    'outcome' => 'After-hours bookings up 34% in 60 days; reservation team redeployed to guest-experience upsell during day hours.',
                ],
                [
                    'title' => 'Personalised pre-arrival emails',
                    'scenario' => 'A hospitality group sent the same mail-merge pre-arrival email to every guest, missing thousands of upsell moments per year.',
                    'ai_solution' => 'An AI engine drafts a genuinely personalised pre-arrival email per booking, referencing past stays, the booking occasion, and locally relevant suggestions.',
                    'outcome' => 'Pre-arrival upsell revenue up 18%; NPS scores improved measurably.',
                ],
                [
                    'title' => 'AI-drafted review replies',
                    'scenario' => 'A property GM was the only person replying to reviews — typical lag was 6 days, and several negative reviews were going unaddressed.',
                    'ai_solution' => 'An AI assistant drafts a polished, on-brand reply for every new review (positive and negative), flagging escalations and queuing replies for one-click approval.',
                    'outcome' => 'Review response time dropped from 6 days to under 4 hours; review-influenced bookings rose noticeably.',
                ],
            ],

            'compliance' => 'Guest data handling aligns with Swiss FADP, EU GDPR, and where applicable PCI-DSS for payment data and India DPDP Act for Indian properties. Data residency in Switzerland or the EU is available for properties that require it.',
        ],

        // ── INTERIOR DESIGN ──────────────────────────────────────────────────
        'interior-design' => [
            'title' => 'Interior Design',
            'cta_noun' => 'Interior Design',
            'related_product' => 'HSI OS',
            'related_product_route' => 'products.hsios',
            'headline' => 'Design Smarter. Execute Flawlessly.',
            'description' => 'The AI operating system for interior designers, renovation firms, and architecture studios.',
            'icon' => 'paint-brush',
            'color' => 'pink',

            'intro' => 'Interior design is creative work surrounded by an operations problem. The design is the easy part. The hard part is co-ordinating 20+ vendors, keeping a client informed without being interrupted every 30 minutes, tracking three concurrent projects each at a different phase, and producing reliable budgets in a market where material prices move weekly. Most studios solve this with brute force — long hours, project managers, spreadsheets that nobody trusts. AI offers something better: an operating layer purpose-built for the way design projects actually run, which is messy, non-linear, and dependent on dozens of partial-information conversations a day.',

            'pain_points' => [
                'Vendor coordination eats 40%+ of project manager time and is the leading cause of timeline slip',
                'Client communication is sporadic and reactive — clients chase the studio, eroding the relationship',
                'Budgets quoted at month 0 are stale by month 2 because nothing automatically tracks variance',
                'Visual proposals (mood boards, 3D renders, vendor specs) take days to produce per iteration',
                'Same questions asked by every new client — "what about wood quality?", "how about timeline?" — answered manually every time',
                'Multi-project portfolio visibility is poor; the principal cannot quickly see which project is at risk this week',
            ],

            'solutions' => [
                'AI project timeline assistant — auto-detects risks and surfaces them before they become delays',
                'Client portal with on-demand AI status updates and approvals',
                'Vendor coordination copilot (specs, quotes, deliverable tracking)',
                'AI-assisted budget intelligence with live variance tracking and re-forecasts',
                'AI proposal generator (brief → first-pass design narrative + estimate)',
                'AI FAQ assistant trained on the studio\'s tone, materials, and policies',
                'Studio-wide portfolio dashboard for the principal: every project, every week',
                'Document AI for contracts, change orders, and vendor agreements',
            ],

            'use_cases' => [
                [
                    'title' => 'Vendor coordination at scale',
                    'scenario' => 'A 12-person studio was managing 9 concurrent projects, each with 15–25 vendors. Project managers were burning out from coordination overhead.',
                    'ai_solution' => 'HSI OS — purpose-built for interior firms — runs vendor specs, quote chasers, delivery tracking, and exception flagging on autopilot.',
                    'outcome' => 'Project manager coordination time dropped 50%. Two projects ahead of schedule for the first time in the studio\'s history.',
                ],
                [
                    'title' => 'AI-drafted client proposals',
                    'scenario' => 'The principal designer was the bottleneck for every new proposal — each one took two days of her time.',
                    'ai_solution' => 'A proposal AI takes the discovery brief and produces a first-pass narrative, scope outline, and rough estimate in under 30 minutes for the principal to refine.',
                    'outcome' => 'Proposal turnaround dropped from 5 days to 24 hours. Conversion to signed contract rose 22%.',
                ],
                [
                    'title' => 'Client portal with proactive status',
                    'scenario' => 'Clients were chasing the studio weekly with the same questions: where are we, what is left, what is next.',
                    'ai_solution' => 'A client-facing portal answers these questions automatically with real-time data from the project tracker, freeing the team from the chase-loop.',
                    'outcome' => 'Client satisfaction up; "where are we?" emails down 80%; clear improvement in repeat business.',
                ],
            ],

            'compliance' => 'Client data (floor plans, financial detail, personal addresses) is handled under Swiss FADP, EU GDPR, and India DPDP standards. Studios serving UHNW clients can request additional data residency and confidentiality protections.',
        ],

        // ── HEALTHCARE ───────────────────────────────────────────────────────
        'healthcare' => [
            'title' => 'Healthcare',
            'cta_noun' => 'Healthcare',
            'related_product' => null,
            'related_product_route' => null,
            'headline' => 'Better Patient Outcomes. Less Admin.',
            'description' => 'GDPR, Swiss FADP, and India DPDP-aligned AI solutions for clinics, hospitals, and health-tech companies.',
            'icon' => 'heart',
            'color' => 'red',

            'intro' => 'In healthcare, every minute clinicians spend on administrative work is a minute not spent with patients. The numbers are well-documented: physicians spend roughly 50% of their working hours on documentation, scheduling, and paperwork. The opportunity for AI is not to make medical decisions — those remain firmly with clinicians — but to remove the operational burden around them, so the highest-cost, highest-skilled humans in the building spend their time on what only they can do.',

            'pain_points' => [
                'Documentation burden — clinicians writing notes after hours, "pyjama-time" documentation, burnout risk rising',
                'Reception and front-desk drowning in appointment, billing, and routine clinical-question calls',
                'Patient pre-visit instructions inconsistent, increasing no-show rates and incomplete intakes',
                'Insurance pre-authorisation and claims taking days when patients are waiting on care',
                'Post-discharge follow-up patchy, hurting outcomes and readmission rates',
                'Multilingual patient populations underserved by communication systems built for one language',
            ],

            'solutions' => [
                'AI clinical documentation assistant (clinician-supervised; never autonomous)',
                'Appointment automation: booking, reminders, rescheduling, no-show prediction',
                'Patient communication copilots (multilingual, escalates urgent cases to clinical staff)',
                'AI-assisted insurance pre-auth and claims workflow',
                'Pre-visit and post-discharge instruction personalisation',
                'Analytics dashboards: capacity, no-shows, patient flow, payer mix',
                'Voice intake for non-clinical front-desk volume',
                'Knowledge-base AI for staff training and policy quick-reference',
            ],

            'use_cases' => [
                [
                    'title' => 'Reducing documentation overhead',
                    'scenario' => 'A multi-specialty clinic\'s physicians averaged 90 minutes a day on after-hours documentation, contributing to attrition.',
                    'ai_solution' => 'An AI clinical documentation copilot drafts notes from the consultation, clinician edits and signs off — the clinician remains fully in control.',
                    'outcome' => 'After-hours documentation time fell 70%. Physician satisfaction scores rose; attrition dropped.',
                ],
                [
                    'title' => 'No-show reduction with AI reminders',
                    'scenario' => 'A clinic had a 19% no-show rate, costing roughly CHF 380,000/year in unused capacity.',
                    'ai_solution' => 'An AI scheduler predicts high-risk no-shows, sends multilingual reminders with one-tap rescheduling, and fills cancellations from a waitlist automatically.',
                    'outcome' => 'No-show rate dropped to 9%; recovered capacity equivalent to one additional clinician.',
                ],
                [
                    'title' => 'Multilingual front-desk for diverse populations',
                    'scenario' => 'A hospital in an expatriate-heavy city was struggling to handle enquiries in English, German, French, Italian, and Arabic with a small front-desk team.',
                    'ai_solution' => 'A voice AI agent triages and answers all routine enquiries in the patient\'s preferred language; clinical queries are escalated with a translated summary.',
                    'outcome' => 'Routine query handling time down 60%. Patient satisfaction in non-German-speaking groups improved.',
                ],
            ],

            'compliance' => 'Healthcare engagements are designed under the strictest applicable framework — EU GDPR, Swiss FADP, India DPDP Act — with additional sector-specific safeguards: KKL/HIN compliance for Switzerland where relevant, NDHM alignment for India, and clinician-supervised workflows for any documentation use case. Data residency in Switzerland, EU, or India is available. No clinical decisioning is automated.',
        ],

        // ── EDUCATION ────────────────────────────────────────────────────────
        'education' => [
            'title' => 'Education',
            'cta_noun' => 'Education',
            'related_product' => null,
            'related_product_route' => null,
            'headline' => 'Personalised Learning. Scalable Impact.',
            'description' => 'AI tools for EdTech companies, schools, and professional training organisations.',
            'icon' => 'academic-cap',
            'color' => 'violet',

            'intro' => 'Education is where personalisation has the highest learning impact and the lowest historical feasibility. Every teacher knows their students learn differently. Every parent knows their child responds to one teaching style and not another. Until now, personalising at scale was not possible — there were not enough teachers, hours, or pedagogical tools to do it. AI does not replace teachers. It gives every teacher and every learner the equivalent of a personal teaching assistant: ready, patient, available at 11pm before the exam, and aligned to how that specific learner thinks.',

            'pain_points' => [
                'One-size-fits-all instruction means top students are bored and struggling students are lost',
                'Admin overhead — admissions, enrolment, scheduling, reporting — consumes time better spent teaching',
                'Student support questions arriving at 8pm with no human to respond until the next morning',
                'Content creation (lesson plans, assessments, study guides) eats 8+ hours a week per teacher',
                'Visibility into learner progress is rear-view, not real-time — interventions arrive too late',
                'Multilingual learner populations have no scalable way to access the same quality of explanation',
            ],

            'solutions' => [
                'AI tutoring copilots aligned to the institution\'s curriculum (clear scope, no off-topic drift)',
                'Admissions and enquiry automation: 24/7 conversational agent that qualifies and books interviews',
                'Lesson-plan and assessment AI for teachers (drafts, teacher reviews and finalises)',
                'Student analytics dashboards: at-risk identification, intervention recommendations',
                'Multilingual content adaptation (English to German, French, Hindi, etc.)',
                'Parent communication automation with structured progress summaries',
                'Knowledge-base AI for student support (policies, deadlines, financial aid FAQs)',
                'Voice and chat agents for scheduling, library, IT support, etc.',
            ],

            'use_cases' => [
                [
                    'title' => 'AI tutoring aligned to curriculum',
                    'scenario' => 'An EdTech platform offered video lessons but had no support model for the inevitable "I do not understand this step" moments.',
                    'ai_solution' => 'A curriculum-aligned AI tutor answers conceptual questions in the platform\'s teaching style, never going off-syllabus.',
                    'outcome' => 'Lesson completion rate up 27%. Refund requests down 42%.',
                ],
                [
                    'title' => 'Admissions enquiry automation',
                    'scenario' => 'An international school received 200+ enquiries during admissions season and was losing prospective families to slower response times.',
                    'ai_solution' => 'A multilingual admissions AI agent qualifies prospective families, answers fee and curriculum questions, and books interviews with the admissions team automatically.',
                    'outcome' => 'Enquiry-to-interview conversion up 38%. Admissions team capacity recovered for relationship-building, not data entry.',
                ],
                [
                    'title' => 'Teacher workflow assistant',
                    'scenario' => 'Secondary-school teachers were burning out from lesson planning, marking, and parent communication on top of teaching itself.',
                    'ai_solution' => 'An AI workflow assistant drafts lesson plans, generates differentiated assessments, and produces parent communications in the teacher\'s voice.',
                    'outcome' => 'Teacher administrative time down 5–8 hours a week. Retention measurably improved.',
                ],
            ],

            'compliance' => 'Education engagements involving minors apply additional protections beyond GDPR / Swiss FADP / India DPDP — including age-verification, parental consent flows, and tightened data minimisation. We never train external models on student data, and audit-grade data flow documentation is provided.',
        ],

        // ── PROFESSIONAL SERVICES ────────────────────────────────────────────
        'professional-services' => [
            'title' => 'Professional Services',
            'cta_noun' => 'Professional Services',
            'related_product' => null,
            'related_product_route' => null,
            'headline' => 'Deliver More Value. Bill Fewer Hours.',
            'description' => 'AI systems for law firms, accounting firms, consultancies, and agencies.',
            'icon' => 'briefcase',
            'color' => 'slate',

            'intro' => 'Professional services have a paradox at their core: clients pay for partner-level judgement, but the firm captures partner value only when partners spend their time on judgement work. In reality, 40–60% of partner time goes to research, document drafting, status updates, and proposal writing — work that depends on partner-level knowledge but does not require it in real time. AI changes the leverage equation. A partner with a well-built AI infrastructure operates with the throughput of two — and the firm captures the upside.',

            'pain_points' => [
                'Partners stuck on drafting and research work that juniors should do, but juniors are not yet trained for',
                'Knowledge silos: the firm\'s real expertise lives in three partners\' heads and nobody else\'s',
                'Proposal generation: 6–10 hours per pitch, and most pitches still feel templated to the prospect',
                'Client status updates inconsistent across partners — some are diligent, others are weeks behind',
                'Research costs: legal/business databases, paid analyst time, hours per matter that nobody can recover',
                'Onboarding new associates is slow because tacit firm knowledge is rarely documented',
            ],

            'solutions' => [
                'Document intelligence: contract analysis, due-diligence summarisation, clause comparison',
                'Research copilots trained on the firm\'s precedents, decisions, and house style',
                'Proposal generation AI (brief → first-draft pitch in firm voice)',
                'Client reporting automation: structured monthly status, billable transparency',
                'Knowledge management AI: partner expertise captured and made searchable',
                'Conflict-check and compliance copilots',
                'Time-capture automation: AI suggests time entries from calendar, email, and document activity',
                'Onboarding copilots for new associates: house style, policies, and precedent access',
            ],

            'use_cases' => [
                [
                    'title' => 'AI-assisted due diligence',
                    'scenario' => 'A boutique corporate firm regularly took 5 days of associate time to summarise a target company\'s contracts and risks for an M&A engagement.',
                    'ai_solution' => 'A document AI ingests the data room, produces clause-level summaries, flags non-standard terms, and prepares the first draft of the diligence memo.',
                    'outcome' => 'Diligence cycle dropped from 5 days to under 1. Partner review time on the memo became the bottleneck — exactly where partner attention should sit.',
                ],
                [
                    'title' => 'Proposal generation copilot',
                    'scenario' => 'A consulting firm partner was the bottleneck for every new business pitch, with each one taking 8 hours of her week.',
                    'ai_solution' => 'A proposal AI trained on past winning pitches drafts the structure, case studies, and pricing in the partner\'s voice for her to refine.',
                    'outcome' => 'Pitch turnaround 24 hours instead of 4 days. Win rate improved as the firm could pitch on more opportunities.',
                ],
                [
                    'title' => 'Knowledge capture across partner rotations',
                    'scenario' => 'A law firm was losing decades of precedent knowledge every time a senior partner retired.',
                    'ai_solution' => 'A knowledge AI ingests historical engagements, partner notes, and decisions, making the firm\'s tacit expertise searchable and reusable.',
                    'outcome' => 'New-associate ramp time halved. Junior partners measurably more confident on complex matters earlier.',
                ],
            ],

            'compliance' => 'Professional services engagements include confidentiality-grade controls: ring-fenced models, no training on client data, audit logs, and conflict-check workflows. Compliance with Swiss FADP, EU GDPR, and India DPDP is standard; legal-privilege boundaries are explicitly mapped in every engagement.',
        ],

    ];

    public function index(): View
    {
        return view('industries.index', ['industries' => $this->industries]);
    }

    public function show(string $slug): View
    {
        $industry = $this->industries[$slug] ?? abort(404);

        $relatedCaseStudies = collect();
        if (isset($this->caseStudyDomainMap[$slug])) {
            try {
                $relatedCaseStudies = CaseStudy::published()
                    ->where('domain', $this->caseStudyDomainMap[$slug])
                    ->orderByDesc('is_featured')
                    ->orderBy('order')
                    ->take(6)
                    ->get();
            } catch (\Exception $e) {
                $relatedCaseStudies = collect();
            }
        }

        return view('industries.show', compact('industry', 'slug', 'relatedCaseStudies'));
    }

    public function getIndustries(): array
    {
        return $this->industries;
    }
}
