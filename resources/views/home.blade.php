<x-layouts.app title="Achieving Vision — Practical Guidance to Build & Finish Your Vision">

    <!-- Block 1: Streamlined Editorial Hero Section (Single Primary CTA: "Explore the Guides") -->
    <x-hero />

    <!-- Block 2: "Start Here" Featured Article Showcase -->
    @if(isset($featuredPosts) && $featuredPosts->count() > 0)
        <x-featured-article :post="$featuredPosts->first()" />
    @endif

    <!-- Block 3: Attributed Brand Principle Quote -->
    <x-principle-quote />

    <!-- Block 4: Article Library & Livewire Search -->
    <section class="py-16 md:py-24 bg-[#FBF9F4] border-b border-[#E5DFC9]/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:blog-index />
        </div>
    </section>

    <!-- Block 5: Dedicated Newsletter Section -->
    <section class="py-16 md:py-24 bg-[#FBF9F4]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:newsletter-form source="homepage_bottom" />
        </div>
    </section>

</x-layouts.app>
