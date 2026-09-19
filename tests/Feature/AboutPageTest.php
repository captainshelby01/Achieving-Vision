<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_renders_the_about_page_successfully(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200)
                 ->assertSeeText('About Oghale')
                 ->assertSeeText('What We Are')
                 ->assertSeeText('What We Are NOT')
                 ->assertSeeText('Books by Oghale')
                 ->assertSee('Researcher & Guide', false);
    }
}
