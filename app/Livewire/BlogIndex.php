<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public string $search = '';
    public string $selectedCategory = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function selectCategory(string $slug): void
    {
        $this->selectedCategory = $this->selectedCategory === $slug ? '' : $slug;
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'selectedCategory']);
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::withCount(['posts' => function ($query) {
            $query->published();
        }])->get();

        $postsQuery = Post::query()->published()->with(['categories', 'tags', 'author']);

        if (!empty($this->search)) {
            $postsQuery->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->selectedCategory)) {
            $postsQuery->whereHas('categories', function ($query) {
                $query->where('slug', $this->selectedCategory);
            });
        }

        $posts = $postsQuery->orderBy('published_at', 'desc')->paginate(9);

        return view('livewire.blog-index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
}
