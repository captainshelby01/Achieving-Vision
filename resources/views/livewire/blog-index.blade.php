<!-- Article Library & Livewire Search Section -->
<div id="article-library" class="space-y-8 scroll-mt-24">
    
    <!-- Header with Result Count & Search -->
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-[#E5DFC9]">
            <div>
                <div class="flex items-center gap-3">
                    <h2 class="font-display font-semibold text-2xl sm:text-3xl text-[#061A40]">
                        Article Library
                    </h2>
                    
                    <!-- Result Count Badge -->
                    <span class="px-3 py-1 rounded-full bg-[#061A40]/10 text-[#061A40] text-xs font-semibold">
                        Showing {{ $posts->total() }} {{ Str::plural('article', $posts->total()) }}
                    </span>

                    <!-- Livewire Loading State -->
                    <span wire:loading class="text-xs text-[#2D7DD2] font-semibold animate-pulse">
                        Updating...
                    </span>
                </div>
                <p class="font-sans text-sm text-[#061A40]/70 mt-1">
                    Search and filter by topic to find practical guides and study notes.
                </p>
            </div>

            <!-- Accessible Search Input -->
            <div class="relative min-w-[280px] sm:min-w-[340px]">
                <label for="article-search" class="sr-only">Search articles by keyword</label>
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#061A40]/40">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input 
                    id="article-search"
                    type="search" 
                    wire:model.live.debounce.300ms="search" 
                    placeholder="Search articles by keyword..." 
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-[#E5DFC9] rounded-xl text-sm text-[#061A40] placeholder-[#061A40]/40 focus:outline-none focus:ring-2 focus:ring-[#EAC435] focus:border-transparent transition-all shadow-sm"
                />
            </div>
        </div>

        <!-- Accessible Category Pills Bar with Scroll Gradient Hint -->
        <div class="relative">
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none -mx-4 px-4 sm:mx-0 sm:px-0">
                <button 
                    wire:click="clearFilters" 
                    aria-pressed="{{ empty($selectedCategory) && empty($search) ? 'true' : 'false' }}"
                    class="px-4 py-2 text-xs font-semibold rounded-full transition-all whitespace-nowrap flex items-center gap-2 flex-shrink-0 {{ empty($selectedCategory) ? 'bg-[#EAC435] text-[#061A40] shadow-sm' : 'bg-white border border-[#E5DFC9] text-[#061A40]/80 hover:bg-[#F5F1E8]' }}"
                >
                    <span>All Categories</span>
                </button>

                @foreach($categories as $category)
                    <button 
                        wire:click="selectCategory('{{ $category->slug }}')" 
                        aria-pressed="{{ $selectedCategory === $category->slug ? 'true' : 'false' }}"
                        class="px-4 py-2 text-xs font-semibold rounded-full transition-all whitespace-nowrap flex items-center gap-2 flex-shrink-0 {{ $selectedCategory === $category->slug ? 'bg-[#EAC435] text-[#061A40] shadow-sm' : 'bg-white border border-[#E5DFC9] text-[#061A40]/80 hover:bg-[#F5F1E8]' }}"
                    >
                        <span>{{ $category->name }}</span>
                        <span class="px-2 py-0.5 text-[10px] rounded-full {{ $selectedCategory === $category->slug ? 'bg-[#061A40] text-white' : 'bg-[#061A40]/10 text-[#061A40]' }}">
                            {{ $category->posts_count }}
                        </span>
                    </button>
                @endforeach
            </div>

            <!-- Active Filter Chips Bar -->
            @if(!empty($selectedCategory) || !empty($search))
                <div class="pt-3 flex items-center gap-2 text-xs text-[#061A40]/70">
                    <span class="font-semibold">Active Filters:</span>
                    @if(!empty($selectedCategory))
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold">
                            Category: {{ $categories->firstWhere('slug', $selectedCategory)?->name }}
                            <button wire:click="selectCategory('')" class="hover:text-[#061A40]">&times;</button>
                        </span>
                    @endif

                    @if(!empty($search))
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold">
                            Search: "{{ $search }}"
                            <button wire:click="$set('search', '')" class="hover:text-[#061A40]">&times;</button>
                        </span>
                    @endif

                    <button wire:click="clearFilters" class="text-xs text-[#2D7DD2] font-semibold underline hover:text-[#061A40] ml-2">
                        Clear all
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Article Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <article class="bg-white border border-[#E5DFC9] rounded-2xl overflow-hidden shadow-sm hover:shadow-md hover:border-[#2D7DD2]/40 transition-all flex flex-col justify-between group">
                
                <!-- Card Header Image Container Placeholder -->
                <div class="bg-[#061A40] h-40 p-5 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(#EAC435_1px,transparent_1px)] [background-size:16px_16px] opacity-15"></div>
                    
                    <div class="relative z-10 flex items-center justify-between">
                        <span class="badge-type bg-[#EAC435] text-[#061A40]">
                            {{ $post->categories->first()?->name ?? 'PRACTICAL GUIDE' }}
                        </span>

                        <span class="inline-flex items-center gap-1 text-[11px] text-white/80 font-medium bg-white/10 px-2.5 py-0.5 rounded-full backdrop-blur-sm">
                            <svg class="w-3 h-3 text-[#EAC435]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $post->reading_time_min ?? 3 }} MIN READ</span>
                        </span>
                    </div>

                    <div class="relative z-10">
                        <span class="font-display italic text-sm text-white/90 line-clamp-1">
                            {{ $post->title }}
                        </span>
                    </div>
                </div>

                <!-- Card Content Body -->
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div class="space-y-3">
                        <h3 class="font-display font-semibold text-xl text-[#061A40] group-hover:text-[#2D7DD2] transition-colors leading-snug">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <p class="font-sans text-sm text-[#061A40]/75 leading-relaxed line-clamp-3">
                            {{ $post->excerpt }}
                        </p>
                    </div>

                    <!-- Card Footer -->
                    <div class="pt-4 border-t border-[#E5DFC9]/60 flex items-center justify-between text-xs text-[#061A40]/60">
                        <span>{{ $post->published_at?->format('M d, Y') ?? 'Recent' }}</span>
                        
                        <a href="{{ route('blog.show', $post->slug) }}" class="font-semibold text-[#2D7DD2] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                            <span>Read article</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </div>

            </article>
        @empty
            <div class="col-span-full bg-white border border-[#E5DFC9] rounded-2xl p-12 text-center">
                <div class="w-12 h-12 rounded-full bg-[#EAC435]/20 text-[#061A40] flex items-center justify-center mx-auto mb-4 font-display font-bold text-xl">!</div>
                <h4 class="font-display font-semibold text-lg text-[#061A40] mb-2">No Articles Found</h4>
                <p class="text-sm text-[#061A40]/70 max-w-md mx-auto mb-6">We couldn't find any published articles matching your current filter criteria.</p>
                
                <!-- Fixed Single wire:click clearFilters Button -->
                <button wire:click="clearFilters" class="btn-primary text-xs py-2 px-5">
                    Clear Filters & Reset
                </button>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
        <div class="pt-6">
            {{ $posts->links() }}
        </div>
    @endif

</div>
