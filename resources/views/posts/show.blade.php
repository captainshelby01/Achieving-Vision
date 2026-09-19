<x-layouts.app :title="$post->seo_title ?? $post->title . ' — Achieving Vision'" :description="$post->seo_description ?? $post->excerpt">

    <!-- Article Detail & Reader View -->
    <article class="py-12 md:py-20 bg-[#FBF9F4]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs text-[#061A40]/60 mb-8 font-medium">
                <a href="{{ route('home') }}" class="hover:text-[#2D7DD2] transition-colors">Home</a>
                <span>/</span>
                <a href="{{ route('blog.index') }}" class="hover:text-[#2D7DD2] transition-colors">Articles & Library</a>
                <span>/</span>
                <span class="text-[#061A40] truncate max-w-[200px] sm:max-w-xs">{{ $post->title }}</span>
            </nav>

            <!-- Article Header -->
            <header class="space-y-6 pb-10 border-b border-[#E5DFC9]">
                <!-- Meta Pill Badges -->
                <div class="flex flex-wrap items-center gap-3 text-xs">
                    @if($post->categories->first())
                        <span class="badge-type bg-[#EAC435] text-[#061A40]">
                            {{ $post->categories->first()->name }}
                        </span>
                    @endif

                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#061A40]/5 text-[#061A40] font-medium">
                        <svg class="w-3.5 h-3.5 text-[#2D7DD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $post->reading_time_min ?? 3 }} MIN READ</span>
                    </span>

                    <span class="text-[#061A40]/60 font-medium">
                        {{ $post->published_at?->format('F d, Y') ?? 'Recently Published' }}
                    </span>
                </div>

                <!-- Main Display Headline -->
                <h1 class="font-display font-semibold text-3xl sm:text-4xl lg:text-5xl text-[#061A40] leading-[1.15] tracking-tight">
                    {{ $post->title }}
                </h1>

                <!-- Author Byline & Stance -->
                <div class="flex items-center gap-3 pt-2 text-xs text-[#061A40]/80">
                    <span class="w-8 h-8 rounded-full bg-[#061A40] text-white flex items-center justify-center font-display font-bold text-xs">
                        O
                    </span>
                    <div>
                        <span class="font-semibold text-[#061A40] block">Written by {{ $post->author?->name ?? 'Oghale' }}</span>
                        <span class="text-[#061A40]/60 text-[11px]">Researcher & Guide &bull; Achieving Vision</span>
                    </div>
                </div>
            </header>

            <!-- Story-Driven Excerpt Callout -->
            @if($post->excerpt)
                <div class="my-8 p-6 sm:p-8 bg-[#F5F1E8] border-l-4 border-[#2D7DD2] rounded-r-2xl">
                    <p class="font-display italic text-lg sm:text-xl text-[#061A40] leading-relaxed">
                        &ldquo;{{ $post->excerpt }}&rdquo;
                    </p>
                </div>
            @endif

            <!-- Main Formatted Article Content Body (45-75 chars per line for reading comfort) -->
            <div class="prose prose-lg max-w-none text-[#061A40] space-y-6 leading-relaxed font-sans text-base sm:text-lg">
                {!! $post->content !!}
            </div>

            <!-- In-Article Monetization Slot (AdSense / Partner Placeholder) -->
            <x-ad-slot position="in-article" />

            <!-- Interaction & Social Sharing Bar -->
            <div class="my-12 py-6 border-y border-[#E5DFC9] flex flex-col sm:flex-row items-center justify-between gap-6">
                <!-- Helpful Like Button -->
                <div>
                    <livewire:post-like-button :post="$post" />
                </div>

                <!-- Social Share Controls -->
                <div class="flex items-center gap-3 text-xs font-semibold text-[#061A40]">
                    <span>Share Guide:</span>
                    <a 
                        href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="p-2 rounded-full bg-white border border-[#E5DFC9] hover:border-[#2D7DD2] text-[#061A40] hover:text-[#2D7DD2] transition-colors"
                        aria-label="Share on X"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>

                    <a 
                        href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="p-2 rounded-full bg-white border border-[#E5DFC9] hover:border-[#2D7DD2] text-[#061A40] hover:text-[#2D7DD2] transition-colors"
                        aria-label="Share on LinkedIn"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>

                    <a 
                        href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="p-2 rounded-full bg-white border border-[#E5DFC9] hover:border-[#2D7DD2] text-[#061A40] hover:text-[#2D7DD2] transition-colors"
                        aria-label="Share on WhatsApp"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Author Bio Card Box -->
            <x-author-bio />

            <!-- Reader Comments & Discussion -->
            <livewire:comment-section :post="$post" />

        </div>
    </article>

    <!-- Related Articles Module -->
    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
        <section class="py-16 bg-[#F5F1E8] border-t border-[#E5DFC9]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs font-semibold text-[#2D7DD2] uppercase tracking-wider">Keep Reading</span>
                        <h2 class="font-display font-semibold text-2xl text-[#061A40] mt-1">Related Practical Guides</h2>
                    </div>
                    <a href="{{ route('blog.index') }}" class="text-xs font-semibold text-[#2D7DD2] hover:underline flex items-center gap-1">
                        <span>View all articles</span>
                        <span>&rarr;</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $related)
                        <article class="bg-white border border-[#E5DFC9] rounded-2xl p-6 shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-xs">
                                    @if($related->categories->first())
                                        <span class="badge-type bg-[#2D7DD2]/10 text-[#2D7DD2] text-[10px]">
                                            {{ $related->categories->first()->name }}
                                        </span>
                                    @endif
                                    <span class="text-[#061A40]/50">{{ $related->reading_time_min ?? 3 }} min read</span>
                                </div>
                                <h3 class="font-display font-semibold text-lg text-[#061A40] group-hover:text-[#2D7DD2] transition-colors">
                                    <a href="{{ route('blog.show', $related->slug) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                                <p class="font-sans text-xs text-[#061A40]/75 line-clamp-2">
                                    {{ $related->excerpt }}
                                </p>
                            </div>
                            <div class="pt-4 mt-4 border-t border-[#E5DFC9]/60 flex items-center justify-between text-xs text-[#061A40]/60">
                                <span>{{ $related->published_at?->format('M d, Y') ?? 'Recent' }}</span>
                                <a href="{{ route('blog.show', $related->slug) }}" class="font-semibold text-[#2D7DD2]">
                                    Read guide &rarr;
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Dedicated Newsletter Section -->
    <section class="py-16 bg-[#FBF9F4]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:newsletter-form source="article_bottom" />
        </div>
    </section>

</x-layouts.app>
