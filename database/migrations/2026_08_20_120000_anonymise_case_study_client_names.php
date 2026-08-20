<?php

use App\Models\CaseStudy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Client-confidentiality pass for case studies.
 *
 * The public site already renders every client as "Confidential Client" via
 * CaseStudy::getDisplayClientNameAttribute(). This migration removes the
 * remaining identifiable names that live inside content the accessor can't
 * touch — project titles, prose, SEO fields, and URL slugs — across ALL
 * locales (en/de/fr/es/ar), since machine translation leaves proper nouns
 * (place names, product names, foundation names) intact.
 *
 * It also scrubs the named foundations from the Sitecore QA case study. That
 * row exists only on production, so the scrub is written as a global token
 * replacement rather than a row-targeted edit.
 *
 * Idempotent: slug renames are no-ops once applied, and the token replacements
 * find nothing to change on a second run. down() intentionally does not restore
 * the original names.
 */
return new class extends Migration
{
    public function up(): void
    {
        // 1) Rename slugs that carried a place or product name. Add the matching
        //    301 redirects in routes/web.php (already done) so old links survive.
        $slugRenames = [
            'household-survey-burhanpur-khandwa' => 'household-survey-two-districts',
            'household-survey-bhopal'            => 'household-survey-additional-districts',
            'hotelsavings'                       => 'b2b-wholesale-rate-comparison',
        ];

        foreach ($slugRenames as $old => $new) {
            DB::table('case_studies')->where('slug', $old)->update(['slug' => $new]);
        }

        // 2) Token replacements applied to every locale of every text field.
        //    strtr() replaces longest keys first and never re-touches output,
        //    so the specific multi-word phrases win over the bare place names.
        $replacements = [
            // Household-survey districts (place names identify the client).
            'Burhanpur & Khandwa'   => 'Two Districts',
            'Burhanpur and Khandwa' => 'the first two districts',
            'Burhanpur und Khandwa' => 'die ersten beiden Bezirke',
            'Burhanpur et Khandwa'  => 'les deux premiers districts',
            'Burhanpur y Khandwa'   => 'los dos primeros distritos',
            'Burhanpur'             => 'the district',
            'Khandwa'               => 'the district',
            'Bhopal'                => 'the district',

            // Product name.
            'Hotelsavings' => 'The platform',

            // Sitecore QA row (production only): named end-clients of the partner.
            'the Bill Gates Foundation'             => 'a global foundation',
            'Bill Gates Foundation'                 => 'a global foundation',
            'the Gates Foundation'                  => 'a global foundation',
            'Gates Foundation'                      => 'a global foundation',
            'the JFK Foundation'                    => 'a major non-profit',
            'JFK Foundation'                        => 'a major non-profit',
            'the California Health Care Foundation' => 'a healthcare foundation',
            'California Health Care Foundation'     => 'a healthcare foundation',
            'the American College of Cardiology'    => 'a medical association',
            'American College of Cardiology'        => 'a medical association',
        ];

        $fields = ['project_name', 'summary', 'challenge', 'approach', 'outcome', 'seo_title', 'seo_desc'];

        CaseStudy::query()->chunkById(50, function ($rows) use ($replacements, $fields) {
            foreach ($rows as $study) {
                $dirty = false;

                foreach ($fields as $field) {
                    foreach ($study->getTranslations($field) as $locale => $value) {
                        if (! is_string($value) || $value === '') {
                            continue;
                        }

                        $scrubbed = strtr($value, $replacements);

                        if ($scrubbed !== $value) {
                            $study->setTranslation($field, $locale, $scrubbed);
                            $dirty = true;
                        }
                    }
                }

                if ($dirty) {
                    $study->save();
                }
            }
        });
    }

    public function down(): void
    {
        // No-op: client identities are intentionally not restored.
    }
};
