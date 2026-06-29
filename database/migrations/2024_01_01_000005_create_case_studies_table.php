<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('project_name');
            $table->string('slug')->unique();
            $table->string('domain')->index();
            $table->text('summary');
            $table->unsignedBigInteger('revenue_usd')->nullable();
            $table->boolean('is_ongoing')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('order')->default(0);
            $table->string('seo_title', 70)->nullable();
            $table->string('seo_desc', 160)->nullable();
            $table->timestamps();

            $table->index(['is_published', 'domain']);
            $table->index(['is_featured', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
