<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Convert existing posts.{title,excerpt,content,seo_title,seo_desc}
     * from single-value strings to spatie/laravel-translatable JSON.
     *
     * Existing English content is wrapped as {"en": "..."}. New locales
     * are added via subsequent seeders / admin edits and Spatie falls
     * back to English when a locale is missing.
     *
     * Mirrors the earlier case-studies translatable migration.
     */
    public function up(): void
    {
        $columns = ['title', 'excerpt', 'content', 'seo_title', 'seo_desc'];

        $posts = DB::table('posts')->get();

        foreach ($posts as $post) {
            $updates = [];
            foreach ($columns as $column) {
                if (! isset($post->$column) || is_null($post->$column)) {
                    continue;
                }
                $decoded = json_decode($post->$column, true);
                // Skip if already migrated to translatable JSON
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    continue;
                }
                $updates[$column] = json_encode(
                    ['en' => $post->$column],
                    JSON_UNESCAPED_UNICODE
                );
            }
            if (! empty($updates)) {
                DB::table('posts')->where('id', $post->id)->update($updates);
            }
        }
    }

    public function down(): void
    {
        $columns = ['title', 'excerpt', 'content', 'seo_title', 'seo_desc'];

        $posts = DB::table('posts')->get();

        foreach ($posts as $post) {
            $updates = [];
            foreach ($columns as $column) {
                if (! isset($post->$column) || is_null($post->$column)) {
                    continue;
                }
                $decoded = json_decode($post->$column, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded) && isset($decoded['en'])) {
                    $updates[$column] = $decoded['en'];
                }
            }
            if (! empty($updates)) {
                DB::table('posts')->where('id', $post->id)->update($updates);
            }
        }
    }
};
