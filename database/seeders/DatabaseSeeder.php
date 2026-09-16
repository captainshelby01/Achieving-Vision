<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $author = User::firstOrCreate(
            ['email' => 'oghale@achievewithoghale.com'],
            [
                'name' => 'Oghale',
                'password' => bcrypt('password123'),
            ]
        );

        $catMindset = Category::firstOrCreate(['name' => 'Mindset & Vision'], ['slug' => 'mindset-vision', 'description' => 'Overcoming limiting beliefs and cultivating vision.']);
        $catExecution = Category::firstOrCreate(['name' => 'Execution & Systems'], ['slug' => 'execution-systems', 'description' => 'Practical steps for daily follow-through.']);
        $catLimits = Category::firstOrCreate(['name' => 'Overcoming Limits'], ['slug' => 'overcoming-limits', 'description' => 'Breaking through glass ceilings and finishing what you start.']);

        $tagFocus = Tag::firstOrCreate(['name' => 'Focus'], ['slug' => 'focus']);
        $tagHabits = Tag::firstOrCreate(['name' => 'Habits'], ['slug' => 'habits']);
        $tagGrowth = Tag::firstOrCreate(['name' => 'Growth'], ['slug' => 'growth']);

        $post1 = Post::firstOrCreate(
            ['slug' => 'the-art-of-finishing-what-you-start'],
            [
                'author_id' => $author->id,
                'title' => 'The Art of Finishing What You Start',
                'excerpt' => 'Most people do not fail because they lack ambition. They fail because they have never been taught how to sit with a project long enough to complete it.',
                'content' => "<p>Three years ago, I sat at a small kitchen table surrounded by unfinished notebooks. Every single notebook represented a big idea that died before it ever reached the world. That night, I realized something simple. Starting is easy, but finishing is where transformation lives.</p>\n\n<p>To finish what you start, you must reduce your daily scope. Do not try to build an empire in a single afternoon. Instead, focus on completing one small, tangible piece every single day.</p>\n\n<p>Build momentum by celebrating small completions. Over time, these small finishes stack up into massive outcomes that nobody can ignore.</p>",
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'seo_title' => 'The Art of Finishing What You Start | Achieving Vision',
                'seo_description' => 'Learn practical strategies to follow through on big ideas and finish what you start.',
                'reading_time_min' => 3,
                'views_count' => 142,
                'likes_count' => 18,
            ]
        );
        $post1->categories()->sync([$catExecution->id]);
        $post1->tags()->sync([$tagFocus->id, $tagHabits->id]);

        $post2 = Post::firstOrCreate(
            ['slug' => 'why-limiting-beliefs-hold-dreamers-back'],
            [
                'author_id' => $author->id,
                'title' => 'Why Limiting Beliefs Hold High Achievers Back',
                'excerpt' => 'Limiting beliefs are subtle scripts that play in the back of your mind. Here is how to rewrite them using practical principles.',
                'content' => "<p>A reader recently asked me why so many talented people get stuck. The answer is almost never a lack of resources or intelligence. It is the silent belief that someone else owns the space.</p>\n\n<p>There is no such thing as a crowded field when you bring your genuine voice to the table. Nobody can build your vision in the exact way you were designed to execute it.</p>\n\n<p>Replace comparison with steady action. Focus on serving the reader directly in front of you, and let the results follow naturally.</p>",
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'seo_title' => 'Why Limiting Beliefs Hold Dreamers Back | Achieving Vision',
                'seo_description' => 'Break free from comparison and build your vision with confidence.',
                'reading_time_min' => 4,
                'views_count' => 210,
                'likes_count' => 34,
            ]
        );
        $post2->categories()->sync([$catMindset->id, $catLimits->id]);
        $post2->tags()->sync([$tagGrowth->id]);

        $post3 = Post::firstOrCreate(
            ['slug' => 'building-your-inner-circle-for-long-term-success'],
            [
                'author_id' => $author->id,
                'title' => 'Building Your Inner Circle for Long Term Success',
                'excerpt' => 'High-value connections are built on mutual sincerity and shared commitment to building outcomes that matter.',
                'content' => "<p>When I studied leaders who built transgenerational impact, one common thread stood out. They did not do it alone. They surrounded themselves with an inner circle of high-value connections.</p>\n\n<p>Your inner circle should consist of people who want you to win. Seek out partners who challenge your thinking and keep you accountable to your highest standards.</p>\n\n<p>Nurture these relationships through generosity and honesty. True connection grows when you actively contribute to another person's journey.</p>",
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'seo_title' => 'Building Your Inner Circle | Achieving Vision',
                'seo_description' => 'How to surround yourself with high-value connections for lifelong growth.',
                'reading_time_min' => 3,
                'views_count' => 98,
                'likes_count' => 12,
            ]
        );
        $post3->categories()->sync([$catMindset->id]);
        $post3->tags()->sync([$tagGrowth->id]);

        Event::firstOrCreate(
            ['title' => 'Achieving Vision Live Masterclass'],
            [
                'description' => 'A practical 90-minute live interactive session on breaking down big decade visions into actionable daily execution blueprints.',
                'event_date' => now()->addDays(14),
                'location' => 'Online Webinar (Zoom)',
                'external_link' => 'https://achievewithoghale.com/events/masterclass',
                'is_featured' => true,
            ]
        );

        Event::firstOrCreate(
            ['title' => 'Global Dreamers Fireside Q&A'],
            [
                'description' => 'An open Q&A session with author Oghale discussing book research, overcoming obstacles, and building high-impact platforms.',
                'event_date' => now()->addDays(28),
                'location' => 'Online Broadcast',
                'external_link' => 'https://achievewithoghale.com/events/fireside',
                'is_featured' => false,
            ]
        );
    }
}
