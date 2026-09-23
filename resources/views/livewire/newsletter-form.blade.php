@if($source === 'footer')
    <!-- Compact Dark Footer Newsletter Form -->
    <div class="w-full space-y-3">
        @if($subscribed)
            <div class="p-3.5 bg-[#82FF9E]/20 border border-[#82FF9E]/40 text-white rounded-[8px] font-sans text-xs flex items-center gap-2.5">
                <span class="w-4 h-4 rounded-full bg-[#82FF9E] text-[#061A40] flex items-center justify-center font-bold text-[10px] flex-shrink-0">&check;</span>
                <span>Thank you! You have joined The Inner Circle.</span>
            </div>
        @else
            <form wire:submit.prevent="subscribe" class="space-y-2.5">
                <div class="flex flex-col sm:flex-row gap-2">
                    <label for="newsletter-email-{{ $source }}" class="sr-only">
                        Email address
                    </label>
                    <input
                        id="newsletter-email-{{ $source }}"
                        name="email"
                        type="email"
                        wire:model="email"
                        autocomplete="email"
                        placeholder="Your email address"
                        required
                        class="w-full px-3.5 py-2.5 rounded-[8px] bg-white/10 border border-white/20 text-white placeholder-white/50 text-xs font-sans focus:outline-none focus:border-[#EAC435] focus:ring-1 focus:ring-[#EAC435] transition-colors"
                    />
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="subscribe"
                        class="px-4 py-2.5 rounded-[8px] bg-[#EAC435] text-[#061A40] font-sans font-semibold text-xs whitespace-nowrap hover:bg-[#dfb728] transition-colors disabled:opacity-60 flex items-center justify-center gap-1.5 shadow-sm"
                    >
                        <span wire:loading.remove wire:target="subscribe">Subscribe</span>
                        <span wire:loading wire:target="subscribe">Joining…</span>
                    </button>
                </div>
                @error('email')
                    <p class="text-[11px] text-rose-300 text-left" role="alert">{{ $message }}</p>
                @enderror
            </form>
        @endif
    </div>
@else
    <!-- Full Open 2-Column Editorial Newsletter Section (Good Trade Composition + Achieving Vision Identity) -->
    <div class="w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center gap-10 lg:gap-14">
            
            <!-- Left Column: Editorial Value Proposition & Form -->
            <div class="lg:col-span-7 text-left space-y-5">
                
                <!-- Eyebrow Label with Saffron Dot Accent -->
                <div class="inline-flex items-center gap-2 font-sans text-xs font-semibold uppercase tracking-[0.16em] text-[#061A40]">
                    <span class="h-2 w-2 rounded-full bg-[#EAC435]"></span>
                    <span>The Inner Circle</span>
                </div>

                <!-- Main Headline (Fraunces Weight 400) -->
                <h2 class="font-display text-3xl sm:text-4xl lg:text-[2.75rem] font-normal leading-[1.08] tracking-tight text-[#061A40]">
                    A clearer way forward, once a week.
                </h2>

                <!-- Core Value Statement in Work Sans -->
                <p class="font-sans text-base sm:text-lg text-[#061A40]/80 leading-relaxed max-w-xl">
                    Receive one practical idea, reflection, or framework each week to help turn the vision you carry into work you can build and finish.
                </p>

                <!-- Form / Success State -->
                @if($subscribed)
                    <div class="p-5 bg-[#82FF9E]/20 border border-[#82FF9E] text-[#061A40] rounded-[8px] font-sans text-sm flex items-start gap-3 shadow-sm max-w-xl">
                        <span class="w-5 h-5 rounded-full bg-[#82FF9E] text-[#061A40] flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5">&check;</span>
                        <div class="space-y-0.5">
                            <strong class="font-semibold block">You're in the Inner Circle!</strong>
                            <p class="text-xs text-[#061A40]/80">We have sent a welcome message to your inbox. Look out for your first practical framework this week.</p>
                        </div>
                    </div>
                @else
                    <form wire:submit.prevent="subscribe" class="pt-2 max-w-xl">
                        <label for="newsletter-email-{{ $source }}" class="sr-only">
                            Email address
                        </label>

                        <div class="flex flex-col sm:flex-row gap-3">
                            <input
                                id="newsletter-email-{{ $source }}"
                                name="email"
                                type="email"
                                wire:model="email"
                                autocomplete="email"
                                placeholder="Your email address"
                                required
                                class="min-h-12 flex-1 rounded-[8px] border border-[#061A40]/30 bg-white px-4 font-sans text-sm text-[#061A40] placeholder:text-[#061A40]/45 focus:border-[#2D7DD2] focus:outline-none focus:ring-2 focus:ring-[#2D7DD2]/25 shadow-sm transition-colors"
                            />

                            <button
                                type="submit"
                                wire:loading.attr="disabled"
                                wire:target="subscribe"
                                class="min-h-12 rounded-[8px] bg-[#EAC435] px-6 font-sans text-sm font-semibold text-[#061A40] transition-colors hover:bg-[#dfb728] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#061A40] disabled:cursor-wait disabled:opacity-60 shadow-sm flex items-center justify-center gap-2 whitespace-nowrap"
                            >
                                <span wire:loading.remove wire:target="subscribe">
                                    Join the Inner Circle
                                </span>
                                <span wire:loading wire:target="subscribe" class="flex items-center gap-2">
                                    <svg class="animate-spin h-4 w-4 text-[#061A40]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    <span>Joining…</span>
                                </span>
                            </button>
                        </div>

                        @error('email')
                            <p class="mt-2 font-sans text-xs text-rose-600 text-left" role="alert">
                                {{ $message }}
                            </p>
                        @enderror

                        <p class="mt-3.5 font-sans text-xs text-[#061A40]/65">
                            No spam. Unsubscribe anytime.
                        </p>
                    </form>
                @endif

            </div>

            <!-- Right Column: Editorial Newsletter Mockup / Preview Card -->
            <div class="lg:col-span-5 flex justify-center lg:justify-end">
                <div class="w-full max-w-sm bg-white border border-[#061A40]/15 rounded-[8px] p-6 sm:p-7 shadow-lg relative overflow-hidden transform hover:-translate-y-0.5 transition-transform">
                    
                    <!-- Card Header -->
                    <div class="flex items-center justify-between pb-4 border-b border-[#061A40]/10 text-[10px] font-mono uppercase tracking-wider text-[#061A40]/60">
                        <span class="flex items-center gap-1.5 font-semibold text-[#061A40]">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#EAC435]"></span>
                            ISSUE NO. 48
                        </span>
                        <span>WEEKLY DISPATCH</span>
                    </div>

                    <!-- Preview Article Content -->
                    <div class="py-5 space-y-3">
                        <span class="text-[10px] font-mono uppercase tracking-widest text-[#2D7DD2] font-semibold">
                            // THE ART OF FINISHING
                        </span>
                        <h3 class="font-display font-medium text-xl text-[#061A40] leading-snug">
                            "The Discipline of the Unfinished Draft"
                        </h3>
                        <p class="font-sans text-xs text-[#061A40]/75 leading-relaxed">
                            Why high achievers abandon 80% completed projects, and the 3-step ritual to push through the resistance gap.
                        </p>
                    </div>

                    <!-- Framework Preview Box -->
                    <div class="p-3.5 bg-[#FBF9F4] border border-[#061A40]/10 rounded-[6px] space-y-1.5">
                        <div class="flex items-center justify-between text-[10px] font-mono text-[#061A40]/60">
                            <span>THIS WEEK'S FRAMEWORK</span>
                            <span class="text-[#2D7DD2] font-semibold">3 MIN READ</span>
                        </div>
                        <p class="font-display italic text-xs text-[#061A40] leading-snug">
                            "Starting is exciting, but finishing is where transformation lives."
                        </p>
                    </div>

                    <!-- Card Footer Signature -->
                    <div class="mt-4 pt-3 border-t border-[#061A40]/10 flex items-center justify-between text-[11px]">
                        <span class="font-display font-semibold text-[#061A40]">Oghale &bull; Author</span>
                        <span class="font-mono text-[#2D7DD2] text-[10px] font-semibold">ACHIEVEWITHOGHALE.COM</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endif
