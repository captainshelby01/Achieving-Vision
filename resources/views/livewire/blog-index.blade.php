<!-- Calm Editorial Article Archive (Inspired by Khenpo Sodargye Editorial Archive + Achieving Vision Brand Identity) -->
<div id="article-library" class="max-w-5xl mx-auto py-8 sm:py-12 scroll-mt-20">
    
    <!-- Archive Header -->
    <header class="border-b border-[#061A40]/15 pb-10 mb-10">
        <div class="inline-flex items-center gap-2 font-sans text-xs font-semibold uppercase tracking-[0.18em] text-[#2D7DD2]">
            <span class="w-2 h-2 rounded-full bg-[#EAC435]"></span>
            <span>Achieving Vision Journal</span>
        </div>
        <h1 class="mt-4 font-display text-4xl sm:text-5xl lg:text-6xl font-normal leading-[1.05] tracking-tight text-[#061A40]">
            Ideas for building and finishing meaningful work.
        </h1>
        <p class="mt-5 max-w-2xl font-sans text-base sm:text-lg leading-relaxed text-[#061A40]/75">
            Practical guides, reflections, and active research for ambitious dreamers turning big vision into finished reality.
        </p>
    </header>

    <!-- Top Featured Guide (Shown on Page 1 when no search/filters are active) -->
    @if($featuredPost && empty($search) && empty($selectedCategory))
        <section class="border-b border-[#061A40]/15 pb-12 mb-12">
            <article class="p-8 sm:p-12 bg-white border border-[#061A40]/10 rounded-[8px] space-y-6 shadow-sm group hover:border-[#2D7DD2]/40 transition-colors">
                <div class="flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2 font-sans font-semibold uppercase tracking-[0.14em] text-[#2D7DD2]">
                        <span class="w-2 h-2 rounded-full bg-[#EAC435]"></span>
                        <span>Featured Guide</span>
                        @if($featuredPost->categories->first())
                            <span>&bull;</span>
                            <span>{{ $featuredPost->categories->first()->name }}</span>
                        @endif
                    </div>
                    <span class="font-sans text-[#061A40]/55">{{ $featuredPost->reading_time_min ?? 4 }} min read</span>
                </div>
                
                <h2 class="font-display font-normal text-3xl sm:text-4xl lg:text-5xl text-[#061A40] leading-tight group-hover:text-[#2D7DD2] transition-colors">
                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40]">
                        {{ $featuredPost->title }}
                    </a>
                </h2>
                
                <p class="font-sans text-base sm:text-lg text-[#061A40]/75 leading-relaxed max-w-3xl">
                    {{ $featuredPost->excerpt }}
                </p>

                <div class="pt-4 border-t border-[#061A40]/10 flex items-center justify-between text-xs text-[#061A40]/60">
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-[#061A40]">By {{ $featuredPost->author?->name ?? 'Oghale' }}</span>
                        <span>&bull;</span>
                        <span>{{ $featuredPost->published_at?->format('M d, Y') ?? 'Recent' }}</span>
                    </div>
                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="font-sans font-semibold text-xs uppercase tracking-[0.14em] text-[#2D7DD2] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        <span>Read Featured Guide</span>
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </article>
        </section>
    @endif

    <!-- Category Tabs & Search Controls Band -->
    <div class="space-y-6 mb-10">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-6 border-b border-[#061A40]/10">
            
            <!-- Category Navigation Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none -mx-4 px-4 sm:mx-0 sm:px-0">
                <button
                    wire:click="clearCategory"
                    aria-pressed="{{ empty($selectedCategory) ? 'true' : 'false' }}"
                    class="px-4 py-2 text-xs font-semibold rounded-[8px] transition-colors whitespace-nowrap flex items-center gap-1.5 flex-shrink-0 {{ empty($selectedCategory) ? 'bg-[#061A40] text-white shadow-sm' : 'bg-white border border-[#061A40]/15 text-[#061A40]/70 hover:bg-[#FBF9F4]' }}"
                >
                    <span>All Articles</span>
                    <span class="opacity-70">({{ $totalPublishedPosts }})</span>
                </button>

                @foreach($categories as $category)
                    <button
                        wire:click="selectCategory('{{ $category->slug }}')"
                        aria-pressed="{{ $selectedCategory === $category->slug ? 'true' : 'false' }}"
                        class="px-4 py-2 text-xs font-semibold rounded-[8px] transition-colors whitespace-nowrap flex items-center gap-1.5 flex-shrink-0 {{ $selectedCategory === $category->slug ? 'bg-[#061A40] text-white shadow-sm' : 'bg-white border border-[#061A40]/15 text-[#061A40]/70 hover:bg-[#FBF9F4]' }}"
                    >
                        <span>{{ $category->name }}</span>
                        <span class="opacity-70">({{ $category->posts_count }})</span>
                    </button>
                @endforeach
            </div>

            <!-- Search Field -->
            <div class="relative min-w-[260px] sm:min-w-[320px]">
                <label for="article-search" class="sr-only">Search articles by keyword</label>
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#061A40]/40">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input
                    id="article-search"
                    type="search"
                    autocomplete="off"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search articles & guides..."
                    class="w-full pl-9 pr-4 py-2.5 rounded-[8px] border border-[#061A40]/20 bg-white text-xs sm:text-sm text-[#061A40] placeholder:text-[#061A40]/40 focus:outline-none focus:border-[#2D7DD2] focus:ring-2 focus:ring-[#2D7DD2]/20 transition-colors shadow-sm"
                />
            </div>
        </div>

        <!-- Metric & Active Filter Chips Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 text-xs">
            <div class="font-sans text-[#061A40]/70 font-medium">
                @if($posts->total() > 0)
                    Showing {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }} {{ Str::plural('article', $posts->total()) }}
                @else
                    No articles found
                @endif
            </div>

            @if(!empty($selectedCategory) || !empty($search))
                <div class="flex items-center gap-2 flex-wrap text-xs">
                    <span class="font-semibold text-[#061A40]/70">Active Filters:</span>
                    @if(!empty($selectedCategory))
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-[6px] bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold">
                            <span>Category: {{ $categories->firstWhere('slug', $selectedCategory)?->name }}</span>
                            <button wire:click="clearCategory" aria-label="Remove category filter" class="hover:text-[#061A40]">&times;</button>
                        </span>
                    @endif

                    @if(!empty($search))
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-[6px] bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold">
                            <span>Search: "{{ $search }}"</span>
                            <button wire:click="clearSearch" aria-label="Clear search" class="hover:text-[#061A40]">&times;</button>
                        </span>
                    @endif

                    <button wire:click="clearFilters" class="text-[#2D7DD2] underline font-semibold hover:text-[#061A40] ml-2">
                        Clear all
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Editorial Article Rows List -->
    <div wire:loading.class="opacity-50" wire:target="search,selectCategory,clearFilters,clearCategory" class="divide-y divide-[#061A40]/10 transition-opacity">
        @forelse($posts as $post)
            <article class="group py-8 sm:py-10 first:pt-0">
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 sm:gap-8 items-start">
                    
                    <!-- Left: Published Date & Reading Time -->
                    <div class="sm:col-span-3 font-sans text-xs uppercase tracking-[0.12em] text-[#061A40]/55 space-y-1">
                        <time datetime="{{ $post->published_at?->toDateString() }}" class="block font-medium text-[#061A40]/80">
                            {{ $post->published_at?->format('M d, Y') ?? 'Recent' }}
                        </time>
                        <p class="text-[11px]">
                            {{ $post->reading_time_min ?? 3 }} min read
                        </p>
                    </div>

                    <!-- Center: Categories, Fraunces Title, Excerpt -->
                    <div class="sm:col-span-8 space-y-2.5">
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->categories as $category)
                                <span class="font-sans text-xs font-semibold uppercase tracking-[0.12em] text-[#2D7DD2]">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>

                        <h2 class="font-display font-normal text-2xl sm:text-3xl text-[#061A40] leading-snug">
                            <a href="{{ route('blog.show', $post->slug) }}" class="transition-colors group-hover:text-[#2D7DD2] focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40]">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="font-sans text-sm sm:text-base leading-relaxed text-[#061A40]/75 max-w-2xl">
                            {{ $post->excerpt }}
                        </p>
                    </div>

                    <!-- Right: Directional Link Arrow -->
                    <div class="sm:col-span-1 hidden sm:flex justify-end pt-1">
                        <a href="{{ route('blog.show', $post->slug) }}" aria-hidden="true" class="font-sans text-sm font-semibold text-[#2D7DD2] group-hover:translate-x-1 transition-transform">
                            &rarr;
                        </a>
                    </div>

                </div>
            </article>
        @empty
            <div class="py-16 text-center space-y-4">
                <p class="font-display italic text-2xl text-[#061A40]">No articles found matching your criteria.</p>
                <p class="font-sans text-sm text-[#061A40]/70 max-w-md mx-auto">Try clearing your active filters or searching for different keywords.</p>
                <div class="pt-2">
                    <button wire:click="clearFilters" class="btn-primary text-xs py-2 px-5">
                        Clear Filters & View All
                    </button>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
        <nav aria-label="Article pagination" class="pt-10 border-t border-[#061A40]/10 mt-10">
            {{ $posts->links() }}
        </nav>
    @endif

</div>
