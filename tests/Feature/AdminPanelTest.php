<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_page_renders_successfully(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/admin/login');
    }

    public function test_authenticated_author_can_access_admin_dashboard(): void
    {
        $author = User::factory()->create([
            'email' => 'oghale@achievewithoghale.com',
        ]);

        $response = $this->actingAs($author)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_author_can_view_posts_resource(): void
    {
        $author = User::factory()->create();

        $response = $this->actingAs($author)->get('/admin/posts');

        $response->assertStatus(200);
    }

    public function test_author_can_view_comments_resource(): void
    {
        $author = User::factory()->create();

        $response = $this->actingAs($author)->get('/admin/comments');

        $response->assertStatus(200);
    }

    public function test_author_can_view_events_resource(): void
    {
        $author = User::factory()->create();

        $response = $this->actingAs($author)->get('/admin/events');

        $response->assertStatus(200);
    }

    public function test_author_can_view_subscribers_resource(): void
    {
        $author = User::factory()->create();

        $response = $this->actingAs($author)->get('/admin/subscribers');

        $response->assertStatus(200);
    }
}