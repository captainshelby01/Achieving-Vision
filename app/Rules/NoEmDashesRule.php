<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoEmDashesRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value)) {
            return;
        }

        // Check for Unicode em dash (\u{2014}), double hyphen (--), or HTML entity (&mdash;)
        if (preg_match('/[\x{2014}]|--|&mdash;|&#8212;/u', $value)) {
            $fail('The :attribute contains em dashes (— or --), which are strictly prohibited by the brand voice guide. Use a period, comma, or parentheses instead.');
        }
    }
}
