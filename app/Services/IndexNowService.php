<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * IndexNow — instant URL notification protocol supported by Bing, Yandex,
 * Seznam, Naver, and others. https://www.indexnow.org
 *
 * Notify search engines instantly when content is published, updated, or
 * removed instead of waiting for the next crawl.
 */
class IndexNowService
{
    private string $key      = '107984da736e498cfb85b3445a41bc9f';
    private string $host     = 'fairitsolutions.ch';
    private string $endpoint = 'https://api.indexnow.org/IndexNow';

    public function notify(string|array $urls): void
    {
        // Only fire in production; local dev should never ping public search engines
        if (! app()->environment('production')) {
            return;
        }

        $urls = is_array($urls) ? $urls : [$urls];
        $urls = array_values(array_filter($urls));

        if (empty($urls)) {
            return;
        }

        try {
            Http::timeout(5)->post($this->endpoint, [
                'host'        => $this->host,
                'key'         => $this->key,
                'keyLocation' => "https://{$this->host}/{$this->key}.txt",
                'urlList'     => $urls,
            ]);
        } catch (\Throwable $e) {
            // IndexNow notification is best-effort; never break the user request
            Log::warning('IndexNow notification failed', ['error' => $e->getMessage()]);
        }
    }
}
