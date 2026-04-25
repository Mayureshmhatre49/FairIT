<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_leads'         => Lead::count(),
            'new_leads'           => Lead::where('status', 'new')->count(),
            'consultations'       => Lead::where('type', 'consultation')->count(),
            'total_posts'         => Post::count(),
            'published_posts'     => Post::published()->count(),
            'total_testimonials'  => Testimonial::count(),
        ];

        $recentLeads = Lead::orderByDesc('created_at')->take(10)->get();
        $leadsByType = Lead::selectRaw('type, count(*) as count')->groupBy('type')->pluck('count', 'type');
        $leadsByMonth = Lead::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, count(*) as count")
            ->groupBy('month')
            ->orderBy('month')
            ->take(6)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentLeads', 'leadsByType', 'leadsByMonth'));
    }
}
