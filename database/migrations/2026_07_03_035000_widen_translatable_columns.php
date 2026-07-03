<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Widen the columns that the translatable migrations wrap in JSON.
     *
     * spatie/laravel-translatable stores each value as {"en":"..."} (and later
     * de/fr/es/ar), which overflows the original varchar lengths on MySQL —
     * e.g. case_studies.seo_desc varchar(160) throws SQLSTATE[22001] 1406.
     * SQLite (local dev) ignores length limits, so this only bites on prod.
     *
     * Runs BEFORE 2026_07_03_035015 / _100000 (earlier timestamp) so the
     * columns are TEXT before any data conversion touches them.
     */
    public function up(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->text('project_name')->change();
            $table->text('seo_title')->nullable()->change();
            $table->text('seo_desc')->nullable()->change();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('seo_title')->nullable()->change();
            $table->text('seo_desc')->nullable()->change();
        });
    }

    /**
     * Restore the original varchar definitions. Only safe once the data
     * migrations have been rolled back (values un-wrapped to plain strings).
     */
    public function down(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->string('project_name')->change();
            $table->string('seo_title', 255)->nullable()->change();
            $table->string('seo_desc', 160)->nullable()->change();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->change();
            $table->string('seo_title', 70)->nullable()->change();
            $table->string('seo_desc', 160)->nullable()->change();
        });
    }
};
