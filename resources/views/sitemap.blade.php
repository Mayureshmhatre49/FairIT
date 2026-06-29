<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

@php
    $locales = ['en', 'de', 'fr'];

    // List of static routes in format: [routeName, changeFreq, priority]
    $staticRoutes = [
        ['home',                             'weekly',  '1.0'],
        ['services.index',                   'monthly', '0.9'],
        ['services.advisory',                'monthly', '0.8'],
        ['services.copilot',                 'monthly', '0.8'],
        ['services.voiceai',                 'monthly', '0.8'],
        ['services.retainers',               'monthly', '0.8'],
        ['services.founder',                 'monthly', '0.8'],
        ['products.index',                   'monthly', '0.9'],
        ['products.sarathios',               'monthly', '0.8'],
        ['products.hsios',                   'monthly', '0.8'],
        ['products.handlelife',              'monthly', '0.8'],
        ['industries.index',                 'monthly', '0.7'],
        ['about',                            'monthly', '0.7'],
        ['case-studies.index',               'weekly',  '0.8'],
        ['blog.index',                       'weekly',  '0.8'],
        ['contact',                          'monthly', '0.7'],
        ['consultation',                     'monthly', '0.8'],
        ['privacy',                          'yearly',  '0.2'],
        ['terms',                            'yearly',  '0.2'],
        ['cookies',                          'yearly',  '0.2'],
    ];
@endphp

    {{-- Static pages with hreflang xhtml alternates for every locale --}}
    @foreach($staticRoutes as [$route, $freq, $priority])
    @php
        $baseUrl = route($route);
    @endphp
    <url>
        <loc>{{ $baseUrl }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <changefreq>{{ $freq }}</changefreq>
        <priority>{{ $priority }}</priority>
        @foreach($locales as $locale)
        <xhtml:link rel="alternate" hreflang="{{ $locale }}" href="{{ $baseUrl . ($locale !== 'en' ? '?lang=' . $locale : '') }}"/>
        @endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ $baseUrl }}"/>
        @if($route === 'home')
        <image:image>
            <image:loc>{{ asset('images/og-image.png') }}</image:loc>
            <image:title>FairIT Solutions — AI Operating Systems</image:title>
            <image:caption>Premium AI consulting, copilots, voice AI, and managed retainers.</image:caption>
        </image:image>
        @endif
    </url>
    @endforeach

    {{-- Dynamic industries list with multilingual alternates --}}
    @foreach($industries ?? [] as $slug)
    @php
        $baseUrl = route('industries.show', $slug);
    @endphp
    <url>
        <loc>{{ $baseUrl }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
        @foreach($locales as $locale)
        <xhtml:link rel="alternate" hreflang="{{ $locale }}" href="{{ $baseUrl . ($locale !== 'en' ? '?lang=' . $locale : '') }}"/>
        @endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ $baseUrl }}"/>
    </url>
    @endforeach

    {{-- Blog posts with image entries + multilingual hreflang --}}
    @foreach($posts as $post)
    @php
        $baseUrl = route('blog.show', $post->slug);
    @endphp
    <url>
        <loc>{{ $baseUrl }}</loc>
        <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
        @foreach($locales as $locale)
        <xhtml:link rel="alternate" hreflang="{{ $locale }}" href="{{ $baseUrl . ($locale !== 'en' ? '?lang=' . $locale : '') }}"/>
        @endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ $baseUrl }}"/>
        @if($post->featured_image)
        <image:image>
            <image:loc>{{ \Illuminate\Support\Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset($post->featured_image) }}</image:loc>
            <image:title>{{ htmlspecialchars($post->title, ENT_XML1) }}</image:title>
            @if($post->excerpt)<image:caption>{{ htmlspecialchars(\Illuminate\Support\Str::limit($post->excerpt, 160), ENT_XML1) }}</image:caption>@endif
        </image:image>
        @endif
    </url>
    @endforeach

    {{-- Case studies with multilingual hreflang --}}
    @foreach($caseStudies ?? [] as $study)
    @php
        $baseUrl = route('case-studies.show', $study->slug);
    @endphp
    <url>
        <loc>{{ $baseUrl }}</loc>
        <lastmod>{{ $study->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
        @foreach($locales as $locale)
        <xhtml:link rel="alternate" hreflang="{{ $locale }}" href="{{ $baseUrl . ($locale !== 'en' ? '?lang=' . $locale : '') }}"/>
        @endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ $baseUrl }}"/>
    </url>
    @endforeach

</urlset>
