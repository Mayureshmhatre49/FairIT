<?php

namespace App\Services;

class LinkBuilder
{
    /**
     * Replaces keywords in text with contextual internal links.
     */
    public static function inject(string $text): string
    {
        $links = [
            'AI strategy' => route('services.advisory'),
            'AI Copilot' => route('services.copilot'),
            'Voice AI' => route('services.voiceai'),
            'AI Operating System' => route('products.index'),
            'SarathiOS' => route('products.sarathios'),
            'founder growth' => route('services.founder'),
        ];

        foreach ($links as $keyword => $url) {
            // Only replace the first occurrence to avoid link stuffing
            $pattern = '/\b(' . preg_quote($keyword, '/') . ')\b/i';
            $replacement = '<a href="' . $url . '" class="text-brand-600 hover:text-brand-700 underline underline-offset-2">$1</a>';
            $text = preg_replace($pattern, $replacement, $text, 1);
        }

        return $text;
    }
}
