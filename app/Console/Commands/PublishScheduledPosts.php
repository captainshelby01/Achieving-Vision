<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PublishScheduledPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:publish-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically publish posts that are scheduled for now or in the past.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scheduledPosts = Post::scheduled()->get();

        if ($scheduledPosts->isEmpty()) {
            $this->info('No scheduled posts to publish.');
            return 0;
        }

        $count = 0;
        foreach ($scheduledPosts as $post) {
            $post->update([
                'status' => 'published',
                'published_at' => $post->scheduled_for ?? now(),
            ]);
            $count++;
            Log::info("Post ID {$post->id} ('{$post->title}') automatically published by scheduler.");
        }

        $this->info("Successfully published {$count} scheduled post(s).");
        return 0;
    }
}
