<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

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
        'views'        => 'integer',
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
