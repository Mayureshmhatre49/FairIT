@extends('layouts.app')

@section('title', 'Contact FairIT Solutions — Get in Touch')
@section('description', 'Contact FairIT Solutions to discuss your AI needs. We respond within 24 hours. Based in Switzerland, serving globally.')

@section('content')

<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">{{ __('contact.hero.label') }}</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">{{ __('contact.hero.title') }}</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-xl mx-auto leading-relaxed">
                {{ __('contact.hero.subtitle') }}
            </p>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Founders & Contact Info --}}
            <div data-animate class="lg:col-span-1 space-y-8">
                {{-- Meet the Founders --}}
                <div class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100">
                    <h2 class="text-xl font-bold text-charcoal-950 mb-6">{{ __('contact.founders.title') }}</h2>
                    <div class="space-y-6">
                        {{-- Nishant --}}
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold bg-brand-600 text-white shadow-glow-sm">NM</div>
                            <div class="flex-1">
                                <p class="font-bold text-charcoal-950 text-base">Nishant Mhatre</p>
                                <p class="text-xs text-charcoal-500 mb-2">{{ __('contact.founders.nishant.role') }}</p>
                                <div class="space-y-1">
                                    <a href="mailto:Nishant@FairITSolutions.in" class="text-xs font-medium text-brand-600 hover:text-brand-700 block transition-colors">Nishant@FairITSolutions.in</a>
                                    <a href="https://www.linkedin.com/in/nishantmhatre" target="_blank" rel="noopener" class="text-xs font-medium text-charcoal-400 hover:text-brand-600 block transition-colors">LinkedIn</a>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-charcoal-100"></div>

                        {{-- Annemarie --}}
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold bg-amber-600 text-white shadow-glow-sm">AMS</div>
                            <div class="flex-1">
                                <p class="font-bold text-charcoal-950 text-base">Annemarie M. Sickeler</p>
                                <p class="text-xs text-charcoal-500 mb-2">{{ __('contact.founders.annemarie.role') }}</p>
                                <div class="space-y-1">
                                    <a href="mailto:Info@FairITSolutions.ch" class="text-xs font-medium text-brand-600 hover:text-brand-700 block transition-colors">Info@FairITSolutions.ch</a>
                                    <a href="https://www.linkedin.com/in/annemariesickeler/" target="_blank" rel="noopener" class="text-xs font-medium text-charcoal-400 hover:text-brand-600 block transition-colors">LinkedIn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Information --}}
                <div>
                    <h2 class="text-2xl font-bold text-charcoal-950 mb-6">{{ __('contact.info.title') }}</h2>
                    <div class="space-y-4">
                        <a href="mailto:hello@fairitsolutions.ch" class="flex items-center gap-3 p-4 rounded-xl hover:bg-charcoal-50 transition-colors group">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center group-hover:bg-brand-100 transition-colors flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">{{ __('contact.info.email_label') }}</div>
                                <div class="text-charcoal-800 font-medium">hello@fairitsolutions.ch</div>
                            </div>
                        </a>
                        <div class="flex items-center gap-3 p-4 rounded-xl">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">{{ __('contact.info.location_label') }}</div>
                                <div class="text-charcoal-800 font-medium">{{ __('contact.info.location_value') }}</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-xl">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">{{ __('contact.info.response_label') }}</div>
                                <div class="text-charcoal-800 font-medium">{{ __('contact.info.response_value') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-charcoal-950 rounded-2xl p-6 text-white">
                    <h3 class="font-bold mb-3">{{ __('contact.info.book_title') }}</h3>
                    <p class="text-charcoal-400 text-sm mb-5">{{ __('contact.info.book_subtitle') }}</p>
                    <a href="{{ route('consultation') }}" class="btn-primary w-full justify-center">{{ __('contact.info.book_cta') }}</a>
                </div>
            </div>

            {{-- Contact Form --}}
            <div data-animate data-animate-delay="200" class="lg:col-span-2">
                <div class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100">
                    <h2 class="text-2xl font-bold text-charcoal-950 mb-8">{{ __('contact.form.title') }}</h2>

                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                        <ul class="text-sm text-red-700 space-y-1">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Honeypot --}}
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="honeypot" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="form-label">{{ __('contact.form.name_label') }} <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('contact.form.name_placeholder') }}" class="form-input @error('name') border-red-400 @enderror" required>
                                @error('name')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="form-label">{{ __('contact.form.email_label') }} <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('contact.form.email_placeholder') }}" class="form-input @error('email') border-red-400 @enderror" required>
                                @error('email')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="company" class="form-label">{{ __('contact.form.company_label') }}</label>
                                <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="{{ __('contact.form.company_placeholder') }}" class="form-input">
                            </div>
                            <div>
                                <label for="phone" class="form-label">{{ __('contact.form.phone_label') }}</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="{{ __('contact.form.phone_placeholder') }}" class="form-input">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="form-label">{{ __('contact.form.subject_label') }} <span class="text-red-500">*</span></label>
                            <select id="subject" name="subject" class="form-input @error('subject') border-red-400 @enderror" required>
                                <option value="">{{ __('contact.form.subject_placeholder') }}</option>
                                @foreach(__('contact.form.subject_options') as $opt)
                                <option {{ old('subject') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                            @error('subject')<p class="form-error">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="message" class="form-label">{{ __('contact.form.message_label') }} <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="5" placeholder="{{ __('contact.form.message_placeholder') }}" class="form-input resize-none @error('message') border-red-400 @enderror" required>{{ old('message') }}</textarea>
                            @error('message')<p class="form-error">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="btn-primary w-full justify-center py-4 text-base">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            {{ __('contact.form.submit') }}
                        </button>

                        <p class="text-xs text-charcoal-400 text-center">{{ __('contact.form.footer_note') }}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
