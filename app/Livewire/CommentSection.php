<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Rules\NoEmDashesRule;
use Livewire\Component;

class CommentSection extends Component
{
    public Post $post;
    public string $author_name = '';
    public string $author_email = '';
    public string $content = '';
    public bool $submitted = false;

    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    public function submitComment(): void
    {
        $this->validate([
            'author_name' => ['required', 'string', 'max:100', new NoEmDashesRule()],
            'author_email' => ['required', 'email', 'max:255'],
            'content' => ['required', 'string', 'min:5', 'max:2000', new NoEmDashesRule()],
        ]);

        Comment::create([
            'post_id' => $this->post->id,
            'author_name' => $this->author_name,
            'author_email' => $this->author_email,
            'content' => $this->content,
            'status' => 'pending',
        ]);

        $this->submitted = true;
        $this->reset(['author_name', 'author_email', 'content']);
    }

    public function render()
    {
        $approvedComments = $this->post->comments()
            ->approved()
            ->latest()
            ->get();

        return view('livewire.comment-section', [
            'comments' => $approvedComments,
        ]);
    }
}
