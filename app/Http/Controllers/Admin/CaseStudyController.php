<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CaseStudyController extends Controller
{
    public function index(Request $request): View
    {
        $studies = CaseStudy::query()
            ->when($request->domain, fn ($q, $d) => $q->where('domain', $d))
            ->when($request->search, fn ($q, $s) => $q->where(function ($qq) use ($s) {
                $qq->where('project_name', 'like', "%{$s}%")
                   ->orWhere('client_name', 'like', "%{$s}%");
            }))
            ->orderByDesc('is_featured')
            ->orderBy('order')
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        $domains = CaseStudy::distinct()->orderBy('domain')->pluck('domain')->filter()->values();

        return view('admin.case-studies.index', compact('studies', 'domains'));
    }

    public function create(): View
    {
        return view('admin.case-studies.form', ['study' => new CaseStudy(['is_published' => true])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateStudy($request);
        $validated['slug'] = $this->uniqueSlug($validated['project_name']);

        CaseStudy::create($validated);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study created.');
    }

    public function edit(CaseStudy $caseStudy): View
    {
        return view('admin.case-studies.form', ['study' => $caseStudy]);
    }

    public function update(Request $request, CaseStudy $caseStudy): RedirectResponse
    {
        $validated = $this->validateStudy($request);

        if ($caseStudy->project_name !== $validated['project_name']) {
            $validated['slug'] = $this->uniqueSlug($validated['project_name'], $caseStudy->id);
        }

        $caseStudy->update($validated);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study updated.');
    }

    public function destroy(CaseStudy $caseStudy): RedirectResponse
    {
        $caseStudy->delete();

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study deleted.');
    }

    private function validateStudy(Request $request): array
    {
        $validated = $request->validate([
            'client_name'   => ['nullable', 'string', 'max:255'],
            'project_name'  => ['required', 'string', 'max:255'],
            'domain'        => ['required', 'string', 'max:100'],
            'summary'       => ['required', 'string'],
            'challenge'     => ['nullable', 'string'],
            'approach'      => ['nullable', 'string'],
            'outcome'       => ['nullable', 'string'],
            'tech_keywords' => ['nullable', 'string', 'max:500'],
            'revenue_usd'   => ['nullable', 'integer', 'min:0'],
            'is_ongoing'    => ['nullable', 'boolean'],
            'is_featured'   => ['nullable', 'boolean'],
            'is_published'  => ['nullable', 'boolean'],
            'order'         => ['nullable', 'integer', 'min:0'],
            'seo_title'     => ['nullable', 'string', 'max:70'],
            'seo_desc'      => ['nullable', 'string', 'max:160'],
        ]);

        foreach (['is_ongoing', 'is_featured', 'is_published'] as $flag) {
            $validated[$flag] = (bool) ($request->input($flag));
        }
        $validated['order'] = (int) ($validated['order'] ?? 0);

        return $validated;
    }

    private function uniqueSlug(string $name, ?int $excludeId = null): string
    {
        $slug = Str::slug($name);
        if ($slug === '') {
            $slug = 'case-study';
        }
        $original = $slug;
        $i = 1;

        while (CaseStudy::where('slug', $slug)
            ->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))
            ->exists()) {
            $slug = "{$original}-{$i}";
            $i++;
        }

        return $slug;
    }
}
