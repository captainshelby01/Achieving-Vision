@props(['position' => 'in-article', 'slotId' => null])

<!-- Google AdSense / Sponsor Slot Container (Zero Layout Shift CLS Protected) -->
<div class="my-10 p-6 bg-[#F5F1E8]/70 border border-[#E5DFC9] rounded-2xl text-center relative overflow-hidden">
    <div class="text-[10px] font-sans font-bold uppercase tracking-widest text-[#061A40]/40 mb-3">
        Advertisement &bull; Partner Resource
    </div>
    
    @if(env('GOOGLE_ADSENSE_CLIENT_ID') && ($slotId || env('GOOGLE_ADSENSE_SLOT_ID')))
        <!-- Live Google AdSense Unit -->
        <ins class="adsbygoogle"
             style="display:block; min-height: 120px;"
             data-ad-client="{{ env('GOOGLE_ADSENSE_CLIENT_ID') }}"
             data-ad-slot="{{ $slotId ?? env('GOOGLE_ADSENSE_SLOT_ID') }}"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    @else
        <!-- Curated Sponsorship Placeholder -->
        <div class="min-h-[120px] sm:min-h-[140px] flex flex-col items-center justify-center border border-dashed border-[#E5DFC9] rounded-xl bg-white/60 p-4">
            <span class="font-display italic text-sm text-[#061A40]/60">
                Achieving Vision Curated Sponsorship Space
            </span>
            <span class="text-xs text-[#061A40]/40 mt-1 font-sans">
                Relevant tools and resources for ambitious dreamers
            </span>
        </div>
    @endif
</div>
