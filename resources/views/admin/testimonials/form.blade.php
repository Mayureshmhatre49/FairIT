@extends('layouts.admin')
@section('title', $testimonial->exists ? 'Edit Testimonial' : 'New Testimonial')

@section('admin-content')
<div class="max-w-xl">
    <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST">
        @csrf
        @if($testimonial->exists) @method('PUT') @endif

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
            <ul class="text-sm text-red-700 space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
        @endif

        <div class="bg-white rounded-2xl border border-charcoal-100 p-8 space-y-5">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Rating (1–5) *</label>
                    <select name="rating" class="form-input" required>
                        @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} Stars</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div>
                <label class="form-label">Role / Title *</label>
                <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="form-input" placeholder="e.g. CEO" required>
            </div>
            <div>
                <label class="form-label">Company</label>
                <input type="text" name="company" value="{{ old('company', $testimonial->company) }}" class="form-input" placeholder="Company name">
            </div>
            <div>
                <label class="form-label">Avatar URL</label>
                <input type="url" name="avatar" value="{{ old('avatar', $testimonial->avatar) }}" class="form-input" placeholder="https://...">
            </div>
            <div>
                <label class="form-label">Testimonial *</label>
                <textarea name="content" rows="4" class="form-input resize-none" required>{{ old('content', $testimonial->content) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', $testimonial->order ?? 0) }}" class="form-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }} class="rounded">
                        <span class="text-sm font-medium text-charcoal-700">Show on website</span>
                    </label>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-primary flex-1 justify-center">{{ $testimonial->exists ? 'Update' : 'Create' }} Testimonial</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
