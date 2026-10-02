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

    public function mount(): void
    {
        if (request()->has('category') && empty($this->selectedCategory)) {
            $this->selectedCategory = (string) request()->query('category');
        }
        if (request()->has('selectedCategory') && empty($this->selectedCategory)) {
            $this->selectedCategory = (string) request()->query('selectedCategory');
        }
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function selectCategory(string $slug): void
    {
        $this->selectedCategory = $this->selectedCategory === $slug ? '' : $slug;
        $this->resetPage();
    }

    public function clearCategory(): void
    {
        $this->selectedCategory = '';
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'selectedCategory']);
        $this->resetPage();
    }

    public function render()
    {
        $totalPublishedPosts = Post::query()->published()->count();

        $categories = Category::query()
            ->withCount(['posts' => function ($query) {
                $query->published();
            }])
            ->orderBy('id')
            ->get();

        $postsQuery = Post::query()->published()->with(['categories', 'tags', 'author']);

        if (filled($this->search)) {
            $term = '%' . trim($this->search) . '%';
            $postsQuery->where(function ($query) use ($term) {
                $query->where('title', 'like', $term)
                      ->orWhere('excerpt', 'like', $term);
            });
        }

        if (filled($this->selectedCategory)) {
            $postsQuery->whereHas('categories', function ($query) {
                $query->where('slug', $this->selectedCategory);
            });
        }

        $posts = $postsQuery->orderBy('published_at', 'desc')->paginate(15);

        return view('livewire.blog-index', [
            'posts' => $posts,
            'categories' => $categories,
            'totalPublishedPosts' => $totalPublishedPosts,
        ]);
    }
}
