<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class CaseStudiesController extends Controller
{
    /**
     * Retired slugs -> canonical slugs.
     *
     * When a case study slug is anonymised, the old URL may already be
     * live in an email, deck, or contract with a client. Keep those
     * inbound links working by 301-ing to the new canonical URL.
     *
     * Order the map so the OLD slug is the key. When a new client-facing
     * link is created for an anonymised case study, they get the
     * canonical URL directly and never hit these redirects.
     */
    private array $redirectMap = [
        'the-lift' => 'production-erp-film-content',
    ];

    public function index(Request $request): View
    {
        try {
            $studies = CaseStudy::published()
                ->when($request->domain, fn ($q, $d) => $q->where('domain', $d))
                ->when($request->search, fn ($q, $s) => $q->where(function ($qq) use ($s) {
                    $qq->where('project_name', 'like', "%{$s}%")
                        ->orWhere('client_name', 'like', "%{$s}%")
                        ->orWhere('summary', 'like', "%{$s}%");
                }))
                ->orderByDesc('is_featured')
                ->orderBy('order')
                ->orderByDesc('id')
                ->paginate(12)
                ->withQueryString();

            $domains = CaseStudy::published()
                ->distinct()
                ->orderBy('domain')
                ->pluck('domain')
                ->filter()
                ->values();

            $totalCount = CaseStudy::published()->count();
        } catch (\Exception $e) {
            $studies = new LengthAwarePaginator([], 0, 12);
            $domains = collect();
            $totalCount = 0;
        }

        return view('case-studies.index', compact('studies', 'domains', 'totalCount'));
    }

    public function show(string $slug): View|RedirectResponse
    {
        // 301 any retired slug to its canonical replacement before we
        // touch the DB, so old client-shared links stay usable.
        if (isset($this->redirectMap[$slug])) {
            return redirect()
                ->route('case-studies.show', ['slug' => $this->redirectMap[$slug]], 301);
        }

        try {
            $study = CaseStudy::published()->where('slug', $slug)->firstOrFail();

            $related = CaseStudy::published()
                ->where('id', '!=', $study->id)
                ->where('domain', $study->domain)
                ->orderByDesc('is_featured')
                ->take(3)
                ->get();
        } catch (\Exception $e) {
            abort(404);
        }

        if ($slug === 'production-erp-film-content') {
            return view('case-studies.the-lift', compact('study', 'related'));
        }

        return view('case-studies.show', compact('study', 'related'));
    }
}
