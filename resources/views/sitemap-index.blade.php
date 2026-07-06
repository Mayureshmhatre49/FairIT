<?php echo '<' . '?xml version="1.0" encoding="UTF-8"?' . '>', "\n"; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('/sitemap.xml') }}</loc>
        <lastmod>{{ $siteLastmod }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('/sitemap-news.xml') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </sitemap>
</sitemapindex>
