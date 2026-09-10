<div>
    <!-- Livewire Blog Index Component -->
    <div class="search-and-filter-bar mb-6">
        <input type="text" wire:model.live="search" placeholder="Search articles..." class="px-4 py-2 border rounded-md w-full max-w-md">
        
        <div class="categories-pills flex flex-wrap gap-2 mt-4">
            @foreach($categories as $category)
                <button wire:click="selectCategory('{{ $category->slug }}')" class="px-3 py-1 text-sm rounded-full {{ $selectedCategory === $category->slug ? 'bg-amber-400 text-slate-900' : 'bg-slate-100 text-slate-700' }}">
                    {{ $category->name }} ({{ $category->posts_count }})
                </button>
            @endforeach
        </div>
    </div>

    <div class="posts-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
            <div class="post-card border p-4 rounded-lg shadow-sm">
                <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                <p class="text-sm text-slate-600 mb-4">{{ $post->excerpt }}</p>
                <div class="flex justify-between items-center text-xs text-slate-500">
                    <span>{{ $post->reading_time_min }} min read</span>
                    <span>{{ $post->published_at?->format('M d, Y') }}</span>
                </div>
            </div>
        @empty
            <p class="col-span-full text-slate-500 text-center py-8">No articles found matching your query.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
