<?php echo '<' . '?xml version="1.0" encoding="UTF-8"?' . '>', "\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

@php
    $controller = app(App\Http\Controllers\SitemapController::class);
@endphp

    {{-- Static pages --}}
    @foreach($staticRoutes as $r)
        @php
            $baseUrl = route($r['route']);
            $extras = [
                'url'        => $baseUrl,
                'lastmod'    => $controller->lastmodFor($r['files']),
                'changefreq' => $r['freq'],
                'priority'   => $r['priority'],
            ];
            if ($r['route'] === 'home') {
                $extras['imageUrl']     = asset('images/og-image.png');
                $extras['imageTitle']   = 'FairIT Solutions — AI Operating Systems';
                $extras['imageCaption'] = 'Premium AI consulting, copilots, voice AI, and managed retainers.';
            }
        @endphp
        @include('partials.sitemap-url', $extras)
    @endforeach

    {{-- Industry pages (static content behind IndustriesController) --}}
    @foreach($industries ?? [] as $slug)
        @include('partials.sitemap-url', [
            'url'        => route('industries.show', $slug),
            'lastmod'    => $industriesLastmod,
            'changefreq' => 'monthly',
            'priority'   => '0.7',
        ])
    @endforeach

    {{-- Blog posts --}}
    @foreach($posts as $post)
        @php
            $imageUrl = $post->featured_image
                ? (\Illuminate\Support\Str::startsWith($post->featured_image, 'http')
                    ? $post->featured_image
                    : asset($post->featured_image))
                : null;
        @endphp
        @include('partials.sitemap-url', array_filter([
            'url'          => route('blog.show', $post->slug),
            'lastmod'      => $post->updated_at->toAtomString(),
            'changefreq'   => 'monthly',
            'priority'     => '0.7',
            'imageUrl'     => $imageUrl,
            'imageTitle'   => $imageUrl ? $post->title : null,
            'imageCaption' => $imageUrl && $post->excerpt ? \Illuminate\Support\Str::limit($post->excerpt, 160) : null,
        ], fn ($v) => $v !== null))
    @endforeach

    {{-- Case studies --}}
    @foreach($caseStudies ?? [] as $study)
        @include('partials.sitemap-url', [
            'url'        => route('case-studies.show', $study->slug),
            'lastmod'    => $study->updated_at->toAtomString(),
            'changefreq' => 'monthly',
            'priority'   => '0.7',
        ])
    @endforeach

</urlset>
