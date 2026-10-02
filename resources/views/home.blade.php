<x-layouts.app title="Achieving Vision — Practical Guidance to Build & Finish Your Vision">

    <!-- Block 1: Streamlined Editorial Hero Section & 5-Block Matrix (Newsletter + Categories) -->
    <x-hero />

    <!-- Block 2: "Start Here" Featured Article Showcase -->
    @if(isset($featuredPosts) && $featuredPosts->count() > 0)
        <x-featured-article :post="$featuredPosts->first()" />
    @endif

    <!-- Block 3: Attributed Brand Principle Quote -->
    <x-principle-quote />

    <!-- Block 4: Dedicated Subscription Banner (Matching The Good Trade reference with wavy curve treatment) -->
    <section id="newsletter-section" class="relative bg-gradient-to-b from-[#2D7DD2]/[0.05] via-[#82FF9E]/[0.07] to-[#061A40]/[0.03] pt-4 pb-4 overflow-hidden border-y border-[#061A40]/5 scroll-mt-10">
        <!-- Top Organic Wavy Curve Divider -->
        <div class="w-full overflow-hidden leading-none -mt-4 pointer-events-none select-none" aria-hidden="true">
            <svg class="block w-full h-10 sm:h-14 md:h-20 lg:h-24 text-white" viewBox="0 0 1440 90" preserveAspectRatio="none" fill="currentColor">
                <path d="M0,0 L1440,0 L1440,30 C1120,80 840,15 540,65 C260,110 120,40 0,75 Z"></path>
            </svg>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">
            <livewire:newsletter-form source="homepage_subscription" />
        </div>

        <!-- Bottom Organic Wavy Curve Divider -->
        <div class="w-full overflow-hidden leading-none -mb-4 pointer-events-none select-none" aria-hidden="true">
            <svg class="block w-full h-10 sm:h-14 md:h-20 lg:h-24 text-white" viewBox="0 0 1440 90" preserveAspectRatio="none" fill="currentColor">
                <path d="M0,90 L1440,90 L1440,60 C1180,10 880,75 560,25 C300,-15 140,50 0,15 Z"></path>
            </svg>
        </div>
    </section>

    <!-- Block 5: Article Library & Livewire Search -->
    <section id="article-library" class="py-16 md:py-24 bg-white border-b border-[#061A40]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:blog-index />
        </div>
    </section>

</x-layouts.app>
