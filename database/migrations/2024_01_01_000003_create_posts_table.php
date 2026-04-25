<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('category')->nullable();
            $table->string('tags')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('seo_title', 70)->nullable();
            $table->string('seo_desc', 160)->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamps();

            $table->index(['is_published', 'published_at']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
