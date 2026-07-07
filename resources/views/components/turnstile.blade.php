@php
    $siteKey = config('services.turnstile.site_key');
    $theme = $attributes->get('theme', 'auto');
@endphp

@if($siteKey)
    <div class="cf-turnstile"
         data-sitekey="{{ $siteKey }}"
         data-theme="{{ $theme }}"
         data-appearance="interaction-only"></div>

    @once
        @push('scripts')
            <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer nonce="{{ csp_nonce() }}"></script>
        @endpush
    @endonce
@endif
