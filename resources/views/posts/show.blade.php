<x-layouts.app :title="$post->seo_title ?? $post->title . ' — Achieving Vision'" :description="$post->seo_description ?? $post->excerpt">

    <!-- Article Detail & Reader View -->
    <article class="py-12 md:py-20 bg-white">
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
            <header class="space-y-6 pb-10 border-b border-[#061A40]/10">
                <!-- Meta Pill Badges -->
                <div class="flex flex-wrap items-center gap-3 text-xs">
                    @foreach($post->categories as $category)
                        <a href="{{ route('blog.index', ['selectedCategory' => $category->slug]) }}" class="badge-type bg-[#EAC435] text-[#061A40] hover:bg-[#dfb728] transition-colors shadow-xs">
                            {{ $category->name }}
                        </a>
                    @endforeach

                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#82FF9E]/25 text-[#061A40] font-semibold text-xs border border-[#82FF9E]/60 shadow-xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#82FF9E]"></span>
                        <span>Actionable Guide</span>
                    </span>

                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#061A40]/5 text-[#061A40] font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-clock w-3.5 h-3.5 text-[#2D7DD2]" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                        </svg>
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
                <div class="my-8 p-6 sm:p-8 bg-white border border-[#061A40]/10 border-l-4 border-l-[#2D7DD2] rounded-r-2xl shadow-xs">
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
            <div class="my-12 py-6 border-y border-[#061A40]/10 flex flex-col sm:flex-row items-center justify-between gap-6">
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
                        class="p-2 rounded-full bg-white border border-[#061A40]/15 hover:border-[#2D7DD2] text-[#061A40] hover:text-[#2D7DD2] transition-colors"
                        aria-label="Share on X"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x w-4 h-4" viewBox="0 0 16 16">
                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                        </svg>
                    </a>

                    <a 
                        href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="p-2 rounded-full bg-white border border-[#061A40]/15 hover:border-[#2D7DD2] text-[#061A40] hover:text-[#2D7DD2] transition-colors"
                        aria-label="Share on LinkedIn"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin w-4 h-4" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                        </svg>
                    </a>

                    <a 
                        href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="p-2 rounded-full bg-white border border-[#061A40]/15 hover:border-[#2D7DD2] text-[#061A40] hover:text-[#2D7DD2] transition-colors"
                        aria-label="Share on WhatsApp"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp w-4 h-4" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.707 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Filed Under Category Tags Navigation -->
            @if($post->categories->count() > 0)
                <div class="mb-8 p-4 bg-slate-50 border border-[#061A40]/10 rounded-[8px] flex items-center gap-2.5 flex-wrap text-xs">
                    <span class="font-mono text-[#061A40]/60 uppercase tracking-wider text-[11px] font-semibold">Explore Category:</span>
                    @foreach($post->categories as $category)
                        <a 
                            href="{{ route('blog.index', ['selectedCategory' => $category->slug]) }}" 
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white border border-[#061A40]/15 hover:border-[#2D7DD2] text-[#061A40] hover:text-[#2D7DD2] font-semibold transition-colors shadow-xs"
                        >
                            <span>{{ $category->name }}</span>
                            <span class="text-[#2D7DD2]">&rarr;</span>
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- Author Bio Card Box -->
            <x-author-bio />

            <!-- Reader Comments & Discussion -->
            <livewire:comment-section :post="$post" />

        </div>
    </article>

    <!-- Related Articles Module -->
    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
        <section class="py-16 bg-white border-t border-[#061A40]/10">
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
                        <article class="bg-white border border-[#061A40]/10 rounded-2xl p-6 shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
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
                            <div class="pt-4 mt-4 border-t border-[#061A40]/10 flex items-center justify-between text-xs text-[#061A40]/60">
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

    <!-- Dedicated Newsletter Section with Wavy Shape Treatment -->
    <section class="relative bg-white pt-6 pb-20 overflow-hidden border-t border-[#061A40]/10">
        <!-- Subtle Wavy Shape Top Transition Divider -->
        <div class="w-full overflow-hidden leading-none -mt-6 mb-10 pointer-events-none" aria-hidden="true">
            <svg class="block w-full h-8 sm:h-12 md:h-16" viewBox="0 0 1440 96" preserveAspectRatio="none">
                <path d="M0,32 C240,72 480,-8 720,32 C960,72 1200,-8 1440,32 L1440,96 L0,96 Z" fill="#2D7DD2" fill-opacity="0.04"></path>
                <path d="M0,48 C280,10 560,70 840,30 C1120,-10 1320,60 1440,25 L1440,96 L0,96 Z" fill="#82FF9E" fill-opacity="0.12"></path>
            </svg>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:newsletter-form source="article_bottom" />
        </div>
    </section>

</x-layouts.app>
