<!-- Section 2: Blog Directory & Category Grid (Inspired by Khenpo Sodargye Inspiration) -->
<div class="space-y-12">
    
    <!-- Inspirational Quote Banner (Ref: Khenpo Sodargye Quote Header) -->
    <div class="bg-[#F5F1E8] border border-[#E5DFC9] rounded-2xl p-8 sm:p-10 text-center max-w-4xl mx-auto shadow-sm relative overflow-hidden">
        <div class="absolute -top-6 -left-6 text-[#061A40]/5 font-display text-8xl font-bold select-none">&ldquo;</div>
        <blockquote class="font-display italic text-xl sm:text-2xl text-[#061A40] leading-relaxed mb-4 relative z-10">
            "Lacking wisdom, concentration fails. Without concentration, wisdom also cannot be found. But for someone who has both, vision becomes finished reality."
        </blockquote>
        <div class="inline-flex items-center gap-2 text-xs font-sans font-semibold tracking-widest text-[#2D7DD2] uppercase relative z-10">
            <span class="w-1.5 h-1.5 rounded-full bg-[#2D7DD2]"></span>
            Foundational Principle &bull; Achieving Vision Study Notes
        </div>
    </div>

    <!-- Filter & Search Controls Header -->
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-[#E5DFC9]">
            <div>
                <h2 class="font-display font-semibold text-2xl sm:text-3xl text-[#061A40]">
                    Published Articles & Study Library
                </h2>
                <p class="font-sans text-sm text-[#061A40]/70 mt-1">
                    Explore practical insights, research, and execution guides.
                </p>
            </div>

            <!-- Real-Time Search Bar -->
            <div class="relative min-w-[280px] sm:min-w-[320px]">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#061A40]/40">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="search" 
                    placeholder="Search articles by keyword..." 
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-[#E5DFC9] rounded-xl text-sm text-[#061A40] placeholder-[#061A40]/40 focus:outline-none focus:ring-2 focus:ring-[#EAC435] focus:border-transparent transition-all shadow-sm"
                />
            </div>
        </div>

        <!-- Horizontal Category Pills Filter Bar (with Post Count Badges) -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
            <button 
                wire:click="selectCategory('')" 
                class="px-4 py-2 text-xs font-semibold rounded-full transition-all whitespace-nowrap flex items-center gap-2 {{ empty($selectedCategory) ? 'bg-[#EAC435] text-[#061A40] shadow-sm' : 'bg-white border border-[#E5DFC9] text-[#061A40]/80 hover:bg-[#F5F1E8]' }}"
            >
                <span>All Categories</span>
            </button>

            @foreach($categories as $category)
                <button 
                    wire:click="selectCategory('{{ $category->slug }}')" 
                    class="px-4 py-2 text-xs font-semibold rounded-full transition-all whitespace-nowrap flex items-center gap-2 {{ $selectedCategory === $category->slug ? 'bg-[#EAC435] text-[#061A40] shadow-sm' : 'bg-white border border-[#E5DFC9] text-[#061A40]/80 hover:bg-[#F5F1E8]' }}"
                >
                    <span>{{ $category->name }}</span>
                    <span class="px-2 py-0.5 text-[10px] rounded-full {{ $selectedCategory === $category->slug ? 'bg-[#061A40] text-white' : 'bg-[#061A40]/10 text-[#061A40]' }}">
                        {{ $category->posts_count }}
                    </span>
                </button>
            @endforeach
        </div>
    </div>

    <!-- Article Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <article class="bg-white border border-[#E5DFC9] rounded-2xl p-6 sm:p-7 shadow-sm hover:shadow-md hover:border-[#2D7DD2]/40 transition-all flex flex-col justify-between group">
                <div class="space-y-4">
                    
                    <!-- Card Top Meta Bar -->
                    <div class="flex items-center justify-between gap-2 text-xs">
                        @if($post->categories->first())
                            <span class="px-3 py-1 rounded-full bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold text-[11px] tracking-wide">
                                {{ $post->categories->first()->name }}
                            </span>
                        @endif
                        <span class="text-[#061A40]/50 font-medium">
                            {{ $post->reading_time_min ?? 3 }} min read
                        </span>
                    </div>

                    <!-- Article Title -->
                    <h3 class="font-display font-semibold text-xl text-[#061A40] group-hover:text-[#2D7DD2] transition-colors leading-snug">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h3>

                    <!-- Article Excerpt -->
                    <p class="font-sans text-sm text-[#061A40]/75 leading-relaxed line-clamp-3">
                        {{ $post->excerpt }}
                    </p>
                </div>

                <!-- Card Footer -->
                <div class="pt-6 mt-6 border-t border-[#E5DFC9]/60 flex items-center justify-between text-xs text-[#061A40]/60">
                    <span class="font-medium">
                        {{ $post->published_at?->format('M d, Y') ?? 'Recently Published' }}
                    </span>

                    <a href="{{ route('blog.show', $post->slug) }}" class="font-semibold text-[#2D7DD2] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read Guide</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </article>
        @empty
            <div class="col-span-full bg-white border border-[#E5DFC9] rounded-2xl p-12 text-center">
                <div class="w-12 h-12 rounded-full bg-[#EAC435]/20 text-[#061A40] flex items-center justify-center mx-auto mb-4 font-display font-bold text-xl">!</div>
                <h4 class="font-display font-semibold text-lg text-[#061A40] mb-2">No Articles Found</h4>
                <p class="text-sm text-[#061A40]/70 max-w-md mx-auto mb-6">We couldn't find any published articles matching your selected category or search query.</p>
                <button wire:click="$set('search', '')" wire:click="selectCategory('')" class="btn-primary text-xs">
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
