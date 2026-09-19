<?php

namespace Tests\Feature;

use App\Livewire\CommentSection;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ArticlePageTest extends TestCase
{
    use RefreshDatabase;

    protected Post $post;
    protected User $author;

    protected function setUp(): void
    {
        parent::setUp();

        $this->author = User::factory()->create([
            'name' => 'Oghale',
            'email' => 'oghale@example.com',
        ]);

        $category = Category::create([
            'name' => 'Execution & Systems',
            'slug' => 'execution-systems',
        ]);

        $this->post = Post::create([
            'author_id' => $this->author->id,
            'title' => 'The Art of Finishing What You Start',
            'slug' => 'the-art-of-finishing-what-you-start',
            'excerpt' => 'A practical framework for finishing what you start.',
            'content' => '<p>Three years ago, I started with unfinished notebooks. Here is how to complete what you build.</p>',
            'status' => 'published',
            'published_at' => now()->subDay(),
            'reading_time_min' => 3,
        ]);

        $this->post->categories()->attach($category);
    }

    public function test_it_renders_the_individual_article_page_successfully(): void
    {
        $response = $this->get('/blog/' . $this->post->slug);

        $response->assertStatus(200)
                 ->assertSee('The Art of Finishing What You Start')
                 ->assertSee('Execution & Systems')
                 ->assertSee('Written by Oghale')
                 ->assertSee('Join the Conversation')
                 ->assertSee('Advertisement');
    }

    public function test_it_allows_visitors_to_submit_a_comment_for_moderation(): void
    {
        Livewire::test(CommentSection::class, ['post' => $this->post])
            ->set('author_name', 'Grace Okon')
            ->set('author_email', 'grace@example.com')
            ->set('content', 'This guide really helped me change how I approach daily tasks.')
            ->call('submitComment')
            ->assertSet('submitted', true)
            ->assertHasNoErrors();

        $this->assertDatabaseHas('comments', [
            'post_id' => $this->post->id,
            'author_name' => 'Grace Okon',
            'author_email' => 'grace@example.com',
            'status' => 'pending',
        ]);
    }

    public function test_it_rejects_comments_with_em_dashes_due_to_brand_rules(): void
    {
        Livewire::test(CommentSection::class, ['post' => $this->post])
            ->set('author_name', 'Grace Okon')
            ->set('author_email', 'grace@example.com')
            ->set('content', 'This is a great thought — with an em dash.')
            ->call('submitComment')
            ->assertHasErrors(['content']);

        $this->assertDatabaseMissing('comments', [
            'author_name' => 'Grace Okon',
            'content' => 'This is a great thought — with an em dash.',
        ]);
    }
}
