<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url><loc>{{ route('services.index') }}</loc><changefreq>monthly</changefreq><priority>0.9</priority></url>
    <url><loc>{{ route('services.advisory') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('services.copilot') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('services.voiceai') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('services.retainers') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('services.founder') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('products.index') }}</loc><changefreq>monthly</changefreq><priority>0.9</priority></url>
    <url><loc>{{ route('products.sarathios') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('products.hsios') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('products.handlelife') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('industries.index') }}</loc><changefreq>monthly</changefreq><priority>0.7</priority></url>
    @foreach(['startups','smes','real-estate','hospitality','interior-design','healthcare','education','professional-services'] as $slug)
    <url><loc>{{ route('industries.show', $slug) }}</loc><changefreq>monthly</changefreq><priority>0.7</priority></url>
    @endforeach
    <url><loc>{{ route('about') }}</loc><changefreq>monthly</changefreq><priority>0.7</priority></url>
    <url><loc>{{ route('blog.index') }}</loc><changefreq>weekly</changefreq><priority>0.8</priority></url>
    @foreach($posts as $post)
    <url>
        <loc>{{ route('blog.show', $post->slug) }}</loc>
        <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
    <url><loc>{{ route('contact') }}</loc><changefreq>monthly</changefreq><priority>0.6</priority></url>
    <url><loc>{{ route('consultation') }}</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ route('privacy') }}</loc><changefreq>yearly</changefreq><priority>0.3</priority></url>
    <url><loc>{{ route('terms') }}</loc><changefreq>yearly</changefreq><priority>0.3</priority></url>
    <url><loc>{{ route('cookies') }}</loc><changefreq>yearly</changefreq><priority>0.3</priority></url>
</urlset>
