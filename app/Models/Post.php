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
}
