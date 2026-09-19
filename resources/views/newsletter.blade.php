<x-layouts.app title="The Inner Circle Newsletter — Achieving Vision" description="Subscribe to The Inner Circle for one actionable idea, reflection, or framework every week to help you turn your vision into reality.">

    <!-- Newsletter Hero Header -->
    <section class="py-16 md:py-24 bg-[#FBF9F4] border-b border-[#E5DFC9]/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 text-center">
            
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#061A40]/5 border border-[#061A40]/10 text-[#061A40] text-xs font-semibold tracking-wide uppercase mx-auto">
                <span class="w-2 h-2 rounded-full bg-[#EAC435]"></span>
                Weekly Publication &bull; The Inner Circle
            </div>

            <h1 class="font-display font-semibold text-4xl sm:text-5xl lg:text-6xl text-[#061A40] leading-[1.12] tracking-tight">
                A clearer way forward, once a week.
            </h1>

            <p class="font-sans text-lg sm:text-xl text-[#061A40]/80 leading-relaxed max-w-2xl mx-auto">
                Join ambitious dreamers and builders worldwide who receive our weekly guidance on vision follow-through, overcoming resistance, and finishing meaningful work.
            </p>

        </div>
    </section>

    <!-- Dedicated Form Box -->
    <section class="py-16 md:py-20 bg-[#FBF9F4] border-b border-[#E5DFC9]/80">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:newsletter-form source="dedicated_newsletter_page" />
        </div>
    </section>

    <!-- What You Can Expect -->
    <section class="py-16 md:py-24 bg-[#F5F1E8] border-b border-[#E5DFC9]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="text-center space-y-3 max-w-2xl mx-auto">
                <h2 class="font-display font-semibold text-2xl sm:text-3xl text-[#061A40]">
                    What You Can Expect Every Week
                </h2>
                <p class="text-sm text-[#061A40]/80">
                    We respect your inbox. Every issue is short, actionable, and free from hype.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white border border-[#E5DFC9] rounded-2xl p-6 space-y-3 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-[#061A40] text-[#EAC435] flex items-center justify-center font-display font-bold text-lg">
                        1
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[#061A40]">
                        One Core Principle
                    </h3>
                    <p class="font-sans text-xs sm:text-sm text-[#061A40]/80 leading-relaxed">
                        A focused reflection on why vision stalls and how to overcome common psychological traps.
                    </p>
                </div>

                <div class="bg-white border border-[#E5DFC9] rounded-2xl p-6 space-y-3 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-[#061A40] text-[#EAC435] flex items-center justify-center font-display font-bold text-lg">
                        2
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[#061A40]">
                        Actionable Framework
                    </h3>
                    <p class="font-sans text-xs sm:text-sm text-[#061A40]/80 leading-relaxed">
                        A practical exercise or mental model you can apply immediately to your current project.
                    </p>
                </div>

                <div class="bg-white border border-[#E5DFC9] rounded-2xl p-6 space-y-3 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-[#061A40] text-[#EAC435] flex items-center justify-center font-display font-bold text-lg">
                        3
                    </div>
                    <h3 class="font-display font-semibold text-lg text-[#061A40]">
                        Zero Fluff & Zero Ads
                    </h3>
                    <p class="font-sans text-xs sm:text-sm text-[#061A40]/80 leading-relaxed">
                        No sponsored link drops or promotional clutter. Direct to the point in under 3 minutes.
                    </p>
                </div>

            </div>

        </div>
    </section>

</x-layouts.app>