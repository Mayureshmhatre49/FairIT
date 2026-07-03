{{-- SEO Meta --}}
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
@if($keywords)
<meta name="keywords" content="{{ $keywords }}">
@endif
<meta name="author" content="FairIT Solutions">
<meta name="robots" content="{{ $robots }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="theme-color" content="#1e293b">

{{-- Hreflang — multilingual signals --}}
@foreach($hreflangs as $locale => $url)
<link rel="alternate" hreflang="{{ $locale }}" href="{{ $url }}">
@endforeach

{{-- Open Graph --}}
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:url" content="{{ $ogUrl }}">
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $ogImageAlt }}">
<meta property="og:site_name" content="FairIT Solutions">
<meta property="og:locale" content="{{ $ogLocales['primary'] }}">
@foreach($ogLocales['alternates'] as $locale)
<meta property="og:locale:alternate" content="{{ $locale }}">
@endforeach

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@fairitsolutions">
<meta name="twitter:creator" content="@fairitsolutions">
<meta name="twitter:title" content="{{ $ogTitle }}">
<meta name="twitter:description" content="{{ $ogDescription }}">
<meta name="twitter:image" content="{{ $ogImage }}">

{{-- Geo tags — headquartered in Pune, India --}}
<meta name="geo.region" content="IN-MH">
<meta name="geo.placename" content="Pune, Maharashtra">
<meta name="ICBM" content="18.5614, 73.7710">
<meta name="geo.position" content="18.5614;73.7710">

{{-- Search engine verification --}}
<meta name="google-site-verification" content="@yield('google_site_verification', '')">
<meta name="msvalidate.01" content="@yield('bing_site_verification', '')">
