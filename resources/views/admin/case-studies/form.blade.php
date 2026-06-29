@extends('layouts.admin')
@section('title', $study->exists ? 'Edit Case Study' : 'New Case Study')

@section('admin-content')
<form action="{{ $study->exists ? route('admin.case-studies.update', $study) : route('admin.case-studies.store') }}" method="POST">
    @csrf
    @if($study->exists) @method('PUT') @endif

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
        <ul class="text-sm text-red-700 space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-5">
            <div class="bg-white rounded-2xl border border-charcoal-100 p-6 space-y-5">
                <div>
                    <label class="form-label">Project Name *</label>
                    <input type="text" name="project_name" value="{{ old('project_name', $study->project_name) }}" class="form-input text-lg font-semibold" placeholder="e.g. CareLink — clinician communication platform" required>
                </div>
                <div>
                    <label class="form-label">Client Name <span class="text-charcoal-400 font-normal">(leave blank for "Confidential Client")</span></label>
                    <input type="text" name="client_name" value="{{ old('client_name', $study->client_name) }}" class="form-input" placeholder="e.g. Callidus Health LLC">
                </div>
                <div>
                    <label class="form-label">Industry / Domain *</label>
                    <input type="text" name="domain" value="{{ old('domain', $study->domain) }}" class="form-input" placeholder="e.g. Healthcare" required>
                </div>
                <div>
                    <label class="form-label">Summary / Project Overview *</label>
                    <textarea name="summary" rows="4" class="form-input resize-none" placeholder="One-paragraph project overview shown on cards and at the top of the detail page..." required>{{ old('summary', $study->summary) }}</textarea>
                </div>
                <div>
                    <label class="form-label">The Challenge</label>
                    <textarea name="challenge" rows="5" class="form-input resize-none" placeholder="What was the business problem? Why was this hard?">{{ old('challenge', $study->challenge) }}</textarea>
                </div>
                <div>
                    <label class="form-label">Our Approach</label>
                    <textarea name="approach" rows="6" class="form-input resize-none" placeholder="What did we build and how?">{{ old('approach', $study->approach) }}</textarea>
                </div>
                <div>
                    <label class="form-label">The Outcome</label>
                    <textarea name="outcome" rows="4" class="form-input resize-none" placeholder="Results, impact, value delivered.">{{ old('outcome', $study->outcome) }}</textarea>
                </div>
                <div>
                    <label class="form-label">Technologies & Capabilities <span class="text-charcoal-400 font-normal">(comma separated)</span></label>
                    <input type="text" name="tech_keywords" value="{{ old('tech_keywords', $study->tech_keywords) }}" maxlength="500" class="form-input" placeholder="e.g. IBM SPSS, Google Data Studio, Analytics Pipelines">
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-charcoal-100 p-6 space-y-4">
                <h3 class="font-bold text-charcoal-950">SEO Settings</h3>
                <div>
                    <label class="form-label">SEO Title <span class="text-charcoal-400 font-normal">(max 70 chars)</span></label>
                    <input type="text" name="seo_title" value="{{ old('seo_title', $study->seo_title) }}" maxlength="70" class="form-input" placeholder="Optimised title for search engines">
                </div>
                <div>
                    <label class="form-label">SEO Description <span class="text-charcoal-400 font-normal">(max 160 chars)</span></label>
                    <textarea name="seo_desc" rows="2" maxlength="160" class="form-input resize-none" placeholder="Meta description for search engines...">{{ old('seo_desc', $study->seo_desc) }}</textarea>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-white rounded-2xl border border-charcoal-100 p-6 space-y-4">
                <h3 class="font-bold text-charcoal-950">Publish</h3>
                <div class="flex items-center gap-3">
                    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $study->is_published) ? 'checked' : '' }} class="rounded">
                    <label for="is_published" class="text-sm font-medium text-charcoal-700">Published (visible on site)</label>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $study->is_featured) ? 'checked' : '' }} class="rounded">
                    <label for="is_featured" class="text-sm font-medium text-charcoal-700">Featured (pinned to top)</label>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" id="is_ongoing" name="is_ongoing" value="1" {{ old('is_ongoing', $study->is_ongoing) ? 'checked' : '' }} class="rounded">
                    <label for="is_ongoing" class="text-sm font-medium text-charcoal-700">Ongoing engagement</label>
                </div>
                <div>
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', $study->order ?? 0) }}" min="0" class="form-input text-sm" placeholder="0">
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="btn-primary flex-1 justify-center">{{ $study->exists ? 'Update' : 'Create' }}</button>
                </div>
                @if($study->exists)
                <a href="{{ route('admin.case-studies.index') }}" class="btn-secondary w-full justify-center text-sm">Cancel</a>
                @endif
            </div>

            <div class="bg-white rounded-2xl border border-charcoal-100 p-6 space-y-4">
                <h3 class="font-bold text-charcoal-950">Internal Reporting</h3>
                <p class="text-xs text-charcoal-500">Revenue is stored for internal reporting only and is never shown on the public case study page.</p>
                <div>
                    <label class="form-label">Project Revenue (USD)</label>
                    <input type="number" name="revenue_usd" value="{{ old('revenue_usd', $study->revenue_usd) }}" min="0" class="form-input" placeholder="e.g. 175000">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
