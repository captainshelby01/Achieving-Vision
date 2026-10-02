<!-- Calm Editorial Article Archive (Inspired by Khenpo Sodargye Editorial Archive + Achieving Vision Brand Identity) -->
<div id="article-library" class="max-w-6xl mx-auto py-6 sm:py-10 scroll-mt-20">
    
    <!-- Archive Header -->
    <header class="border-b border-[#061A40]/15 pb-8 mb-8">
        <div class="inline-flex items-center gap-2 font-sans text-xs font-semibold uppercase tracking-[0.18em] text-[#2D7DD2]">
            <span class="w-2 h-2 rounded-full bg-[#82FF9E] ring-2 ring-[#061A40]/10"></span>
            <span>Achieving Vision Journal &bull; Library</span>
        </div>
        <h1 class="mt-3 font-display text-3xl sm:text-4xl lg:text-5xl font-normal leading-[1.08] tracking-tight text-[#061A40]">
            Ideas for building and finishing meaningful work.
        </h1>
        <p class="mt-3 max-w-2xl font-sans text-sm sm:text-base leading-relaxed text-[#061A40]/75">
            Practical guides, reflections, and active research for ambitious dreamers turning big vision into finished reality.
        </p>
    </header>

    <!-- Top Filter Pill Buttons & Search Controls Band (Both Top Filters & Category Browsing) -->
    <div class="space-y-4 mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-5 border-b border-[#061A40]/10">
            
            <!-- Horizontal Category Filter Pills -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none -mx-4 px-4 sm:mx-0 sm:px-0">
                <button
                    type="button"
                    wire:click="clearCategory"
                    aria-pressed="{{ empty($selectedCategory) ? 'true' : 'false' }}"
                    class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition-all whitespace-nowrap flex items-center gap-1.5 flex-shrink-0 cursor-pointer {{ empty($selectedCategory) ? 'bg-[#061A40] text-white shadow-xs' : 'bg-white border border-[#061A40]/20 text-[#061A40]/75 hover:border-[#2D7DD2] hover:text-[#2D7DD2]' }}"
                >
                    <span>All Articles</span>
                    <span class="opacity-70 text-[11px]">({{ $totalPublishedPosts }})</span>
                </button>

                @foreach($categories as $category)
                    <button
                        type="button"
                        wire:click="selectCategory('{{ $category->slug }}')"
                        aria-pressed="{{ $selectedCategory === $category->slug ? 'true' : 'false' }}"
                        class="px-3.5 py-1.5 text-xs font-semibold rounded-full transition-all whitespace-nowrap flex items-center gap-1.5 flex-shrink-0 cursor-pointer {{ $selectedCategory === $category->slug ? 'bg-[#061A40] text-white shadow-xs' : 'bg-white border border-[#061A40]/20 text-[#061A40]/75 hover:border-[#2D7DD2] hover:text-[#2D7DD2]' }}"
                    >
                        <span>{{ $category->name }}</span>
                        <span class="opacity-70 text-[11px]">({{ $category->posts_count }})</span>
                    </button>
                @endforeach
            </div>

            <!-- Search Field -->
            <div class="relative min-w-[240px] sm:min-w-[280px]">
                <label for="article-search" class="sr-only">Search articles by keyword</label>
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#061A40]/40">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-search w-3.5 h-3.5" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
                <input
                    id="article-search"
                    type="search"
                    autocomplete="off"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search articles..."
                    class="w-full pl-8 pr-3 py-1.5 rounded-full border border-[#061A40]/20 bg-white text-xs sm:text-sm text-[#061A40] placeholder:text-[#061A40]/45 focus:outline-none focus:border-[#2D7DD2] focus:ring-2 focus:ring-[#2D7DD2]/20 transition-colors shadow-xs"
                />
            </div>
        </div>

        <!-- Metric & Active Filter Chips Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
            <div class="font-sans text-[#061A40]/70 font-medium">
                @if($posts->total() > 0)
                    Showing {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }} {{ Str::plural('article', $posts->total()) }}
                    @if(!empty($selectedCategory))
                        in <span class="font-semibold text-[#061A40]">{{ $categories->firstWhere('slug', $selectedCategory)?->name }}</span>
                    @endif
                @else
                    No articles found
                @endif
            </div>

            @if(!empty($selectedCategory) || !empty($search))
                <div class="flex items-center gap-2 flex-wrap text-xs">
                    <span class="font-semibold text-[#061A40]/60 text-[11px] uppercase tracking-wider">Filtered by:</span>
                    @if(!empty($selectedCategory))
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold text-xs border border-[#2D7DD2]/25">
                            <span>Category: {{ $categories->firstWhere('slug', $selectedCategory)?->name }}</span>
                            <button type="button" wire:click="clearCategory" aria-label="Remove category filter" class="hover:text-[#061A40] cursor-pointer">&times;</button>
                        </span>
                    @endif

                    @if(!empty($search))
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold text-xs border border-[#2D7DD2]/25">
                            <span>Search: "{{ $search }}"</span>
                            <button type="button" wire:click="clearSearch" aria-label="Clear search" class="hover:text-[#061A40] cursor-pointer">&times;</button>
                        </span>
                    @endif

                    <button type="button" wire:click="clearFilters" class="text-[#2D7DD2] underline font-semibold hover:text-[#061A40] ml-1 cursor-pointer">
                        Clear all
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Main Content Grid (Khenpo Sodargye Layout: Category Sidebar + Compact Article Rows) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
        
        <!-- Left Sidebar: Category Directory Navigation (Matching Khenpo Sodargye reference) -->
        <aside class="hidden lg:block lg:col-span-4 sticky top-24 space-y-6">
            <div class="p-5 bg-white border border-[#061A40]/10 rounded-[8px] space-y-4 shadow-sm">
                
                <div>
                    <h3 class="font-display font-medium text-lg text-[#061A40]">
                        @if(!empty($selectedCategory))
                            {{ $categories->firstWhere('slug', $selectedCategory)?->name }}
                        @else
                            All Topics &amp; Categories
                        @endif
                    </h3>
                    <p class="font-sans text-xs text-[#061A40]/60 mt-1">
                        Select any category to browse all focused articles.
                    </p>
                </div>

                <div class="pt-3 border-t border-[#061A40]/10 space-y-1">
                    <!-- All Articles Row -->
                    <button
                        type="button"
                        wire:click="clearCategory"
                        class="w-full flex items-center justify-between py-2 px-2.5 rounded-[6px] text-xs font-sans transition-colors cursor-pointer {{ empty($selectedCategory) ? 'bg-[#061A40] text-white font-semibold' : 'text-[#061A40]/75 hover:bg-slate-50 hover:text-[#061A40]' }}"
                    >
                        <span>All Articles</span>
                        <span class="font-mono text-[11px] opacity-70">{{ $totalPublishedPosts }}</span>
                    </button>

                    <!-- Individual Category Rows -->
                    @foreach($categories as $category)
                        <button
                            type="button"
                            wire:click="selectCategory('{{ $category->slug }}')"
                            class="w-full flex items-center justify-between py-2 px-2.5 rounded-[6px] text-xs font-sans transition-colors cursor-pointer {{ $selectedCategory === $category->slug ? 'bg-[#061A40] text-white font-semibold' : 'text-[#061A40]/75 hover:bg-slate-50 hover:text-[#061A40]' }}"
                        >
                            <span>{{ $category->name }}</span>
                            <span class="font-mono text-[11px] opacity-70">{{ $category->posts_count }}</span>
                        </button>
                    @endforeach
                </div>

            </div>

            <!-- Author Stance Pill Box -->
            <div class="p-4 bg-slate-50 border border-[#061A40]/10 rounded-[8px] space-y-2">
                <span class="text-[10px] font-mono uppercase tracking-widest text-[#2D7DD2] font-semibold block">
                    // NOTE FROM OGHALE
                </span>
                <p class="font-display italic text-xs text-[#061A40]/80 leading-snug">
                    "Longing for the reader's transformation is expressed through practicality, not sentiment."
                </p>
            </div>
        </aside>

        <!-- Right Column: Compact Article Listing (Matching Khenpo Sodargye scannable list) -->
        <main class="lg:col-span-8">
            <div wire:loading.class="opacity-50" wire:target="search,selectCategory,clearFilters,clearCategory" class="divide-y divide-[#061A40]/10 transition-opacity">
                @forelse($posts as $post)
                    <article class="group py-4 sm:py-5 first:pt-0 hover:bg-slate-50/70 -mx-3 px-3 rounded-[6px] transition-colors">
                        <div class="flex flex-col sm:flex-row sm:items-baseline sm:justify-between gap-1.5 sm:gap-4">
                            
                            <!-- Article Headline & Clickable Category Label (Matching Khenpo Sodargye) -->
                            <div class="space-y-1.5 flex-1 min-w-0">
                                
                                <h2 class="font-display font-medium text-lg sm:text-xl text-[#061A40] leading-snug group-hover:text-[#2D7DD2] transition-colors">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40]">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <!-- Category Label (Clickable Browsing/Filtering) + Inline Metadata -->
                                <div class="flex items-center gap-2 flex-wrap text-xs">
                                    @if($post->categories->count() > 0)
                                        @foreach($post->categories as $cat)
                                            <button
                                                type="button"
                                                wire:click.prevent="selectCategory('{{ $cat->slug }}')"
                                                title="Filter articles by {{ $cat->name }}"
                                                class="font-sans font-semibold text-xs text-[#2D7DD2] hover:text-[#061A40] hover:underline cursor-pointer transition-colors focus:outline-none"
                                            >
                                                {{ $cat->name }}
                                            </button>
                                            @if(!$loop->last)
                                                <span class="text-[#061A40]/30">&bull;</span>
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="text-xs text-[#2D7DD2] font-semibold">General Guide</span>
                                    @endif

                                    <span class="text-[#061A40]/30">&bull;</span>
                                    <time datetime="{{ $post->published_at?->toDateString() }}" class="text-[11px] font-mono text-[#061A40]/55">
                                        {{ $post->published_at?->format('M d, Y') ?? 'Recent' }}
                                    </time>
                                    <span class="text-[#061A40]/30">&bull;</span>
                                    <span class="text-[11px] font-mono text-[#061A40]/55">
                                        {{ $post->reading_time_min ?? 3 }} min read
                                    </span>
                                </div>

                                <!-- Ultra-compact 1-line snippet for scannability without height bloat -->
                                @if($post->excerpt)
                                    <p class="font-sans text-xs text-[#061A40]/65 line-clamp-1 leading-normal pt-0.5">
                                        {{ $post->excerpt }}
                                    </p>
                                @endif

                            </div>

                            <!-- Right Arrow on Hover -->
                            <div class="hidden sm:flex items-center self-center flex-shrink-0 text-xs font-mono text-[#2D7DD2] opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all pl-2">
                                <span>Read &rarr;</span>
                            </div>

                        </div>
                    </article>
                @empty
                    <div class="py-14 text-center space-y-4 bg-slate-50/50 rounded-[8px] border border-dashed border-[#061A40]/15 p-8">
                        <p class="font-display italic text-xl text-[#061A40]">No articles found matching your criteria.</p>
                        <p class="font-sans text-xs sm:text-sm text-[#061A40]/70 max-w-md mx-auto">Try clearing your category filter or searching for different keywords.</p>
                        <div class="pt-2">
                            <button type="button" wire:click="clearFilters" class="btn-primary text-xs py-2 px-5 cursor-pointer">
                                Clear Filters &amp; View All
                            </button>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <nav aria-label="Article pagination" class="pt-8 border-t border-[#061A40]/10 mt-8">
                    {{ $posts->links() }}
                </nav>
            @endif
        </main>

    </div>

</div>
