<!-- Refined Editorial Grid Hero Section matching Swiss / High-Fashion Brutalist Magazine Design -->
<section class="relative bg-white text-[#061A40] border-b border-[#061A40]/10 overflow-hidden">
    
    <!-- Visually Hidden Accessible Unified Heading & Statement for Screen Readers & SEO -->
    <h1 class="sr-only">I'm Oghale. I make ideas work.</h1>
    <p class="sr-only">Achieving Vision provides practical guidance for building and finishing meaningful work.</p>

    <!-- Top Minimalist Metadata / Header Bar -->
    <div class="max-w-[1440px] mx-auto border-x border-[#061A40]/10">
        <div class="grid grid-cols-2 md:grid-cols-12 text-[11px] font-mono tracking-wider uppercase border-b border-[#061A40]/10">
            <div class="col-span-1 md:col-span-4 p-3 sm:px-6 flex items-center gap-2.5 border-r border-[#061A40]/10 text-[#061A40]/70">
                <span class="w-1.5 h-1.5 rounded-full bg-[#061A40]/80 flex-shrink-0"></span>
                <span class="truncate">Author &bull; Researcher</span>
            </div>
            <div class="hidden md:flex md:col-span-4 p-3 sm:px-6 items-center justify-center border-r border-[#061A40]/10 font-medium tracking-widest text-[#061A40]">
                ACHIEVING VISION
            </div>
            <div class="col-span-1 md:col-span-4 p-3 sm:px-6 flex items-center justify-end gap-3 sm:gap-5 text-[#061A40]/80">
                <span class="hidden sm:inline text-[#061A40]/40">[EST. 2026]</span>
                <a 
                    href="{{ route('contact') }}" 
                    class="hover:text-[#2D7DD2] transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40] focus-visible:outline-offset-2 text-[10px] sm:text-[11px]"
                >
                    (CONTACT)
                </a>
            </div>
        </div>
    </div>

    <!-- Main Editorial Typography & Center Portrait Matrix -->
    <div class="max-w-[1440px] mx-auto border-x border-[#061A40]/10">
        
        <!-- ========================================== -->
        <!-- MOBILE / TABLET VIEW (< lg)                -->
        <!-- Symmetrical paired stacks with center art  -->
        <!-- ========================================== -->
        <div class="lg:hidden p-5 sm:p-8 space-y-6">
            
            <!-- Mobile Headline Stacks -->
            <div class="space-y-3 select-none" aria-hidden="true">
                <div class="flex items-baseline justify-between border-b border-[#061A40]/[0.06] pb-2">
                    <span class="whitespace-nowrap text-[clamp(2.35rem,9.5vw,4.25rem)] font-medium tracking-[-0.06em] leading-[0.85] text-[#061A40]">i'm</span>
                    <span class="whitespace-nowrap text-[clamp(2.35rem,9.5vw,4.25rem)] font-medium tracking-[-0.06em] leading-[0.85] text-[#061A40]">Oghale</span>
                </div>
                <div class="flex items-baseline justify-between border-b border-[#061A40]/[0.06] pb-2">
                    <span class="whitespace-nowrap text-[clamp(2.35rem,9.5vw,4.25rem)] font-medium tracking-[-0.06em] leading-[0.85] text-[#061A40]">and i</span>
                    <span class="whitespace-nowrap text-[clamp(2.35rem,9.5vw,4.25rem)] font-medium tracking-[-0.06em] leading-[0.85] text-[#061A40]">make</span>
                </div>
                <div class="flex items-baseline justify-between pb-1">
                    <span class="whitespace-nowrap text-[clamp(2.35rem,9.5vw,4.25rem)] font-medium tracking-[-0.06em] leading-[0.85] text-[#061A40]">ideas</span>
                    <span class="whitespace-nowrap text-[clamp(2.35rem,9.5vw,4.25rem)] font-medium tracking-[-0.06em] leading-[0.85] text-[#061A40]">work.</span>
                </div>
            </div>

            <!-- Mobile Portrait Frame (Open & Clean on White Background) -->
            <div class="relative w-full max-w-[340px] sm:max-w-[380px] mx-auto overflow-hidden bg-white pt-6 flex items-end justify-center">
                <img 
                    src="{{ asset('images/oghale-editorial.jpg') }}" 
                    alt="" 
                    aria-hidden="true"
                    width="380"
                    height="400"
                    fetchpriority="high"
                    class="w-full h-auto max-h-[340px] sm:max-h-[400px] object-contain object-bottom grayscale contrast-125 brightness-95"
                    loading="eager"
                />
                <div class="absolute bottom-0 inset-x-0 h-8 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
            </div>

            <!-- Mobile Micro Narrative & CTA -->
            <div class="pt-4 border-t border-[#061A40]/10 space-y-3">
                <p class="text-xs sm:text-sm text-[#061A40]/75 leading-relaxed font-sans">
                    Practical guidance for ambitious people building, learning, and following through on their vision.
                </p>
                <div class="pt-1">
                    <a 
                        href="#article-library" 
                        class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.14em] font-semibold text-[#061A40] hover:text-[#2D7DD2] transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40] focus-visible:outline-offset-2"
                    >
                        <span>Explore the guides</span>
                        <span aria-hidden="true">&nearr;</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- ========================================== -->
        <!-- DESKTOP VIEW (lg and above)                -->
        <!-- Balanced 3-Column Editorial Grid           -->
        <!-- ========================================== -->
        <div class="hidden lg:block relative">

            <!-- Subtle Horizontal Hairline Alignment Guides -->
            <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
                <div class="grid grid-rows-3 h-full w-full">
                    <div class="border-b border-[#061A40]/[0.06]"></div>
                    <div class="border-b border-[#061A40]/[0.06]"></div>
                    <div></div>
                </div>
            </div>

            <!-- Balanced 3-Column Editorial Grid: Left Stack | Portrait | Right Stack -->
            <div class="grid grid-cols-12 items-stretch min-h-[580px] xl:min-h-[640px]">
                
                <!-- Left Typography Column -->
                <div class="col-span-4 flex flex-col justify-between p-8 lg:p-10 border-r border-[#061A40]/10 z-10">
                    
                    <!-- Left Stack Typography -->
                    <div class="space-y-8 lg:space-y-10 select-none" aria-hidden="true">
                        <div>
                            <span class="block whitespace-nowrap text-[clamp(3.25rem,5.2vw,5.75rem)] font-medium tracking-[-0.06em] leading-[0.84] text-[#061A40]">
                                i'm
                            </span>
                        </div>
                        <div>
                            <span class="block whitespace-nowrap text-[clamp(3.25rem,5.2vw,5.75rem)] font-medium tracking-[-0.06em] leading-[0.84] text-[#061A40]">
                                and i
                            </span>
                        </div>
                        <div>
                            <span class="block whitespace-nowrap text-[clamp(3.25rem,5.2vw,5.75rem)] font-medium tracking-[-0.06em] leading-[0.84] text-[#061A40]">
                                ideas
                            </span>
                        </div>
                    </div>

                    <!-- Left Micro-Annotation -->
                    <div class="pt-6 mt-6 border-t border-[#061A40]/10">
                        <p class="text-xs sm:text-sm text-[#061A40]/75 leading-relaxed font-sans max-w-xs">
                            Practical guidance for ambitious people building, learning, and following through on their vision.
                        </p>
                    </div>

                </div>

                <!-- Center Portrait Column: Minimal, Monochromatic & Art-Directed -->
                <div class="col-span-4 relative flex items-end justify-center overflow-hidden min-h-full bg-white">
                    
                    <!-- Subtle Horizontal Distortion Hairlines across lower torso -->
                    <div class="absolute inset-x-0 bottom-20 h-px bg-[#061A40]/[0.08] z-20 pointer-events-none"></div>
                    <div class="absolute inset-x-0 bottom-32 h-px bg-[#061A40]/[0.05] z-20 pointer-events-none"></div>

                    <!-- Portrait Image (Static, Non-Interactive Art) -->
                    <div class="relative w-full max-w-[380px] xl:max-w-[420px] h-full flex items-end justify-center z-10">
                        <img 
                            src="{{ asset('images/oghale-editorial.jpg') }}" 
                            alt="" 
                            aria-hidden="true"
                            width="420"
                            height="600"
                            fetchpriority="high"
                            class="w-full h-auto max-h-[520px] xl:max-h-[600px] object-contain object-bottom grayscale contrast-125 brightness-95"
                            loading="eager"
                        />
                    </div>

                    <!-- Seamless Baseline Blend -->
                    <div class="absolute bottom-0 inset-x-0 h-8 bg-gradient-to-t from-white to-transparent z-20 pointer-events-none"></div>

                </div>

                <!-- Right Typography Column -->
                <div class="col-span-4 flex flex-col justify-between p-8 lg:p-10 border-l border-[#061A40]/10 z-10">
                    
                    <!-- Right Stack Typography -->
                    <div class="space-y-8 lg:space-y-10 select-none" aria-hidden="true">
                        <div>
                            <span class="block whitespace-nowrap text-[clamp(3.25rem,5.2vw,5.75rem)] font-medium tracking-[-0.06em] leading-[0.84] text-[#061A40]">
                                Oghale
                            </span>
                        </div>
                        <div>
                            <span class="block whitespace-nowrap text-[clamp(3.25rem,5.2vw,5.75rem)] font-medium tracking-[-0.06em] leading-[0.84] text-[#061A40]">
                                make
                            </span>
                        </div>
                        <div>
                            <span class="block whitespace-nowrap text-[clamp(3.25rem,5.2vw,5.75rem)] font-medium tracking-[-0.06em] leading-[0.84] text-[#061A40]">
                                work.
                            </span>
                        </div>
                    </div>

                    <!-- Right Discreet Editorial CTA -->
                    <div class="pt-6 mt-6 border-t border-[#061A40]/10 flex items-center justify-between">
                        <a 
                            href="#article-library" 
                            class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.14em] font-semibold text-[#061A40] hover:text-[#2D7DD2] group transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40] focus-visible:outline-offset-2"
                        >
                            <span>Explore the guides</span>
                            <span class="group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform" aria-hidden="true">&nearr;</span>
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Sub-Hero Section: Editorial Narrative & 4-Quadrant Framework Matrix -->
    <div class="max-w-[1440px] mx-auto border-x border-t border-[#061A40]/10 bg-white">
        <div class="grid grid-cols-1 lg:grid-cols-12">
            
            <!-- Left Statement & Action Card -->
            <div class="lg:col-span-5 p-6 sm:p-10 lg:p-14 lg:border-r border-b lg:border-b-0 border-[#061A40]/10 flex flex-col justify-between space-y-6 sm:space-y-8 bg-white">
                <div class="space-y-4 sm:space-y-5">
                    <div class="inline-flex items-center gap-2 text-xs font-mono tracking-widest uppercase text-[#2D7DD2] font-semibold">
                        <span>// CORE DIRECTIVE</span>
                    </div>
                    <h2 class="font-display font-medium text-2xl sm:text-3xl lg:text-[2.5rem] text-[#061A40] leading-[1.12] tracking-tight">
                        Practical Direction at the Intersection of Vision & Execution.
                    </h2>
                    <p class="text-xs sm:text-base text-[#061A40]/80 leading-relaxed font-sans">
                        Starting is exciting, but finishing is where transformation happens. We deliver actionable frameworks and honest research so you can carry ideas across the finish line.
                    </p>
                </div>

                <!-- Sub-Hero Interactive CTAs -->
                <div class="space-y-4 pt-4 border-t border-[#061A40]/10">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <a href="{{ route('newsletter') }}" class="btn-primary text-xs tracking-wider uppercase px-6 py-3 font-semibold text-center w-full sm:w-auto">
                            Join Inner Circle
                        </a>
                        <a href="{{ route('about') }}" class="btn-secondary text-xs tracking-wider uppercase px-5 py-3 font-semibold text-center w-full sm:w-auto">
                            About Oghale
                        </a>
                    </div>
                    <div class="flex items-center justify-between text-xs pt-2">
                        <span class="font-mono text-[#061A40]/50">[PLATFORM STANCE]</span>
                        <span class="font-display italic text-[#2D7DD2] font-semibold text-xs sm:text-sm">"Here's to Achieving Vision"</span>
                    </div>
                </div>
            </div>

            <!-- Right 4-Quadrant Matrix (01 to 04) - Fully Interactive Grid Cards -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 bg-white">
                
                <!-- Quadrant 01 -->
                <a 
                    href="#article-library" 
                    class="p-6 sm:p-8 lg:p-10 border-b sm:border-r border-[#061A40]/10 hover:bg-[#FBF9F4] transition-colors group flex flex-col justify-between space-y-4 sm:space-y-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40] focus-visible:outline-offset-[-2px]"
                >
                    <div class="space-y-2.5 sm:space-y-3.5">
                        <div class="flex items-center justify-between">
                            <h3 class="font-display font-medium text-base sm:text-lg text-[#061A40] group-hover:text-[#2D7DD2] transition-colors">
                                Execution Frameworks
                            </h3>
                            <span class="font-mono text-xs font-semibold text-[#061A40]/40 group-hover:text-[#061A40]">
                                01
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm text-[#061A40]/75 leading-relaxed font-sans">
                            Systematic, step-by-step playbooks to eliminate procrastination, organize execution, and complete large projects.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#061A40]/10 text-[11px] font-mono text-[#2D7DD2] font-semibold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        <span>Actionable Guides</span>
                        <span aria-hidden="true">&rarr;</span>
                    </div>
                </a>

                <!-- Quadrant 02 -->
                <a 
                    href="#article-library" 
                    class="p-6 sm:p-8 lg:p-10 border-b border-[#061A40]/10 hover:bg-[#FBF9F4] transition-colors group flex flex-col justify-between space-y-4 sm:space-y-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40] focus-visible:outline-offset-[-2px]"
                >
                    <div class="space-y-2.5 sm:space-y-3.5">
                        <div class="flex items-center justify-between">
                            <h3 class="font-display font-medium text-base sm:text-lg text-[#061A40] group-hover:text-[#2D7DD2] transition-colors">
                                Mindset & Identity
                            </h3>
                            <span class="font-mono text-xs font-semibold text-[#061A40]/40 group-hover:text-[#061A40]">
                                02
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm text-[#061A40]/75 leading-relaxed font-sans">
                            Breaking through limiting self-beliefs, building emotional stamina, and cultivating unshakeable conviction in your work.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#061A40]/10 text-[11px] font-mono text-[#2D7DD2] font-semibold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        <span>Transformation</span>
                        <span aria-hidden="true">&rarr;</span>
                    </div>
                </a>

                <!-- Quadrant 03 -->
                <a 
                    href="#article-library" 
                    class="p-6 sm:p-8 lg:p-10 border-b sm:border-b-0 sm:border-r border-[#061A40]/10 hover:bg-[#FBF9F4] transition-colors group flex flex-col justify-between space-y-4 sm:space-y-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40] focus-visible:outline-offset-[-2px]"
                >
                    <div class="space-y-2.5 sm:space-y-3.5">
                        <div class="flex items-center justify-between">
                            <h3 class="font-display font-medium text-base sm:text-lg text-[#061A40] group-hover:text-[#2D7DD2] transition-colors">
                                Active Research
                            </h3>
                            <span class="font-mono text-xs font-semibold text-[#061A40]/40 group-hover:text-[#061A40]">
                                03
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm text-[#061A40]/75 leading-relaxed font-sans">
                            Writing as a researcher in the field—testing principles with real builders, analyzing outcomes, and refining tools.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#061A40]/10 text-[11px] font-mono text-[#2D7DD2] font-semibold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        <span>Case Studies</span>
                        <span aria-hidden="true">&rarr;</span>
                    </div>
                </a>

                <!-- Quadrant 04 -->
                <a 
                    href="{{ route('about') }}" 
                    class="p-6 sm:p-8 lg:p-10 hover:bg-[#FBF9F4] transition-colors group flex flex-col justify-between space-y-4 sm:space-y-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#061A40] focus-visible:outline-offset-[-2px]"
                >
                    <div class="space-y-2.5 sm:space-y-3.5">
                        <div class="flex items-center justify-between">
                            <h3 class="font-display font-medium text-base sm:text-lg text-[#061A40] group-hover:text-[#2D7DD2] transition-colors">
                                Books & Publications
                            </h3>
                            <span class="font-mono text-xs font-semibold text-[#061A40]/40 group-hover:text-[#061A40]">
                                04
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm text-[#061A40]/75 leading-relaxed font-sans">
                            Long-form books, monographs, and keynote curriculum designed to support dreamers worldwide over years, not days.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#061A40]/10 text-[11px] font-mono text-[#2D7DD2] font-semibold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        <span>Published Works</span>
                        <span aria-hidden="true">&rarr;</span>
                    </div>
                </a>

            </div>

        </div>
    </div>

</section>
