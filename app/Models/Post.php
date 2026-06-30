<?php

namespace App\Models;

use App\Services\IndexNowService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        // Ping IndexNow when a post is published or its content materially changes
        static::saved(function (Post $post) {
            if (! $post->is_published) {
                return;
            }
            $relevantChange = $post->wasRecentlyCreated
                || $post->wasChanged(['title', 'content', 'excerpt', 'is_published', 'published_at']);
            if ($relevantChange) {
                app(IndexNowService::class)->notify(route('blog.show', $post->slug));
            }
        });
    }

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'tags',
        'featured_image',
        'seo_title',
        'seo_desc',
        'is_published',
        'published_at',
        'author_id',
        'views',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getTagsArrayAttribute(): array
    {
        return $this->tags
            ? array_map('trim', explode(',', $this->tags))
            : [];
    }

    public function getReadTimeAttribute(): string
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200);

        return "{$minutes} min read";
    }

    /**
     * Brand-aligned generated SVG thumbnail per post. Deterministic
     * (same post -> same image) and shaped per category so the blog
     * grid reads as a designed system, not a stock-photo collage.
     *
     * Composition: linear gradient + radial glow + grid overlay +
     * subtle 'article line' decoration + central category glyph +
     * FairIT F watermark in the corner.
     */
    public function getThumbnailSvgAttribute(): string
    {
        $category = trim((string) $this->category);
        $slugId = str_replace('-', '_', $this->slug ?: 'post');

        // Color schemes per blog category. Each scheme is a brand-aligned
        // gradient duo with an accent for icons and a glow for radial light.
        $schemes = [
            'AI Strategy' => [
                'from' => '#1e3a8a', 'to' => '#0f172a',
                'accent' => '#60a5fa', 'glow' => '#3b82f6',
            ],
            'Voice AI' => [
                'from' => '#581c87', 'to' => '#1e1b4b',
                'accent' => '#c084fc', 'glow' => '#7c3aed',
            ],
            'AI Copilots' => [
                'from' => '#064e3b', 'to' => '#0f172a',
                'accent' => '#34d399', 'glow' => '#10b981',
            ],
            'Founder Intelligence' => [
                'from' => '#7c2d12', 'to' => '#18181b',
                'accent' => '#fdba74', 'glow' => '#ea580c',
            ],
            'Industry AI' => [
                'from' => '#0f766e', 'to' => '#1e3a8a',
                'accent' => '#38bdf8', 'glow' => '#0d9488',
            ],
            'Business Automation' => [
                'from' => '#1e293b', 'to' => '#1e3a8a',
                'accent' => '#93c5fd', 'glow' => '#2563eb',
            ],
        ];

        // Default to a brand-blue scheme for unrecognised / null categories.
        $scheme = $schemes[$category] ?? [
            'from' => '#1e3a8a', 'to' => '#0d0f12',
            'accent' => '#60a5fa', 'glow' => '#3b82f6',
        ];

        // Category-specific glyphs. Centred near 200,112 in a 400x225 viewBox
        // to match the CaseStudy thumbnail geometry.
        $glyph = match ($category) {
            // AI Strategy → connected node network around a strong central node
            'AI Strategy' =>
                '<g stroke="' . $scheme['accent'] . '" stroke-width="2" fill="none" stroke-linecap="round">' .
                '<line x1="200" y1="112" x2="155" y2="75"/>' .
                '<line x1="200" y1="112" x2="245" y2="75"/>' .
                '<line x1="200" y1="112" x2="155" y2="149"/>' .
                '<line x1="200" y1="112" x2="245" y2="149"/>' .
                '<line x1="155" y1="75" x2="245" y2="75"/>' .
                '<line x1="155" y1="149" x2="245" y2="149"/>' .
                '</g>' .
                '<circle cx="200" cy="112" r="12" fill="' . $scheme['accent'] . '"/>' .
                '<circle cx="155" cy="75" r="6" fill="' . $scheme['accent'] . '"/>' .
                '<circle cx="245" cy="75" r="6" fill="' . $scheme['accent'] . '"/>' .
                '<circle cx="155" cy="149" r="6" fill="' . $scheme['accent'] . '"/>' .
                '<circle cx="245" cy="149" r="6" fill="' . $scheme['accent'] . '"/>',

            // Voice AI → soundwave bars symmetric around centre
            'Voice AI' =>
                '<g fill="' . $scheme['accent'] . '">' .
                '<rect x="148" y="96" width="6" height="32" rx="3" opacity="0.5"/>' .
                '<rect x="162" y="82" width="6" height="60" rx="3" opacity="0.7"/>' .
                '<rect x="176" y="68" width="6" height="88" rx="3"/>' .
                '<rect x="190" y="56" width="6" height="112" rx="3"/>' .
                '<rect x="204" y="56" width="6" height="112" rx="3"/>' .
                '<rect x="218" y="68" width="6" height="88" rx="3"/>' .
                '<rect x="232" y="82" width="6" height="60" rx="3" opacity="0.7"/>' .
                '<rect x="246" y="96" width="6" height="32" rx="3" opacity="0.5"/>' .
                '</g>',

            // AI Copilots → two parallel chevrons (twin pilots)
            'AI Copilots' =>
                '<g stroke="' . $scheme['accent'] . '" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round">' .
                '<path d="M158 145 L188 80 L188 145"/>' .
                '<path d="M212 145 L242 80 L242 145"/>' .
                '<line x1="166" y1="120" x2="183" y2="120" stroke-width="4" opacity="0.6"/>' .
                '<line x1="220" y1="120" x2="237" y2="120" stroke-width="4" opacity="0.6"/>' .
                '</g>',

            // Founder Intelligence → compass with north arrow
            'Founder Intelligence' =>
                '<circle cx="200" cy="112" r="44" stroke="' . $scheme['accent'] . '" stroke-width="3" fill="none"/>' .
                '<circle cx="200" cy="112" r="6" fill="' . $scheme['accent'] . '"/>' .
                '<path d="M200 72 L208 112 L200 152 L192 112 Z" fill="' . $scheme['accent'] . '"/>' .
                '<g stroke="' . $scheme['accent'] . '" stroke-width="2" opacity="0.5">' .
                '<line x1="200" y1="60" x2="200" y2="68"/>' .
                '<line x1="200" y1="156" x2="200" y2="164"/>' .
                '<line x1="148" y1="112" x2="156" y2="112"/>' .
                '<line x1="244" y1="112" x2="252" y2="112"/>' .
                '</g>',

            // Industry AI → stacked layers / building silhouette
            'Industry AI' =>
                '<g stroke="' . $scheme['accent'] . '" stroke-width="3" fill="none">' .
                '<rect x="150" y="135" width="100" height="22" rx="2"/>' .
                '<rect x="160" y="108" width="80" height="22" rx="2"/>' .
                '<rect x="172" y="81" width="56" height="22" rx="2" fill="' . $scheme['accent'] . '" fill-opacity="0.3"/>' .
                '</g>' .
                '<circle cx="200" cy="68" r="6" fill="' . $scheme['accent'] . '"/>' .
                '<line x1="200" y1="74" x2="200" y2="81" stroke="' . $scheme['accent'] . '" stroke-width="2"/>',

            // Business Automation → circular orbit / gear suggestion
            'Business Automation' =>
                '<circle cx="200" cy="112" r="46" stroke="' . $scheme['accent'] . '" stroke-width="3" fill="none" stroke-dasharray="6 6"/>' .
                '<circle cx="200" cy="112" r="22" stroke="' . $scheme['accent'] . '" stroke-width="3" fill="none"/>' .
                '<circle cx="200" cy="112" r="6" fill="' . $scheme['accent'] . '"/>' .
                '<g fill="' . $scheme['accent'] . '">' .
                '<circle cx="200" cy="60" r="5"/>' .
                '<circle cx="200" cy="164" r="5"/>' .
                '<circle cx="148" cy="112" r="5"/>' .
                '<circle cx="252" cy="112" r="5"/>' .
                '</g>',

            // Default → abstract pulse
            default =>
                '<circle cx="200" cy="112" r="14" fill="' . $scheme['accent'] . '"/>' .
                '<circle cx="200" cy="112" r="32" stroke="' . $scheme['accent'] . '" stroke-width="2" fill="none" opacity="0.5"/>' .
                '<circle cx="200" cy="112" r="52" stroke="' . $scheme['accent'] . '" stroke-width="2" fill="none" opacity="0.25"/>',
        };

        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 225" class="w-full h-full select-none" fill="none" aria-hidden="true">
    <defs>
        <linearGradient id="post-bg-{$slugId}" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="{$scheme['from']}"/>
            <stop offset="100%" stop-color="{$scheme['to']}"/>
        </linearGradient>
        <radialGradient id="post-glow-{$slugId}" cx="80%" cy="20%" r="70%">
            <stop offset="0%" stop-color="{$scheme['glow']}" stop-opacity="0.45"/>
            <stop offset="100%" stop-color="{$scheme['to']}" stop-opacity="0"/>
        </radialGradient>
        <pattern id="post-grid-{$slugId}" width="30" height="30" patternUnits="userSpaceOnUse">
            <path d="M 30 0 L 0 0 0 30" fill="none" stroke="#ffffff" stroke-width="1" stroke-opacity="0.04"/>
        </pattern>
    </defs>
    <rect width="400" height="225" fill="url(#post-bg-{$slugId})"/>
    <rect width="400" height="225" fill="url(#post-glow-{$slugId})"/>
    <rect width="400" height="225" fill="url(#post-grid-{$slugId})"/>

    <!-- decorative "article line" marks (top-left) -->
    <g stroke="{$scheme['accent']}" stroke-width="2" stroke-linecap="round" opacity="0.25">
        <line x1="32" y1="32" x2="92" y2="32"/>
        <line x1="32" y1="42" x2="74" y2="42"/>
        <line x1="32" y1="52" x2="58" y2="52"/>
    </g>

    <!-- central category glyph -->
    {$glyph}

    <!-- FairIT F watermark, bottom-right -->
    <g transform="translate(348, 178)" opacity="0.7">
        <rect width="32" height="32" rx="7" fill="#ffffff" fill-opacity="0.08"/>
        <path d="M9 7H21L23 9V10H12V14H19V17H12V25H9Z" fill="#ffffff" fill-opacity="0.55"/>
    </g>
</svg>
SVG;
    }
}
