@extends('layouts.app')

@section('title', 'Contact FairIT Solutions — Get in Touch')
@section('description', 'Contact FairIT Solutions to discuss your AI needs. We respond within 24 hours. Based in Switzerland, serving globally.')

@section('content')

<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">Get in Touch</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">Let's Talk AI</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-xl mx-auto leading-relaxed">
                Have a question, a project, or an idea? We'd love to hear from you. We respond within 24 hours.
            </p>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Contact Info --}}
            <div data-animate class="lg:col-span-1 space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-charcoal-950 mb-6">Contact Information</h2>
                    <div class="space-y-4">
                        <a href="mailto:hello@fairitsolutions.ch" class="flex items-center gap-3 p-4 rounded-xl hover:bg-charcoal-50 transition-colors group">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center group-hover:bg-brand-100 transition-colors flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">Email</div>
                                <div class="text-charcoal-800 font-medium">hello@fairitsolutions.ch</div>
                            </div>
                        </a>
                        <div class="flex items-center gap-3 p-4 rounded-xl">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">Location</div>
                                <div class="text-charcoal-800 font-medium">Switzerland &amp; Global</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-xl">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-charcoal-400 font-medium">Response Time</div>
                                <div class="text-charcoal-800 font-medium">Within 24 hours</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-charcoal-950 rounded-2xl p-6 text-white">
                    <h3 class="font-bold mb-3">Prefer to book directly?</h3>
                    <p class="text-charcoal-400 text-sm mb-5">Book a consultation and skip the back-and-forth.</p>
                    <a href="{{ route('consultation') }}" class="btn-primary w-full justify-center">Book Consultation</a>
                </div>
            </div>

            {{-- Contact Form --}}
            <div data-animate data-animate-delay="200" class="lg:col-span-2">
                <div class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100">
                    <h2 class="text-2xl font-bold text-charcoal-950 mb-8">Send Us a Message</h2>

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
                                <label for="name" class="form-label">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Your full name" class="form-input @error('name') border-red-400 @enderror" required>
                                @error('name')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="form-label">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@company.com" class="form-input @error('email') border-red-400 @enderror" required>
                                @error('email')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="company" class="form-label">Company</label>
                                <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Your company name" class="form-input">
                            </div>
                            <div>
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+41 00 000 00 00" class="form-input">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="form-label">Subject <span class="text-red-500">*</span></label>
                            <select id="subject" name="subject" class="form-input @error('subject') border-red-400 @enderror" required>
                                <option value="">Select a topic</option>
                                <option {{ old('subject') == 'AI Transformation Advisory' ? 'selected' : '' }}>AI Transformation Advisory</option>
                                <option {{ old('subject') == 'Custom AI Copilot Development' ? 'selected' : '' }}>Custom AI Copilot Development</option>
                                <option {{ old('subject') == 'Voice AI & Automation' ? 'selected' : '' }}>Voice AI & Automation</option>
                                <option {{ old('subject') == 'Managed AI Retainers' ? 'selected' : '' }}>Managed AI Retainers</option>
                                <option {{ old('subject') == 'Founder Growth Advisory' ? 'selected' : '' }}>Founder Growth Advisory</option>
                                <option {{ old('subject') == 'SarathiOS / HSI OS / HandleLife OS' ? 'selected' : '' }}>Product Enquiry (SarathiOS / HSI OS / HandleLife OS)</option>
                                <option {{ old('subject') == 'General Enquiry' ? 'selected' : '' }}>General Enquiry</option>
                            </select>
                            @error('subject')<p class="form-error">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="message" class="form-label">Message <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="5" placeholder="Tell us about your project, challenge, or question..." class="form-input resize-none @error('message') border-red-400 @enderror" required>{{ old('message') }}</textarea>
                            @error('message')<p class="form-error">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="btn-primary w-full justify-center py-4 text-base">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            Send Message
                        </button>

                        <p class="text-xs text-charcoal-400 text-center">We respond within 24 hours. Your information is kept confidential.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
