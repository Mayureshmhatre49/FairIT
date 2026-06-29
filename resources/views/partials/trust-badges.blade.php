{{-- Trust signals shown next to form submit buttons. Every claim here is verifiable: --}}
{{--   - GDPR/DPDP/FADP: covered by the published privacy policy --}}
{{--   - TLS: site served over HTTPS --}}
{{--   - No AI training: privacy policy clause 12 + service FAQs --}}
{{--   - 24h reply: same SLA stated on the contact page hero / contact info card --}}
<div class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2 pt-3 text-[11px] font-medium text-charcoal-500">
    <div class="flex items-center gap-1.5" title="See our Privacy Policy">
        <svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        <span>{{ __('ui.trust.gdpr') }}</span>
    </div>
    <div class="flex items-center gap-1.5">
        <svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
        <span>{{ __('ui.trust.tls') }}</span>
    </div>
    <div class="flex items-center gap-1.5">
        <svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
        <span>{{ __('ui.trust.no_training') }}</span>
    </div>
    <div class="flex items-center gap-1.5">
        <svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span>{{ __('ui.trust.reply_24h') }}</span>
    </div>
</div>
