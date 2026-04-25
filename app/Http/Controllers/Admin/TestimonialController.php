<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('order')->paginate(20);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateTestimonial($request);

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($this->validateTestimonial($request));

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted.');
    }

    private function validateTestimonial(Request $request): array
    {
        return $request->validate([
            'name'        => ['required', 'string', 'max:100'],
            'role'        => ['required', 'string', 'max:150'],
            'company'     => ['nullable', 'string', 'max:150'],
            'avatar'      => ['nullable', 'url', 'max:500'],
            'content'     => ['required', 'string', 'max:1000'],
            'rating'      => ['required', 'integer', 'min:1', 'max:5'],
            'is_active'   => ['boolean'],
            'order'       => ['nullable', 'integer'],
        ]);
    }
}
