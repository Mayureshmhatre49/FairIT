<?php echo '<' . '?xml version="1.0" encoding="UTF-8"?' . '>', "\n"; ?>
<?php echo '<' . '?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?' . '>', "\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
@foreach($posts as $post)
    <url>
        <loc>{{ route('blog.show', $post->slug) }}</loc>
        <news:news>
            <news:publication>
                <news:name>FairIT Solutions Insights</news:name>
                <news:language>en</news:language>
            </news:publication>
            <news:publication_date>{{ $post->published_at->toAtomString() }}</news:publication_date>
            <news:title>{{ htmlspecialchars($post->title, ENT_XML1) }}</news:title>
            @if($post->tags)<news:keywords>{{ htmlspecialchars($post->tags, ENT_XML1) }}</news:keywords>@endif
        </news:news>
    </url>
@endforeach
</urlset>
