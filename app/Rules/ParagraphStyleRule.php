<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ParagraphStyleRule implements ValidationRule
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

        // Clean out HTML tags and split into paragraphs
        $cleanContent = strip_tags($value);
        $paragraphs = array_filter(explode("\n", $cleanContent), function ($p) {
            return trim($p) !== '';
        });

        foreach ($paragraphs as $index => $paragraph) {
            // Count sentences ending with ., !, or ?
            $sentenceCount = preg_match_all('/[.!?]+(\s|$)/', $paragraph);
            if ($sentenceCount > 3) {
                $fail("Paragraph " . ($index + 1) . " has {$sentenceCount} sentences. The brand style guide requires paragraphs to be 1 to 3 sentences long.");
                break;
            }
        }
    }
}
