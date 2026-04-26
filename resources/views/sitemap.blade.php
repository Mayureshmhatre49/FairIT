<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

    {{-- Homepage --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
        <image:image>
            <image:loc>{{ asset('images/og-image.png') }}</image:loc>
            <image:title>FairIT Solutions — AI Operating Systems</image:title>
        </image:image>
    </url>

    {{-- Services --}}
    <url><loc>{{ route('services.index') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.9</priority></url>
    <url><loc>{{ route('services.advisory') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('services.copilot') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('services.voiceai') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('services.retainers') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('services.founder') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>

    {{-- Products --}}
    <url><loc>{{ route('products.index') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.9</priority></url>
    <url><loc>{{ route('products.sarathios') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('products.hsios') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('products.handlelife') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>

    {{-- Industries --}}
    <url><loc>{{ route('industries.index') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.7</priority></url>
    @foreach(['startups','smes','real-estate','hospitality','interior-design','healthcare','education','professional-services'] as $slug)
    <url><loc>{{ route('industries.show', $slug) }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.7</priority></url>
    @endforeach

    {{-- Company --}}
    <url><loc>{{ route('about') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.7</priority></url>

    {{-- Blog / Insights --}}
    <url><loc>{{ route('blog.index') }}</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>
    @foreach($posts as $post)
    <url>
        <loc>{{ route('blog.show', $post->slug) }}</loc>
        <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    {{-- Conversion pages --}}
    <url><loc>{{ route('contact') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.7</priority></url>
    <url><loc>{{ route('consultation') }}</loc><lastmod>{{ now()->format('Y-m-d') }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>

    {{-- Legal --}}
    <url><loc>{{ route('privacy') }}</loc><changefreq>yearly</changefreq><priority>0.2</priority></url>
    <url><loc>{{ route('terms') }}</loc><changefreq>yearly</changefreq><priority>0.2</priority></url>
    <url><loc>{{ route('cookies') }}</loc><changefreq>yearly</changefreq><priority>0.2</priority></url>

</urlset>
