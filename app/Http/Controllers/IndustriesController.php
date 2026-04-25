<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class IndustriesController extends Controller
{
    private array $industries = [
        'startups' => [
            'title'       => 'Startups',
            'headline'    => 'Move Faster. Decide Better. Scale Smarter.',
            'description' => 'AI systems that give early-stage and growth-stage startups the operational leverage of a team 10x their size.',
            'icon'        => 'rocket',
            'color'       => 'blue',
            'solutions'   => ['AI Copilots for founding teams', 'Automated customer support', 'Growth intelligence dashboards', 'Investor-ready reporting automation'],
        ],
        'smes' => [
            'title'       => 'SMEs',
            'headline'    => 'Enterprise AI. SME Budget.',
            'description' => 'Practical, affordable AI transformation for small and medium enterprises ready to compete on intelligence.',
            'icon'        => 'building',
            'color'       => 'indigo',
            'solutions'   => ['AI-powered operations', 'Sales automation', 'HR & payroll intelligence', 'Finance reporting AI'],
        ],
        'real-estate' => [
            'title'       => 'Real Estate',
            'headline'    => 'Close More. Manage Better. Grow Faster.',
            'description' => 'AI tools for property management, lead qualification, client communication, and market intelligence.',
            'icon'        => 'home',
            'color'       => 'emerald',
            'solutions'   => ['AI lead qualification', 'Automated property reports', 'Client follow-up bots', 'Market analysis dashboards'],
        ],
        'hospitality' => [
            'title'       => 'Hospitality',
            'headline'    => 'Deliver 5-Star Experiences at Scale.',
            'description' => 'AI-driven guest experiences, booking automation, and operational intelligence for hotels and restaurants.',
            'icon'        => 'star',
            'color'       => 'amber',
            'solutions'   => ['AI concierge & guest bots', 'Booking automation', 'Review intelligence', 'Staff scheduling AI'],
        ],
        'interior-design' => [
            'title'       => 'Interior Design',
            'headline'    => 'Design Smarter. Execute Flawlessly.',
            'description' => 'The AI operating system for interior designers, renovation firms, and architecture studios.',
            'icon'        => 'paint-brush',
            'color'       => 'pink',
            'solutions'   => ['Project management AI', 'Client proposal automation', 'Vendor coordination', 'Budget & timeline intelligence'],
        ],
        'healthcare' => [
            'title'       => 'Healthcare',
            'headline'    => 'Better Patient Outcomes. Less Admin.',
            'description' => 'HIPAA-aware AI solutions for clinics, hospitals, and health-tech companies.',
            'icon'        => 'heart',
            'color'       => 'red',
            'solutions'   => ['Patient communication AI', 'Appointment automation', 'Clinical documentation assistance', 'Analytics dashboards'],
        ],
        'education' => [
            'title'       => 'Education',
            'headline'    => 'Personalised Learning. Scalable Impact.',
            'description' => 'AI tools for EdTech companies, schools, and professional training organisations.',
            'icon'        => 'academic-cap',
            'color'       => 'violet',
            'solutions'   => ['AI tutors & learning assistants', 'Admissions automation', 'Student analytics', 'Content generation AI'],
        ],
        'professional-services' => [
            'title'       => 'Professional Services',
            'headline'    => 'Deliver More Value. Bill Fewer Hours.',
            'description' => 'AI systems for law firms, accounting firms, consultancies, and agencies.',
            'icon'        => 'briefcase',
            'color'       => 'slate',
            'solutions'   => ['Document intelligence', 'Client reporting automation', 'Research copilots', 'Proposal generation AI'],
        ],
    ];

    public function index(): View
    {
        return view('industries.index', ['industries' => $this->industries]);
    }

    public function show(string $slug): View
    {
        $industry = $this->industries[$slug] ?? abort(404);
        return view('industries.show', compact('industry', 'slug'));
    }
}
