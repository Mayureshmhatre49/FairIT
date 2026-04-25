<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServicesController extends Controller
{
    public function index(): View
    {
        return view('services.index');
    }

    public function advisory(): View
    {
        return view('services.advisory', [
            'service' => [
                'title'       => 'AI Transformation Advisory',
                'tagline'     => 'Transform your business with strategic AI leadership',
                'description' => 'Full-spectrum AI readiness audits, strategic roadmaps, ROI prioritization, and leadership workshops to guide your organisation through intelligent transformation.',
                'icon'        => 'brain',
                'color'       => 'blue',
                'benefits'    => [
                    'Clear AI readiness score across all business functions',
                    'Prioritised 90-day and 12-month AI roadmap',
                    'ROI models and business case documentation',
                    'Executive workshop and change management plan',
                    'Vendor-agnostic technology recommendations',
                ],
                'deliverables' => [
                    'AI Readiness Audit Report',
                    'Strategic AI Roadmap (PDF + slide deck)',
                    'ROI Calculator & Business Case',
                    'Technology Stack Recommendation',
                    'Executive Briefing Session',
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Discovery & Audit', 'desc' => 'We assess your current operations, data maturity, team capabilities, and competitive landscape.'],
                    ['step' => '02', 'title' => 'Gap Analysis', 'desc' => 'We identify the highest-impact AI opportunities and map them to your business goals.'],
                    ['step' => '03', 'title' => 'Roadmap Creation', 'desc' => 'We build a phased, actionable AI roadmap with clear milestones and success metrics.'],
                    ['step' => '04', 'title' => 'Leadership Alignment', 'desc' => 'We run executive workshops to align leadership on the vision and secure buy-in.'],
                    ['step' => '05', 'title' => 'Kickoff & Handover', 'desc' => 'We deliver all assets and remain available for implementation support.'],
                ],
                'cta_text'  => 'Book Strategy Session',
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => 'How long does the advisory engagement take?', 'a' => 'A standard AI Transformation Advisory engagement runs 4–8 weeks, depending on organisation size and complexity.'],
                    ['q' => 'Do we need to have existing AI infrastructure?', 'a' => 'No. We work with companies at every stage — from zero AI to advanced implementations seeking optimisation.'],
                    ['q' => 'What industries do you serve?', 'a' => 'We serve startups, SMEs, real estate, hospitality, professional services, healthcare, and education.'],
                ],
            ],
        ]);
    }

    public function copilot(): View
    {
        return view('services.copilot', [
            'service' => [
                'title'       => 'Custom AI Copilot Development',
                'tagline'     => 'Build the AI brain your business has been waiting for',
                'description' => 'We design and build bespoke AI copilots for CEOs, sales teams, HR, operations, and support — trained on your data, tuned to your workflows.',
                'icon'        => 'cpu',
                'color'       => 'indigo',
                'benefits'    => [
                    'AI copilot trained on your company knowledge and SOPs',
                    'Integrates with existing tools (CRM, ERP, Slack, email)',
                    'Reduces repetitive decisions by 60–80%',
                    'Available 24/7 for your entire team',
                    'Continuous learning and improvement',
                ],
                'deliverables' => [
                    'Custom-built AI Copilot (web/API/Slack)',
                    'Knowledge base integration',
                    'Admin dashboard for management',
                    'Team training & documentation',
                    '30-day post-launch support',
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Use Case Definition', 'desc' => 'We identify the highest-value copilot use cases for your team.'],
                    ['step' => '02', 'title' => 'Data & Knowledge Mapping', 'desc' => 'We map your existing knowledge, docs, SOPs, and data sources.'],
                    ['step' => '03', 'title' => 'Design & Architecture', 'desc' => 'We design the copilot architecture, integrations, and user experience.'],
                    ['step' => '04', 'title' => 'Build & Test', 'desc' => 'We build, fine-tune, and rigorously test the copilot against real scenarios.'],
                    ['step' => '05', 'title' => 'Deploy & Train', 'desc' => 'We deploy to your environment and train your team for maximum adoption.'],
                ],
                'cta_text'  => 'Request Demo',
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => 'What data does the copilot use?', 'a' => 'The copilot is trained on your internal documents, SOPs, CRM data, emails, and any other sources you provide. All data remains private.'],
                    ['q' => 'How long does it take to build?', 'a' => 'MVP copilots are typically delivered in 4–8 weeks. Complex multi-department copilots may take 10–16 weeks.'],
                    ['q' => 'Can it integrate with our existing software?', 'a' => 'Yes. We integrate with Slack, Teams, HubSpot, Salesforce, Google Workspace, and most major platforms via API.'],
                ],
            ],
        ]);
    }

    public function voiceai(): View
    {
        return view('services.voiceai', [
            'service' => [
                'title'       => 'Voice AI & Conversational Automation',
                'tagline'     => 'Conversations that convert, at scale, around the clock',
                'description' => 'Multilingual AI voice agents, booking bots, WhatsApp automation, and intelligent support bots that handle real conversations at enterprise scale.',
                'icon'        => 'microphone',
                'color'       => 'violet',
                'benefits'    => [
                    'Handle inbound calls 24/7 without human agents',
                    'Multilingual support across 40+ languages',
                    'Automated booking, lead qualification, and support',
                    'WhatsApp and SMS automation included',
                    '90%+ call deflection rate achievable',
                ],
                'deliverables' => [
                    'Configured AI Voice Agent',
                    'WhatsApp / SMS Bot integration',
                    'Booking & calendar sync',
                    'Call analytics dashboard',
                    'Escalation workflow to human agents',
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Script & Flow Design', 'desc' => 'We map every conversation scenario and design natural, on-brand scripts.'],
                    ['step' => '02', 'title' => 'Voice Cloning / Selection', 'desc' => 'Choose from premium voices or clone your brand voice for a consistent experience.'],
                    ['step' => '03', 'title' => 'Integration & Testing', 'desc' => 'We integrate with your CRM, calendar, and phone system, then stress-test every flow.'],
                    ['step' => '04', 'title' => 'Go Live & Monitor', 'desc' => 'We launch and monitor performance, optimising based on real call data.'],
                    ['step' => '05', 'title' => 'Ongoing Optimisation', 'desc' => 'Monthly reviews ensure your voice AI keeps improving.'],
                ],
                'cta_text'  => 'See Use Cases',
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => 'Can the voice AI handle complex queries?', 'a' => 'Yes. Our voice agents handle multi-turn conversations, handle objections, and escalate gracefully when needed.'],
                    ['q' => 'Does it work in multiple languages?', 'a' => 'Yes. We support 40+ languages and can deploy region-specific agents simultaneously.'],
                    ['q' => 'How quickly can it be deployed?', 'a' => 'A basic voice agent can go live in 2–3 weeks. Complex enterprise deployments take 4–8 weeks.'],
                ],
            ],
        ]);
    }

    public function retainers(): View
    {
        return view('services.retainers', [
            'service' => [
                'title'       => 'Managed AI Retainers',
                'tagline'     => 'Your dedicated AI team, without the overhead',
                'description' => 'Monthly retainer engagements for ongoing AI optimisation, workflow automation, bot management, reporting, and continuous innovation support.',
                'icon'        => 'shield-check',
                'color'       => 'emerald',
                'benefits'    => [
                    'Dedicated AI team available monthly',
                    'Continuous optimisation of existing AI systems',
                    'New automation workflows each month',
                    'Monthly performance reporting',
                    'Priority access to new AI capabilities',
                ],
                'deliverables' => [
                    'Monthly AI Performance Report',
                    'New Automation Workflow (per month)',
                    'Bot & System Maintenance',
                    'Bi-weekly Strategy Calls',
                    'Roadmap Updates',
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Onboarding', 'desc' => 'We document your existing AI stack and establish performance baselines.'],
                    ['step' => '02', 'title' => 'Monthly Planning', 'desc' => 'We align on priorities and deliverables for the month.'],
                    ['step' => '03', 'title' => 'Execution', 'desc' => 'Our team builds, optimises, and monitors your AI systems.'],
                    ['step' => '04', 'title' => 'Review & Reporting', 'desc' => 'We deliver performance reports and ROI analysis.'],
                    ['step' => '05', 'title' => 'Innovate', 'desc' => 'We proactively identify new opportunities each month.'],
                ],
                'cta_text'  => 'Talk to Expert',
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => 'What is the minimum retainer commitment?', 'a' => 'We require a minimum 3-month commitment to ensure meaningful outcomes. Most clients stay 12+ months.'],
                    ['q' => 'What is included in the monthly retainer?', 'a' => 'Deliverables are scoped at the start based on your priorities. Typically includes 1 new automation, system maintenance, reporting, and strategy calls.'],
                    ['q' => 'Can I scale the retainer up or down?', 'a' => 'Yes. Retainers are flexible and can be scaled with 30 days notice.'],
                ],
            ],
        ]);
    }

    public function founder(): View
    {
        return view('services.founder', [
            'service' => [
                'title'       => 'Founder Growth Advisory',
                'tagline'     => 'The AI-powered operating system for ambitious leaders',
                'description' => 'High-level strategic AI systems, decision frameworks, and operating infrastructure for founders, CEOs, and business leaders who want to move faster.',
                'icon'        => 'rocket',
                'color'       => 'orange',
                'benefits'    => [
                    'Personal AI command centre for decision-making',
                    'Strategic clarity on business priorities',
                    'Time recovery through intelligent automation',
                    'Fundraising and investor-readiness support',
                    'Accountability and execution frameworks',
                ],
                'deliverables' => [
                    'Founder AI Operating System',
                    'Growth Command Centre Dashboard',
                    'Decision Intelligence Framework',
                    'Monthly 1:1 Strategy Sessions',
                    'Priority Support Access',
                ],
                'process' => [
                    ['step' => '01', 'title' => 'Founder Intake', 'desc' => 'Deep-dive session to understand your business, vision, challenges, and goals.'],
                    ['step' => '02', 'title' => 'OS Design', 'desc' => 'We design your personalised Founder OS — tools, workflows, and AI stack.'],
                    ['step' => '03', 'title' => 'Build & Configure', 'desc' => 'We build and configure all systems, dashboards, and automations.'],
                    ['step' => '04', 'title' => 'Onboarding Sprint', 'desc' => 'We onboard you to your new system and embed it into your daily operations.'],
                    ['step' => '05', 'title' => 'Monthly Advisory', 'desc' => 'Ongoing monthly sessions to evolve your system as your business grows.'],
                ],
                'cta_text'  => 'Apply Now',
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => 'Is this only for tech founders?', 'a' => 'No. We work with founders across all industries — from retail to healthcare to professional services.'],
                    ['q' => 'How is this different from generic coaching?', 'a' => 'This is not coaching. We build real AI systems that change how you operate every day. The focus is on infrastructure, not advice.'],
                    ['q' => 'Do I need technical knowledge?', 'a' => 'No. We handle all the technical implementation. You focus on your business outcomes.'],
                ],
            ],
        ]);
    }
}
