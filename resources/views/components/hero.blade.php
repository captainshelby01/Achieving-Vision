<!-- Section 1: Editorial Hero Section (Inspired by Dribbble Editorial UI Reference) -->
<section class="relative overflow-hidden pt-12 pb-20 md:pt-20 md:pb-28 border-b border-[#E5DFC9]/80 bg-[#FBF9F4]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Editorial Headline & Stance -->
            <div class="lg:col-span-7 space-y-6">
                
                <!-- Eyebrow Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#061A40]/5 border border-[#061A40]/10 text-[#061A40] text-xs font-semibold tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#EAC435]"></span>
                    Achieving Vision &mdash; Official Digital Home
                </div>

                <!-- Main Editorial Headline -->
                <h1 class="font-display font-semibold text-4xl sm:text-5xl lg:text-6xl text-[#061A40] leading-[1.12] tracking-tight">
                    Helping ambitious dreamers everywhere turn big vision into finished reality.
                </h1>

                <!-- Body / Subtitle -->
                <p class="font-sans text-lg sm:text-xl text-[#061A40]/80 leading-relaxed max-w-2xl">
                    No matter where you are in the world or what your vision looks like, Achieving Vision gives you the practical, story-driven guidance to build, execute, and finish what you start.
                </p>

                <!-- Dual Action CTAs -->
                <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                    <a href="{{ route('blog.index') }}" class="btn-primary text-base">
                        <span>Explore Articles & Library</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    
                    <a href="{{ route('newsletter') }}" class="btn-secondary text-base">
                        <span>Join the Inner Circle</span>
                    </a>
                </div>

                <!-- Feature Highlights Bar -->
                <div class="pt-8 border-t border-[#E5DFC9] grid grid-cols-3 gap-4 text-xs font-medium text-[#061A40]/70">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#2D7DD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Practical Guidance</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#2D7DD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Zero Gatekeeping</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#2D7DD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Global Audience</span>
                    </div>
                </div>

            </div>

            <!-- Right Column: Editorial Visual Canvas (Framed Card Container) -->
            <div class="lg:col-span-5 relative">
                <!-- Warm Canvas Background Frame -->
                <div class="relative bg-[#F5F1E8] border border-[#E5DFC9] rounded-2xl p-6 sm:p-8 shadow-sm">
                    
                    <!-- Top Canvas Header -->
                    <div class="flex items-center justify-between pb-4 mb-6 border-b border-[#E5DFC9]">
                        <span class="font-display font-semibold text-lg text-[#061A40]">Oghale &mdash; Author & Guide</span>
                        <span class="text-xs px-2.5 py-1 rounded bg-[#EAC435]/20 text-[#061A40] font-medium">Verified Author</span>
                    </div>

                    <!-- Portrait Graphic Placeholder Container -->
                    <div class="relative aspect-[4/5] w-full bg-[#061A40] rounded-xl overflow-hidden shadow-inner flex flex-col justify-end p-6 text-white group">
                        <!-- Background Decorative Subtle Pattern -->
                        <div class="absolute inset-0 bg-gradient-to-t from-[#061A40] via-[#061A40]/40 to-transparent"></div>
                        
                        <!-- Illustration Placeholder Art -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                            <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>

                        <!-- Foreground Card Content -->
                        <div class="relative z-10 space-y-2">
                            <span class="inline-block px-3 py-1 rounded-full bg-[#EAC435] text-[#061A40] font-sans font-semibold text-xs tracking-wider uppercase">
                                Researcher & Guide
                            </span>
                            <blockquote class="font-display italic text-lg leading-snug text-white/95">
                                "Longing for the reader's transformation is expressed through practicality, not sentiment."
                            </blockquote>
                            <p class="text-xs text-white/70 font-sans pt-1">
                                Author, Achieving Vision
                            </p>
                        </div>
                    </div>

                    <!-- Tagline Accent Badge at Bottom -->
                    <div class="mt-6 pt-4 border-t border-[#E5DFC9] flex items-center justify-between text-xs">
                        <span class="font-display font-semibold text-[#061A40]">Tagline:</span>
                        <span class="font-display italic text-[#2D7DD2] font-medium text-sm">"Here's to Achieving Vision"</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
