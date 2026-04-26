@extends('layouts.app')

@section('title', 'Book AI Consultation — FairIT Solutions')
@section('description', 'Book a free AI strategy consultation with FairIT Solutions. Discuss your AI goals, challenges, and get expert guidance. Response within 24 hours.')

@section('content')

<section class="relative bg-charcoal-950 pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.2) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('consultation.hero.label') }}</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{{ __('consultation.hero.title') }}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                {{ __('consultation.hero.subtitle') }}
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm text-charcoal-400">
                @foreach(__('consultation.hero.badges') as $t)
                <div class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    {{ $t }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- What to Expect --}}
            <div data-animate class="space-y-6">
                <h2 class="text-xl font-bold text-charcoal-950">{{ __('consultation.expect.title') }}</h2>
                <div class="space-y-4">
                    @foreach(__('consultation.expect.steps') as $step)
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-brand-600 text-white font-bold text-sm flex items-center justify-center flex-shrink-0">{{ $step['num'] }}</div>
                        <div>
                            <div class="font-semibold text-charcoal-900 text-sm">{{ $step['title'] }}</div>
                            <p class="text-charcoal-500 text-xs mt-0.5">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-100 mt-8">
                    <div class="text-sm font-bold text-charcoal-950 mb-2">{{ __('consultation.expect.free_title') }}</div>
                    <p class="text-charcoal-500 text-xs leading-relaxed">{{ __('consultation.expect.free_subtitle') }}</p>
                </div>
            </div>

            {{-- Consultation Form --}}
            <div data-animate data-animate-delay="200" class="lg:col-span-2">
                <div class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100">
                    <h2 class="text-2xl font-bold text-charcoal-950 mb-8">{{ __('consultation.form.title') }}</h2>

                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                        <ul class="text-sm text-red-700 space-y-1">
                            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('consultation.submit') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="hidden" aria-hidden="true"><input type="text" name="honeypot" tabindex="-1" autocomplete="off"></div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="form-label">{{ __('consultation.form.name_label') }} <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('consultation.form.name_placeholder') }}" class="form-input @error('name') border-red-400 @enderror" required>
                                @error('name')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="form-label">{{ __('consultation.form.email_label') }} <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('consultation.form.email_placeholder') }}" class="form-input @error('email') border-red-400 @enderror" required>
                                @error('email')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="phone" class="form-label">{{ __('consultation.form.phone_label') }}</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="{{ __('consultation.form.phone_placeholder') }}" class="form-input">
                            </div>
                            <div>
                                <label for="company" class="form-label">{{ __('consultation.form.company_label') }}</label>
                                <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="{{ __('consultation.form.company_placeholder') }}" class="form-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="company_size" class="form-label">{{ __('consultation.form.size_label') }}</label>
                                <select id="company_size" name="company_size" class="form-input">
                                    <option value="">{{ __('consultation.form.size_placeholder') }}</option>
                                    @foreach(__('consultation.form.size_options') as $opt)
                                    <option value="{{ $opt }}">{{ $opt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="service" class="form-label">{{ __('consultation.form.service_label') }} <span class="text-red-500">*</span></label>
                                <select id="service" name="service" class="form-input @error('service') border-red-400 @enderror" required>
                                    <option value="">{{ __('consultation.form.service_placeholder') }}</option>
                                    @foreach(__('consultation.form.service_options') as $opt)
                                    <option value="{{ $opt }}">{{ $opt }}</option>
                                    @endforeach
                                </select>
                                @error('service')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="budget" class="form-label">{{ __('consultation.form.budget_label') }}</label>
                                <select id="budget" name="budget" class="form-input">
                                    <option value="">{{ __('consultation.form.budget_placeholder') }}</option>
                                    @foreach(__('consultation.form.budget_options') as $opt)
                                    <option value="{{ $opt }}">{{ $opt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="timeline" class="form-label">{{ __('consultation.form.timeline_label') }}</label>
                                <select id="timeline" name="timeline" class="form-input">
                                    <option value="">{{ __('consultation.form.timeline_placeholder') }}</option>
                                    @foreach(__('consultation.form.timeline_options') as $opt)
                                    <option value="{{ $opt }}">{{ $opt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="goals" class="form-label">{{ __('consultation.form.goals_label') }} <span class="text-red-500">*</span></label>
                            <textarea id="goals" name="goals" rows="4" placeholder="{{ __('consultation.form.goals_placeholder') }}" class="form-input resize-none @error('goals') border-red-400 @enderror" required>{{ old('goals') }}</textarea>
                            @error('goals')<p class="form-error">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="how_heard" class="form-label">{{ __('consultation.form.heard_label') }}</label>
                            <input type="text" id="how_heard" name="how_heard" value="{{ old('how_heard') }}" placeholder="{{ __('consultation.form.heard_placeholder') }}" class="form-input">
                        </div>

                        <button type="submit" class="btn-primary w-full justify-center py-4 text-base">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ __('consultation.form.submit') }}
                        </button>

                        <p class="text-xs text-charcoal-400 text-center">{{ __('consultation.form.footer_note') }}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
