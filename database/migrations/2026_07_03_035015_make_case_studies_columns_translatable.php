<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $columns = ['project_name', 'summary', 'challenge', 'approach', 'outcome', 'seo_title', 'seo_desc'];

        // Convert existing data to JSON format for spatie/laravel-translatable
        $caseStudies = DB::table('case_studies')->get();

        foreach ($caseStudies as $study) {
            $updates = [];
            foreach ($columns as $column) {
                if (isset($study->$column) && !is_null($study->$column)) {
                    // Check if it's already JSON (just in case)
                    $decoded = json_decode($study->$column, true);
                    if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
                        $updates[$column] = json_encode(['en' => $study->$column], JSON_UNESCAPED_UNICODE);
                    }
                }
            }

            if (!empty($updates)) {
                DB::table('case_studies')->where('id', $study->id)->update($updates);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $columns = ['project_name', 'summary', 'challenge', 'approach', 'outcome', 'seo_title', 'seo_desc'];

        $caseStudies = DB::table('case_studies')->get();

        foreach ($caseStudies as $study) {
            $updates = [];
            foreach ($columns as $column) {
                if (isset($study->$column) && !is_null($study->$column)) {
                    $decoded = json_decode($study->$column, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded) && isset($decoded['en'])) {
                        $updates[$column] = $decoded['en'];
                    }
                }
            }

            if (!empty($updates)) {
                DB::table('case_studies')->where('id', $study->id)->update($updates);
            }
        }
    }
};
