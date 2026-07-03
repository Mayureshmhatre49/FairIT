<?php

namespace App\Models;

use App\Services\IndexNowService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory, HasTranslations;

    /**
     * Columns whose value is a JSON blob of translations keyed by locale.
     * Reads (via $post->title etc.) return the current-locale value, with
     * automatic fallback per config/translatable.php.
     *
     * Category, tags, and slug intentionally stay single-value — they act
     * as identifiers, not user-facing prose.
     */
    public array $translatable = [
        'title',
        'excerpt',
        'content',
        'seo_title',
        'seo_desc',
    ];

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

        // Category glyphs are now built as a layered composition:
        //   - $glyphBg    : background halo / secondary geometry (25-40% opacity, hover-motion)
        //   - $glyphMain  : primary illustration (full opacity)
        //   - $glyphAccent: small foreground detail marks (subtle)
        // Centred near 200,112 in a 400x225 viewBox to match the CaseStudy geometry.
        $a = $scheme['accent'];
        [$glyphBg, $glyphMain, $glyphAccent] = match ($category) {

            // AI Strategy → strategic network. Background: dashed decision hexagon.
            // Main: node graph with weighted central hub. Accent: signal arcs radiating.
            'AI Strategy' => [
                // Background — dashed hexagonal decision boundary
                '<g stroke="' . $a . '" stroke-width="1.5" fill="none" stroke-dasharray="3 5" opacity="0.35">' .
                '<polygon points="200,52 262,86 262,138 200,172 138,138 138,86"/>' .
                '</g>' .
                '<circle cx="200" cy="112" r="70" stroke="' . $a . '" stroke-width="1" fill="none" opacity="0.15"/>',

                // Main — network graph, thicker central hub, richer edge weights
                '<g stroke="' . $a . '" stroke-width="2" fill="none" stroke-linecap="round">' .
                '<line x1="200" y1="112" x2="155" y2="75"/>' .
                '<line x1="200" y1="112" x2="245" y2="75"/>' .
                '<line x1="200" y1="112" x2="155" y2="149"/>' .
                '<line x1="200" y1="112" x2="245" y2="149"/>' .
                '<line x1="155" y1="75" x2="245" y2="75" stroke-width="1" opacity="0.5"/>' .
                '<line x1="155" y1="149" x2="245" y2="149" stroke-width="1" opacity="0.5"/>' .
                '</g>' .
                '<circle cx="200" cy="112" r="14" fill="' . $a . '"/>' .
                '<circle cx="200" cy="112" r="20" stroke="' . $a . '" stroke-width="1.5" fill="none" opacity="0.4"/>' .
                '<circle cx="155" cy="75" r="7" fill="' . $a . '"/>' .
                '<circle cx="245" cy="75" r="7" fill="' . $a . '"/>' .
                '<circle cx="155" cy="149" r="7" fill="' . $a . '"/>' .
                '<circle cx="245" cy="149" r="7" fill="' . $a . '"/>',

                // Accent — tiny inner-node highlights
                '<g fill="#ffffff" opacity="0.6">' .
                '<circle cx="200" cy="108" r="2"/>' .
                '<circle cx="155" cy="72" r="1.5"/>' .
                '<circle cx="245" cy="72" r="1.5"/>' .
                '</g>',
            ],

            // Voice AI → richer soundwave. Background: circular ripples suggesting
            // radial audio. Main: waveform bars with varied heights. Accent: focus dots.
            'Voice AI' => [
                // Background — concentric ripple rings around the wave
                '<g stroke="' . $a . '" fill="none" stroke-width="1" opacity="0.2">' .
                '<circle cx="200" cy="112" r="90"/>' .
                '<circle cx="200" cy="112" r="70"/>' .
                '<circle cx="200" cy="112" r="50"/>' .
                '</g>',

                // Main — asymmetric soundwave with amplitude variety
                '<g fill="' . $a . '">' .
                '<rect x="142" y="102" width="5" height="20" rx="2.5" opacity="0.4"/>' .
                '<rect x="154" y="88" width="5" height="48" rx="2.5" opacity="0.6"/>' .
                '<rect x="166" y="76" width="5" height="72" rx="2.5" opacity="0.8"/>' .
                '<rect x="178" y="64" width="5" height="96" rx="2.5"/>' .
                '<rect x="190" y="52" width="5" height="120" rx="2.5"/>' .
                '<rect x="202" y="60" width="5" height="104" rx="2.5"/>' .
                '<rect x="214" y="70" width="5" height="84" rx="2.5"/>' .
                '<rect x="226" y="82" width="5" height="60" rx="2.5" opacity="0.8"/>' .
                '<rect x="238" y="94" width="5" height="36" rx="2.5" opacity="0.6"/>' .
                '<rect x="250" y="104" width="5" height="16" rx="2.5" opacity="0.4"/>' .
                '</g>',

                // Accent — floating "phoneme" particle dots
                '<g fill="' . $a . '" opacity="0.55">' .
                '<circle cx="128" cy="88" r="1.8"/>' .
                '<circle cx="118" cy="112" r="1.4"/>' .
                '<circle cx="272" cy="128" r="1.8"/>' .
                '<circle cx="282" cy="100" r="1.4"/>' .
                '</g>',
            ],

            // AI Copilots → dual-wing formation with motion trails. Background:
            // slipstream lines. Main: two chevrons with subtle gradient fill.
            // Accent: forward-motion arrow between them.
            'AI Copilots' => [
                // Background — slipstream horizontal lines
                '<g stroke="' . $a . '" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.28">' .
                '<line x1="86" y1="90" x2="126" y2="90"/>' .
                '<line x1="88" y1="112" x2="132" y2="112"/>' .
                '<line x1="86" y1="134" x2="126" y2="134"/>' .
                '<line x1="274" y1="90" x2="314" y2="90"/>' .
                '<line x1="268" y1="112" x2="312" y2="112"/>' .
                '<line x1="274" y1="134" x2="314" y2="134"/>' .
                '</g>',

                // Main — twin chevrons
                '<g stroke="' . $a . '" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round">' .
                '<path d="M158 148 L188 80 L188 148"/>' .
                '<path d="M212 148 L242 80 L242 148"/>' .
                '<line x1="166" y1="122" x2="184" y2="122" stroke-width="4" opacity="0.7"/>' .
                '<line x1="220" y1="122" x2="238" y2="122" stroke-width="4" opacity="0.7"/>' .
                '</g>',

                // Accent — central forward-motion arrow between the wings
                '<g fill="' . $a . '" opacity="0.55">' .
                '<path d="M195 108 L205 108 L205 100 L215 112 L205 124 L205 116 L195 116 Z"/>' .
                '</g>',
            ],

            // Founder Intelligence → richer compass. Background: cartographic grid.
            // Main: compass ring with N/S needle. Accent: cardinal tick marks + rose.
            'Founder Intelligence' => [
                // Background — cartographic crosshair + faint outer ring
                '<g stroke="' . $a . '" stroke-width="1" fill="none" opacity="0.2">' .
                '<circle cx="200" cy="112" r="66"/>' .
                '<line x1="120" y1="112" x2="280" y2="112"/>' .
                '<line x1="200" y1="40" x2="200" y2="184"/>' .
                '<line x1="152" y1="64" x2="248" y2="160"/>' .
                '<line x1="248" y1="64" x2="152" y2="160"/>' .
                '</g>',

                // Main — compass body
                '<circle cx="200" cy="112" r="46" stroke="' . $a . '" stroke-width="3" fill="none"/>' .
                '<circle cx="200" cy="112" r="46" stroke="' . $a . '" stroke-width="1" fill="none" opacity="0.3" stroke-dasharray="1 4"/>' .
                '<circle cx="200" cy="112" r="7" fill="' . $a . '"/>' .
                '<circle cx="200" cy="112" r="12" stroke="' . $a . '" stroke-width="1.5" fill="none" opacity="0.5"/>' .
                '<path d="M200 70 L208 112 L200 154 L192 112 Z" fill="' . $a . '"/>' .
                '<path d="M200 70 L200 112 L192 112 Z" fill="#ffffff" fill-opacity="0.25"/>',

                // Accent — cardinal tick marks + NE/SW small rose
                '<g stroke="' . $a . '" stroke-width="2" stroke-linecap="round">' .
                '<line x1="200" y1="58" x2="200" y2="66"/>' .
                '<line x1="200" y1="158" x2="200" y2="166"/>' .
                '<line x1="146" y1="112" x2="154" y2="112"/>' .
                '<line x1="246" y1="112" x2="254" y2="112"/>' .
                '</g>' .
                '<g stroke="' . $a . '" stroke-width="1.5" opacity="0.4">' .
                '<line x1="166" y1="78" x2="171" y2="83"/>' .
                '<line x1="234" y1="78" x2="229" y2="83"/>' .
                '<line x1="166" y1="146" x2="171" y2="141"/>' .
                '<line x1="234" y1="146" x2="229" y2="141"/>' .
                '</g>',
            ],

            // Industry AI → data-core stack. Background: connecting circuit lines.
            // Main: three stacked layers with inner glow. Accent: signal beam up.
            'Industry AI' => [
                // Background — angled circuit lines flanking the stack
                '<g stroke="' . $a . '" stroke-width="1.5" fill="none" stroke-linecap="round" opacity="0.28">' .
                '<path d="M110 70 L130 70 L138 78 L138 178"/>' .
                '<path d="M290 70 L270 70 L262 78 L262 178"/>' .
                '<circle cx="110" cy="70" r="3" fill="' . $a . '" fill-opacity="0.5" stroke="none"/>' .
                '<circle cx="290" cy="70" r="3" fill="' . $a . '" fill-opacity="0.5" stroke="none"/>' .
                '</g>',

                // Main — three stacked layers, inner glow on top
                '<g stroke="' . $a . '" stroke-width="3" fill="none">' .
                '<rect x="150" y="140" width="100" height="22" rx="3"/>' .
                '<rect x="160" y="112" width="80" height="22" rx="3"/>' .
                '<rect x="170" y="84" width="60" height="22" rx="3" fill="' . $a . '" fill-opacity="0.35"/>' .
                '</g>' .
                '<line x1="150" y1="150" x2="250" y2="150" stroke="' . $a . '" stroke-width="1" opacity="0.4"/>' .
                '<line x1="160" y1="122" x2="240" y2="122" stroke="' . $a . '" stroke-width="1" opacity="0.4"/>',

                // Accent — signal beam rising from the top layer
                '<circle cx="200" cy="68" r="7" fill="' . $a . '"/>' .
                '<circle cx="200" cy="68" r="12" stroke="' . $a . '" stroke-width="1" fill="none" opacity="0.5"/>' .
                '<line x1="200" y1="75" x2="200" y2="84" stroke="' . $a . '" stroke-width="2"/>' .
                '<g fill="#ffffff" opacity="0.65">' .
                '<circle cx="200" cy="65" r="2"/>' .
                '</g>',
            ],

            // Business Automation → multi-orbit system. Background: elliptical tilted orbit.
            // Main: concentric orbits with satellites. Accent: motion tick indicators.
            'Business Automation' => [
                // Background — tilted elliptical orbit for depth
                '<ellipse cx="200" cy="112" rx="72" ry="26" stroke="' . $a . '" stroke-width="1.5" fill="none" opacity="0.25" transform="rotate(-18 200 112)"/>' .
                '<ellipse cx="200" cy="112" rx="72" ry="26" stroke="' . $a . '" stroke-width="1" fill="none" opacity="0.15" transform="rotate(24 200 112)"/>',

                // Main — outer dashed orbit + inner solid ring + core
                '<circle cx="200" cy="112" r="52" stroke="' . $a . '" stroke-width="3" fill="none" stroke-dasharray="6 6"/>' .
                '<circle cx="200" cy="112" r="26" stroke="' . $a . '" stroke-width="3" fill="none"/>' .
                '<circle cx="200" cy="112" r="8" fill="' . $a . '"/>' .
                '<circle cx="200" cy="112" r="14" stroke="' . $a . '" stroke-width="1" fill="none" opacity="0.5"/>',

                // Accent — satellite dots with subtle trailing highlights
                '<g fill="' . $a . '">' .
                '<circle cx="200" cy="60" r="6"/>' .
                '<circle cx="200" cy="164" r="6"/>' .
                '<circle cx="148" cy="112" r="6"/>' .
                '<circle cx="252" cy="112" r="6"/>' .
                '</g>' .
                '<g fill="#ffffff" opacity="0.7">' .
                '<circle cx="200" cy="58" r="1.8"/>' .
                '<circle cx="252" cy="110" r="1.8"/>' .
                '</g>',
            ],

            // Default → radial pulse. Background: outer diffusion rings.
            // Main: pulse rings. Accent: central highlight.
            default => [
                '<circle cx="200" cy="112" r="70" stroke="' . $a . '" stroke-width="1" fill="none" opacity="0.12"/>',
                '<circle cx="200" cy="112" r="14" fill="' . $a . '"/>' .
                '<circle cx="200" cy="112" r="32" stroke="' . $a . '" stroke-width="2" fill="none" opacity="0.5"/>' .
                '<circle cx="200" cy="112" r="52" stroke="' . $a . '" stroke-width="2" fill="none" opacity="0.25"/>',
                '<circle cx="200" cy="108" r="3" fill="#ffffff" fill-opacity="0.7"/>',
            ],
        };

        // Build the SVG. Each layer is grouped so Tailwind hover
        // transitions in blog/index.blade.php can subtly animate the
        // background (parallax) and main glyph (scale/translate) without
        // affecting the accent details. The parent card owns the `group`
        // class; here we use `group-hover:*` from Tailwind.
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
        <radialGradient id="post-glow-alt-{$slugId}" cx="20%" cy="90%" r="50%">
            <stop offset="0%" stop-color="{$scheme['from']}" stop-opacity="0.4"/>
            <stop offset="100%" stop-color="{$scheme['to']}" stop-opacity="0"/>
        </radialGradient>
        <pattern id="post-grid-{$slugId}" width="30" height="30" patternUnits="userSpaceOnUse">
            <path d="M 30 0 L 0 0 0 30" fill="none" stroke="#ffffff" stroke-width="1" stroke-opacity="0.04"/>
        </pattern>
    </defs>

    <!-- base surface: gradient + dual radial glow + hairline grid -->
    <rect width="400" height="225" fill="url(#post-bg-{$slugId})"/>
    <rect width="400" height="225" fill="url(#post-glow-{$slugId})"/>
    <rect width="400" height="225" fill="url(#post-glow-alt-{$slugId})"/>
    <rect width="400" height="225" fill="url(#post-grid-{$slugId})"/>

    <!-- editorial "article line" marks (top-left) -->
    <g stroke="{$scheme['accent']}" stroke-width="2" stroke-linecap="round" opacity="0.25">
        <line x1="32" y1="32" x2="92" y2="32"/>
        <line x1="32" y1="42" x2="74" y2="42"/>
        <line x1="32" y1="52" x2="58" y2="52"/>
    </g>

    <!-- editorial corner brackets — three corners frame the composition -->
    <g stroke="{$scheme['accent']}" stroke-width="1.5" stroke-linecap="square" fill="none" opacity="0.35">
        <path d="M368 24 L376 24 L376 32"/>
        <path d="M24 193 L24 201 L32 201"/>
    </g>

    <!-- background halo / secondary geometry -->
    <g class="transition-transform duration-700 group-hover:scale-105" style="transform-origin: 200px 112px">
        {$glyphBg}
    </g>

    <!-- primary illustration (subtly lifts on hover) -->
    <g class="transition-transform duration-500 group-hover:-translate-y-0.5">
        {$glyphMain}
    </g>

    <!-- foreground accent details -->
    {$glyphAccent}

    <!-- FairIT F watermark, bottom-right -->
    <g transform="translate(348, 178)" opacity="0.75">
        <rect width="32" height="32" rx="7" fill="#ffffff" fill-opacity="0.09"/>
        <path d="M9 7H21L23 9V10H12V14H19V17H12V25H9Z" fill="#ffffff" fill-opacity="0.6"/>
    </g>
</svg>
SVG;
    }
}
