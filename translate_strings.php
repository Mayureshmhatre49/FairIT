<?php

require __DIR__.'/vendor/autoload.php';

use Stichoza\GoogleTranslate\GoogleTranslate;

$locales = ['fr', 'de', 'es', 'ar'];

// Files to translate fully (seo.php doesn't exist in other langs yet)
$newFiles = ['seo.php'];

// Add the missing keys to existing files
$missingKeys = [
    'blog.php' => [
        'schema' => [
            'name' => 'AI Insights — FairIT Solutions',
            'description' => 'Expert insights on AI transformation, voice AI, founder productivity, and business automation.',
            'blog_name' => 'FairIT Solutions Insights',
            'blog_description' => 'Expert insights on AI transformation, voice AI, founder productivity, AI copilots, and business automation.',
            'insights' => 'Insights',
            'home' => 'Home',
        ],
        'related' => 'Related Insights',
        'all_insights' => 'All Insights',
        'by' => 'By',
        'read_time' => ':minutes min read', // We might need to handle the placeholder carefully
    ]
];

function translateArray($array, $translator) {
    $translated = [];
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $translated[$key] = translateArray($value, $translator);
        } else {
            // Check if string contains placeholder like :minutes
            $hasPlaceholder = strpos($value, ':minutes') !== false;
            if ($hasPlaceholder) {
                // temporarily replace placeholder
                $value = str_replace(':minutes', 'XYZMINUTES', $value);
            }
            $t = $translator->translate($value);
            if ($hasPlaceholder) {
                $t = str_replace('XYZMINUTES', ':minutes', $t);
            }
            $translated[$key] = $t;
        }
    }
    return $translated;
}

foreach ($locales as $locale) {
    echo "Translating for locale: $locale\n";
    $tr = new GoogleTranslate();
    $tr->setSource('en');
    $tr->setTarget($locale);
    
    // 1. Translate seo.php
    $enSeo = require __DIR__.'/lang/en/seo.php';
    $translatedSeo = translateArray($enSeo, $tr);
    
    // var_export produces formatting that works but isn't as pretty as Laravel's.
    // It's fine for our purposes right now.
    $seoContent = "<?php\n\nreturn " . var_export($translatedSeo, true) . ";\n";
    file_put_contents(__DIR__."/lang/{$locale}/seo.php", $seoContent);
    echo "  - seo.php translated\n";
    
    // 2. Append to blog.php
    $langBlog = require __DIR__."/lang/{$locale}/blog.php";
    $translatedMissingBlog = translateArray($missingKeys['blog.php'], $tr);
    
    $mergedBlog = array_merge($langBlog, $translatedMissingBlog);
    $blogContent = "<?php\n\nreturn " . var_export($mergedBlog, true) . ";\n";
    file_put_contents(__DIR__."/lang/{$locale}/blog.php", $blogContent);
    echo "  - blog.php updated\n";
    
    // Optional sleep to avoid rate limiting
    sleep(2);
}

echo "Done.\n";
