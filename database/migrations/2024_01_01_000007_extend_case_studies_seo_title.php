<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Bump seo_title from varchar(70) to varchar(255).
     *
     * The original 70-char limit was tight even for the initial seeder.
     * After the recent client-name anonymisation pass, several seed values
     * (e.g. "Creative Stock Photo & Video Marketplace — Creative Media
     * Marketplace Client" — 76 chars) overflow it and the seeder fails
     * with SQLSTATE[22001] 1406.
     *
     * 255 is a comfortable headroom. Google may visually truncate SEO
     * titles around 60 chars in SERPs, but storage isn't the constraint —
     * the admin form can still warn at 70 if desired.
     */
    public function up(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->string('seo_title', 255)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->string('seo_title', 70)->nullable()->change();
        });
    }
};
