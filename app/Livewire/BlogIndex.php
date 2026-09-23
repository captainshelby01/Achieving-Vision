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
            ->whereHas('posts', function ($query) {
                $query->published();
            })
            ->withCount(['posts' => function ($query) {
                $query->published();
            }])
            ->orderBy('name')
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

        // Feature the newest article if not searching or filtering by category on page 1
        $featuredPost = null;
        if (empty($this->search) && empty($this->selectedCategory) && $this->getPage() === 1) {
            $featuredPost = Post::query()->published()->with(['categories', 'author'])->orderBy('published_at', 'desc')->first();
        }

        $posts = $postsQuery->orderBy('published_at', 'desc')->paginate(10);

        return view('livewire.blog-index', [
            'posts' => $posts,
            'categories' => $categories,
            'featuredPost' => $featuredPost,
            'totalPublishedPosts' => $totalPublishedPosts,
        ]);
    }
}
