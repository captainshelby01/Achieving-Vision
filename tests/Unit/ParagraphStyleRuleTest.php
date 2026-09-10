<?php

namespace Tests\Unit;

use App\Rules\ParagraphStyleRule;
use Tests\TestCase;

class ParagraphStyleRuleTest extends TestCase
{
    public function test_it_passes_for_paragraphs_with_three_or_fewer_sentences()
    {
        $rule = new ParagraphStyleRule();
        $failed = false;

        $content = "Sentence one. Sentence two. Sentence three.\n\nAnother paragraph with one sentence.";

        $rule->validate('content', $content, function ($message) use (&$failed) {
            $failed = true;
        });

        $this->assertFalse($failed, 'Rule should pass when paragraphs have <= 3 sentences.');
    }

    public function test_it_fails_for_paragraphs_with_more_than_three_sentences()
    {
        $rule = new ParagraphStyleRule();
        $failed = false;

        $content = "Sentence one. Sentence two. Sentence three. Sentence four is too long for the brand voice!";

        $rule->validate('content', $content, function ($message) use (&$failed) {
            $failed = true;
            $this->assertStringContainsString('1 to 3 sentences', $message);
        });

        $this->assertTrue($failed, 'Rule should fail when a paragraph exceeds 3 sentences.');
    }
}
