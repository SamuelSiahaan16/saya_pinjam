<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $gResponseToken = (string) $value;

        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => env('SECRET_KEY_RECAPTCHA'),
                'response' => $gResponseToken,
            ]
        );

        $responseBody = json_decode($response->body(), true);

        if (!isset($responseBody['success']) || !$responseBody['success']) {
            $fail('Invalid reCAPTCHA. Please try again.');
        }
    }
}