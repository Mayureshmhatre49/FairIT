@php
    $locales = ['en', 'de', 'fr', 'es', 'ar'];
    $withLang = fn ($u, $l) => $u . ($l !== 'en' ? (str_contains($u, '?') ? '&lang=' : '?lang=') . $l : '');
@endphp
<url>
    <loc>{{ $url }}</loc>
    <lastmod>{{ $lastmod }}</lastmod>
    <changefreq>{{ $changefreq }}</changefreq>
    <priority>{{ $priority }}</priority>
    @foreach($locales as $locale)
    <xhtml:link rel="alternate" hreflang="{{ $locale }}" href="{{ $withLang($url, $locale) }}"/>
    @endforeach
    <xhtml:link rel="alternate" hreflang="x-default" href="{{ $url }}"/>
    @isset($imageUrl)
    <image:image>
        <image:loc>{{ $imageUrl }}</image:loc>
        @isset($imageTitle)<image:title>{{ $imageTitle }}</image:title>@endisset
        @isset($imageCaption)<image:caption>{{ $imageCaption }}</image:caption>@endisset
    </image:image>
    @endisset
</url>
