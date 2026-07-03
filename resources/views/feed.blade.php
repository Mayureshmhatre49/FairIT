<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>
    <title>{{ __('blog.schema.blog_name') }}</title>
    <link>{{ url('/insights') }}</link>
    <atom:link href="{{ url('/feed.xml') }}" rel="self" type="application/rss+xml" />
    <description>{{ __('blog.schema.blog_description') }}</description>
    <language>{{ app()->getLocale() }}</language>
    <copyright>Copyright {{ date('Y') }} FairIT Solutions</copyright>
    <lastBuildDate>{{ now()->toRssString() }}</lastBuildDate>
    <ttl>1440</ttl>
    <image>
        <url>{{ asset('images/og-image.png') }}</url>
        <title>FairIT Solutions</title>
        <link>{{ url('/') }}</link>
    </image>
@foreach($posts as $post)
    <item>
        <title>{{ htmlspecialchars($post->title, ENT_XML1) }}</title>
        <link>{{ route('blog.show', $post->slug) }}</link>
        <guid isPermaLink="true">{{ route('blog.show', $post->slug) }}</guid>
        <pubDate>{{ $post->published_at->toRssString() }}</pubDate>
        @if($post->category)<category>{{ htmlspecialchars($post->category, ENT_XML1) }}</category>@endif
        <dc:creator>FairIT Solutions</dc:creator>
        <description>{{ htmlspecialchars($post->excerpt, ENT_XML1) }}</description>
        <content:encoded><![CDATA[{!! $post->content !!}]]></content:encoded>
    </item>
@endforeach
</channel>
</rss>
