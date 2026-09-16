@props(['post' => null])

@if($post)
<section class="py-12 bg-[#FBF9F4] border-b border-[#E5DFC9]/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-6">
            <span class="text-xs font-semibold uppercase tracking-widest text-[#2D7DD2] flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#EAC435]"></span>
                Start Here &bull; Featured Article
            </span>
        </div>

        <!-- Featured Article Hero Card -->
        <article class="bg-[#F5F1E8] border border-[#E5DFC9] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow grid grid-cols-1 lg:grid-cols-12 gap-0 group">
            
            <!-- Left: Editorial Image / Abstract Pattern Box -->
            <div class="lg:col-span-5 bg-[#061A40] p-8 lg:p-12 flex flex-col justify-between relative min-h-[260px] overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(#EAC435_1px,transparent_1px)] [background-size:20px_20px] opacity-15"></div>
                
                <div class="relative z-10 flex items-center justify-between">
                    <span class="badge-type bg-[#EAC435] text-[#061A40]">
                        {{ $post->categories->first()?->name ?? 'PRACTICAL GUIDE' }}
                    </span>
                    
                    <span class="inline-flex items-center gap-1.5 text-xs text-white/80 font-medium bg-white/10 px-3 py-1 rounded-full backdrop-blur-sm">
                        <svg class="w-3.5 h-3.5 text-[#EAC435]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $post->reading_time_min ?? 6 }} MIN READ</span>
                    </span>
                </div>

                <div class="relative z-10 pt-12">
                    <span class="font-display italic text-2xl text-white/90 leading-snug block">
                        "The art of finishing what you start."
                    </span>
                </div>
            </div>

            <!-- Right: Content Details -->
            <div class="lg:col-span-7 p-8 sm:p-10 flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    <h2 class="font-display font-semibold text-2xl sm:text-3xl text-[#061A40] group-hover:text-[#2D7DD2] transition-colors leading-snug">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <p class="font-sans text-base text-[#061A40]/80 leading-relaxed">
                        {{ $post->excerpt }}
                    </p>
                </div>

                <div class="pt-6 border-t border-[#E5DFC9] flex flex-wrap items-center justify-between gap-4 text-xs text-[#061A40]/70">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-[#061A40] text-white flex items-center justify-center font-display text-[10px] font-bold">O</span>
                        <span class="font-medium text-[#061A40]">Written by {{ $post->author?->name ?? 'Oghale' }}</span>
                        <span>&bull;</span>
                        <span>{{ $post->published_at?->format('M d, Y') ?? 'Recent' }}</span>
                    </div>

                    <a href="{{ route('blog.show', $post->slug) }}" class="btn-primary text-xs py-2.5 px-5">
                        <span>Read Featured Article</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

        </article>

    </div>
</section>
@endif
