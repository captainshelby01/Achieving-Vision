<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduledPostPublishingTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_publishes_scheduled_posts_when_command_runs()
    {
        $user = User::factory()->create();

        $scheduledPost = Post::create([
            'author_id' => $user->id,
            'title' => 'Scheduled Post Title',
            'content' => 'This is a scheduled post content test.',
            'status' => 'scheduled',
            'scheduled_for' => now()->subMinutes(10),
        ]);

        $draftPost = Post::create([
            'author_id' => $user->id,
            'title' => 'Draft Post Title',
            'content' => 'This is a draft post content test.',
            'status' => 'draft',
        ]);

        $this->artisan('posts:publish-scheduled')
             ->assertExitCode(0);

        $this->assertEquals('published', $scheduledPost->fresh()->status);
        $this->assertEquals('draft', $draftPost->fresh()->status);
    }
}
