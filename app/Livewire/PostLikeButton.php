<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostLikeButton extends Component
{
    public Post $post;
    public int $likesCount = 0;
    public bool $hasLiked = false;

    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->likesCount = $post->likes_count;
    }

    public function toggleLike(): void
    {
        if ($this->hasLiked) {
            $this->post->decrement('likes_count');
            $this->likesCount = max(0, $this->likesCount - 1);
            $this->hasLiked = false;
        } else {
            $this->post->increment('likes_count');
            $this->likesCount += 1;
            $this->hasLiked = true;
        }
    }

    public function render()
    {
        return view('livewire.post-like-button');
    }
}
