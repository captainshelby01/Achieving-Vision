<?php

namespace Tests\Unit;

use App\Rules\NoEmDashesRule;
use Tests\TestCase;

class NoEmDashesRuleTest extends TestCase
{
    public function test_it_passes_for_valid_content_without_em_dashes()
    {
        $rule = new NoEmDashesRule();
        $failed = false;

        $rule->validate('content', 'This is a clean sentence. It uses periods and commas, but no em dashes.', function ($message) use (&$failed) {
            $failed = true;
        });

        $this->assertFalse($failed, 'Rule should pass when no em dashes are present.');
    }

    public function test_it_fails_for_content_with_unicode_em_dash()
    {
        $rule = new NoEmDashesRule();
        $failed = false;

        $rule->validate('content', 'Here is a thought — with an em dash.', function ($message) use (&$failed) {
            $failed = true;
            $this->assertStringContainsString('em dashes', $message);
        });

        $this->assertTrue($failed, 'Rule should fail when a Unicode em dash is present.');
    }

    public function test_it_fails_for_content_with_double_hyphen()
    {
        $rule = new NoEmDashesRule();
        $failed = false;

        $rule->validate('content', 'Here is a thought -- written with double hyphens.', function ($message) use (&$failed) {
            $failed = true;
        });

        $this->assertTrue($failed, 'Rule should fail when double hyphens are present.');
    }
}
