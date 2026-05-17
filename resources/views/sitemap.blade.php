<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

@php
    $locales = ['en', 'de', 'fr', 'es', 'ar'];

    $staticPages = [
        ['/',                                          now()->toAtomString(),  'weekly',  '1.0'],
        ['/services',                                  now()->format('Y-m-d'), 'monthly', '0.9'],
        ['/services/ai-transformation-advisory',       now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/services/custom-ai-copilot',                now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/services/voice-ai-automation',              now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/services/managed-ai-retainers',             now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/services/founder-growth-advisory',          now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/products',                                  now()->format('Y-m-d'), 'monthly', '0.9'],
        ['/products/sarathios',                        now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/products/hsios',                            now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/products/handlelife',                       now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/industries',                                now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/industries/startups',                       now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/industries/smes',                           now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/industries/real-estate',                    now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/industries/hospitality',                    now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/industries/interior-design',                now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/industries/healthcare',                     now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/industries/education',                      now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/industries/professional-services',          now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/about',                                     now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/insights',                                  now()->toAtomString(),  'weekly',  '0.8'],
        ['/contact',                                   now()->format('Y-m-d'), 'monthly', '0.7'],
        ['/consultation',                              now()->format('Y-m-d'), 'monthly', '0.8'],
        ['/privacy',                                   now()->format('Y-m-d'), 'yearly',  '0.2'],
        ['/terms',                                     now()->format('Y-m-d'), 'yearly',  '0.2'],
        ['/cookies',                                   now()->format('Y-m-d'), 'yearly',  '0.2'],
    ];
@endphp

    {{-- Static pages with hreflang xhtml alternates for every locale --}}
    @foreach($staticPages as [$path, $lastmod, $freq, $priority])
    <url>
        <loc>{{ url($path) }}</loc>
        <lastmod>{{ $lastmod }}</lastmod>
        <changefreq>{{ $freq }}</changefreq>
        <priority>{{ $priority }}</priority>
        @foreach($locales as $locale)
        <xhtml:link rel="alternate" hreflang="{{ $locale }}" href="{{ url($path) }}"/>
        @endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url($path) }}"/>
        @if($path === '/')
        <image:image>
            <image:loc>{{ asset('images/og-image.png') }}</image:loc>
            <image:title>FairIT Solutions — AI Operating Systems</image:title>
            <image:caption>Premium AI consulting, copilots, voice AI, and managed retainers.</image:caption>
        </image:image>
        @endif
    </url>
    @endforeach

    {{-- Blog posts with image entries + multilingual hreflang --}}
    @foreach($posts as $post)
    <url>
        <loc>{{ route('blog.show', $post->slug) }}</loc>
        <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
        @foreach($locales as $locale)
        <xhtml:link rel="alternate" hreflang="{{ $locale }}" href="{{ route('blog.show', $post->slug) }}"/>
        @endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ route('blog.show', $post->slug) }}"/>
        @if($post->featured_image)
        <image:image>
            <image:loc>{{ \Illuminate\Support\Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset($post->featured_image) }}</image:loc>
            <image:title>{{ htmlspecialchars($post->title, ENT_XML1) }}</image:title>
            @if($post->excerpt)<image:caption>{{ htmlspecialchars(\Illuminate\Support\Str::limit($post->excerpt, 160), ENT_XML1) }}</image:caption>@endif
        </image:image>
        @endif
    </url>
    @endforeach

</urlset>
