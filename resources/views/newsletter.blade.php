<x-layouts.app title="The Inner Circle Newsletter — Achieving Vision" description="Subscribe to The Inner Circle for one actionable idea, reflection, or framework every week to help turn the vision you carry into work you can build and finish.">

    <!-- Newsletter Dedicated Hero & 2-Column Section -->
    <section class="py-16 md:py-24 bg-white border-b border-[#061A40]/10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:newsletter-form source="dedicated_newsletter_page" />
        </div>
    </section>

    <!-- What You Can Expect (3 Benefit Pillars) -->
    <section class="py-16 md:py-24 bg-[#FBF9F4] border-b border-[#061A40]/10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="text-center space-y-3 max-w-2xl mx-auto">
                <span class="font-sans text-xs font-semibold uppercase tracking-[0.16em] text-[#2D7DD2]">
                    Editorial Standards
                </span>
                <h2 class="font-display font-medium text-3xl sm:text-4xl text-[#061A40]">
                    What You Can Expect Every Week
                </h2>
                <p class="font-sans text-sm text-[#061A40]/80">
                    We respect your inbox. Every issue is concise, actionable, and free from hype.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white border border-[#061A40]/10 rounded-[8px] p-7 space-y-4 shadow-sm">
                    <div class="w-10 h-10 rounded-[6px] bg-[#061A40] text-[#EAC435] flex items-center justify-center font-display font-bold text-lg">
                        1
                    </div>
                    <h3 class="font-display font-medium text-xl text-[#061A40]">
                        One Core Principle
                    </h3>
                    <p class="font-sans text-xs sm:text-sm text-[#061A40]/80 leading-relaxed">
                        A focused reflection on why vision stalls and how to overcome common psychological traps and limiting beliefs.
                    </p>
                </div>

                <div class="bg-white border border-[#061A40]/10 rounded-[8px] p-7 space-y-4 shadow-sm">
                    <div class="w-10 h-10 rounded-[6px] bg-[#061A40] text-[#EAC435] flex items-center justify-center font-display font-bold text-lg">
                        2
                    </div>
                    <h3 class="font-display font-medium text-xl text-[#061A40]">
                        Actionable Framework
                    </h3>
                    <p class="font-sans text-xs sm:text-sm text-[#061A40]/80 leading-relaxed">
                        A practical exercise, daily ritual, or mental model you can apply immediately to your current project.
                    </p>
                </div>

                <div class="bg-white border border-[#061A40]/10 rounded-[8px] p-7 space-y-4 shadow-sm">
                    <div class="w-10 h-10 rounded-[6px] bg-[#061A40] text-[#EAC435] flex items-center justify-center font-display font-bold text-lg">
                        3
                    </div>
                    <h3 class="font-display font-medium text-xl text-[#061A40]">
                        Zero Fluff & Zero Ads
                    </h3>
                    <p class="font-sans text-xs sm:text-sm text-[#061A40]/80 leading-relaxed">
                        No sponsored link drops, promotional clutter, or empty inspiration. Direct to the point in under 3 minutes.
                    </p>
                </div>

            </div>

        </div>
    </section>

</x-layouts.app>