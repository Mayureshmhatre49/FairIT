<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Turnstile implements ValidationRule
{
    /**
     * Verifies a Cloudflare Turnstile token via the siteverify endpoint.
     * Fails open if TURNSTILE_SECRET_KEY is not configured so local dev
     * and staged rollouts keep working — production must set the key to
     * actually enforce the check.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secret = config('services.turnstile.secret');
        if (empty($secret)) {
            return;
        }

        if (! is_string($value) || $value === '') {
            $fail('Please complete the security check and try again.');
            return;
        }

        try {
            $response = Http::asForm()
                ->timeout(5)
                ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret'   => $secret,
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);
        } catch (\Throwable $e) {
            report($e);
            return;
        }

        if (! $response->successful() || ! $response->json('success')) {
            $fail('Security check failed. Please refresh the page and try again.');
        }
    }
}
