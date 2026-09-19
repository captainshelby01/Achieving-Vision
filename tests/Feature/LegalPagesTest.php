<?php

namespace Tests\Feature;

use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    public function test_it_renders_the_privacy_policy_page(): void
    {
        $response = $this->get('/privacy');

        $response->assertStatus(200)
                 ->assertSee('Privacy Policy')
                 ->assertSee('The Information We Collect')
                 ->assertSee('How We Use Your Information')
                 ->assertSee('Your Data Rights');
    }

    public function test_it_renders_terms_of_service_page(): void
    {
        $response = $this->get('/terms');

        $response->assertStatus(200)
                 ->assertSee('Terms of Service')
                 ->assertSee('Acceptance of Terms')
                 ->assertSee('Intellectual Property & Fair Use', false)
                 ->assertSee('Reader Guidance Disclaimer');
    }

    public function test_it_renders_dedicated_newsletter_page(): void
    {
        $response = $this->get('/newsletter');

        $response->assertStatus(200)
                 ->assertSee('A clearer way forward, once a week.')
                 ->assertSee('What You Can Expect Every Week')
                 ->assertSee('Zero Fluff & Zero Ads', false);
    }

    public function test_it_renders_xml_sitemap(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200)
                 ->assertHeader('Content-Type', 'application/xml')
                 ->assertSee('<urlset', false)
                 ->assertSee('<loc>', false);
    }
}