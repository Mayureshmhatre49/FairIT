<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->text('challenge')->nullable()->after('summary');
            $table->text('approach')->nullable()->after('challenge');
            $table->text('outcome')->nullable()->after('approach');
            $table->string('tech_keywords', 500)->nullable()->after('outcome');
        });
    }

    public function down(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->dropColumn(['challenge', 'approach', 'outcome', 'tech_keywords']);
        });
    }
};
