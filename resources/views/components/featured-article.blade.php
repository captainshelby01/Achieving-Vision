@props(['post' => null])

@if($post)
<section class="py-12 bg-white border-b border-[#061A40]/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-6">
            <span class="text-xs font-semibold uppercase tracking-widest text-[#2D7DD2] flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#82FF9E] ring-2 ring-[#82FF9E]/30"></span>
                <span>Start Here &bull; Featured Article</span>
            </span>
        </div>

        <!-- Featured Article Hero Card -->
        <article class="bg-white border border-[#061A40]/10 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow grid grid-cols-1 lg:grid-cols-12 gap-0 group">
            
            <!-- Left: Editorial Image / Abstract Pattern Box -->
            <div class="lg:col-span-5 bg-[#061A40] p-8 lg:p-12 flex flex-col justify-between relative min-h-[260px] overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(#EAC435_1px,transparent_1px)] [background-size:20px_20px] opacity-15"></div>
                
                <div class="relative z-10 flex items-center justify-between gap-2 flex-wrap">
                    @if($post->categories->first())
                        <a href="{{ route('blog.index', ['selectedCategory' => $post->categories->first()->slug]) }}" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#82FF9E] text-[#061A40] font-sans font-bold text-xs shadow-xs hover:bg-[#6efc8e] transition-colors">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#061A40]"></span>
                            <span>{{ $post->categories->first()->name }}</span>
                        </a>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#82FF9E] text-[#061A40] font-sans font-bold text-xs shadow-xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#061A40]"></span>
                            <span>PRACTICAL GUIDE</span>
                        </span>
                    @endif
                    
                    <span class="inline-flex items-center gap-1.5 text-xs text-white/80 font-medium bg-white/10 px-3 py-1 rounded-full backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-clock w-3.5 h-3.5 text-[#EAC435]" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                        </svg>
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
            <div class="lg:col-span-7 p-8 sm:p-10 flex flex-col justify-between space-y-6 bg-white">
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

                <div class="pt-6 border-t border-[#061A40]/10 flex flex-wrap items-center justify-between gap-4 text-xs text-[#061A40]/70">
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
