@if($source === 'footer')
    <!-- Distinct Dark Footer Newsletter Form -->
    <div class="w-full">
        @if($subscribed)
            <div class="p-4 bg-[#82FF9E]/15 border border-[#82FF9E]/40 text-white rounded-xl font-sans text-xs sm:text-sm flex items-start gap-3 shadow-inner">
                <span class="w-5 h-5 rounded-full bg-[#82FF9E] text-[#061A40] flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5">&check;</span>
                <div class="space-y-0.5">
                    <strong class="font-semibold block text-white text-sm">Welcome to The Inner Circle!</strong>
                    <p class="text-xs text-white/75">We've saved your spot. Look out for practical guidance and frameworks in your inbox.</p>
                </div>
            </div>
        @else
            <form wire:submit.prevent="subscribe" class="space-y-2.5">
                <div class="flex flex-col sm:flex-row gap-2">
                    <div class="relative flex-1">
                        <label for="newsletter-email-{{ $source }}" class="sr-only">Email address</label>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-white/40">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input
                            id="newsletter-email-{{ $source }}"
                            name="email"
                            type="email"
                            wire:model="email"
                            autocomplete="email"
                            placeholder="Enter your email address"
                            required
                            class="w-full pl-9 pr-3.5 py-2.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/45 text-xs sm:text-sm font-sans focus:outline-none focus:border-[#EAC435] focus:ring-2 focus:ring-[#EAC435]/30 transition-all shadow-inner"
                        />
                    </div>
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="subscribe"
                        class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#EAC435] text-[#061A40] font-sans font-bold text-xs uppercase tracking-wider hover:bg-[#ebd061] transition-all disabled:opacity-60 flex items-center justify-center gap-1.5 shadow-sm hover:shadow-md cursor-pointer whitespace-nowrap active:scale-98"
                    >
                        <span wire:loading.remove wire:target="subscribe" class="flex items-center gap-1.5">
                            <span>Subscribe</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                        <span wire:loading wire:target="subscribe" class="flex items-center gap-1.5">
                            <svg class="animate-spin h-3.5 w-3.5 text-[#061A40]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            <span>Joining…</span>
                        </span>
                    </button>
                </div>
                @error('email')
                    <p class="text-[11px] text-rose-300 text-left font-sans" role="alert">{{ $message }}</p>
                @enderror
                <div class="flex items-center text-[11px] text-white/50 pt-0.5 font-sans">
                    <span class="flex items-center gap-1">
                        <svg class="w-3 h-3 text-[#82FF9E]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span>No spam. Unsubscribe anytime.</span>
                    </span>
                </div>
            </form>
        @endif
    </div>

@elseif($source === 'subhero_card')
    <!-- Sub-Hero 5-Block Left Column Card Form (Name + Email) -->
    <div class="p-6 sm:p-10 lg:p-14 flex flex-col justify-between space-y-6 sm:space-y-8 bg-white h-full">
        <div class="space-y-4 sm:space-y-5">
            <!-- Eyebrow Pill Badge -->
            <div class="flex flex-wrap items-center gap-2">
                <span class="inline-flex items-center gap-2 text-xs font-mono tracking-widest uppercase text-[#2D7DD2] font-semibold">
                    // THE INNER CIRCLE
                </span>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#82FF9E]/25 text-[#061A40] text-[10px] font-bold border border-[#82FF9E]/60 shadow-xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#82FF9E] ring-2 ring-[#061A40]/10"></span>
                    <span>WEEKLY DISPATCH</span>
                </span>
            </div>

            <!-- Main Headline -->
            <h2 class="font-display font-medium text-2xl sm:text-3xl lg:text-[2.35rem] text-[#061A40] leading-[1.12] tracking-tight">
                Practical Direction at the Intersection of Vision &amp; Execution.
            </h2>

            <p class="text-xs sm:text-base text-[#061A40]/80 leading-relaxed font-sans">
                Starting is exciting, but finishing is where transformation happens. Join the Inner Circle for one practical idea, reflection, or framework each week to help turn big vision into finished reality.
            </p>
        </div>

        <!-- Form / State Section -->
        <div class="space-y-4 pt-4 border-t border-[#061A40]/10">
            @if($subscribed)
                <div class="p-5 bg-[#82FF9E]/20 border border-[#82FF9E] text-[#061A40] rounded-[8px] font-sans text-xs sm:text-sm flex items-start gap-3 shadow-sm">
                    <span class="w-5 h-5 rounded-full bg-[#82FF9E] text-[#061A40] flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5">&check;</span>
                    <div class="space-y-1">
                        <strong class="font-semibold block text-sm">You're in the Inner Circle!</strong>
                        <p class="text-xs text-[#061A40]/80">We have sent a welcome dispatch to your inbox. Look out for your first framework this week.</p>
                    </div>
                </div>
            @else
                <form wire:submit.prevent="subscribe" class="space-y-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label for="subhero-name" class="sr-only">First Name</label>
                            <input
                                id="subhero-name"
                                name="name"
                                type="text"
                                wire:model="name"
                                placeholder="Your name"
                                required
                                class="w-full px-4 py-3 rounded-[8px] border border-[#061A40]/25 bg-white font-sans text-xs sm:text-sm text-[#061A40] placeholder:text-[#061A40]/45 focus:border-[#2D7DD2] focus:outline-none focus:ring-2 focus:ring-[#2D7DD2]/25 shadow-xs transition-colors"
                            />
                            @error('name')
                                <p class="mt-1 text-[11px] text-rose-600 text-left">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="subhero-email" class="sr-only">Email address</label>
                            <input
                                id="subhero-email"
                                name="email"
                                type="email"
                                wire:model="email"
                                placeholder="Your email address"
                                required
                                class="w-full px-4 py-3 rounded-[8px] border border-[#061A40]/25 bg-white font-sans text-xs sm:text-sm text-[#061A40] placeholder:text-[#061A40]/45 focus:border-[#2D7DD2] focus:outline-none focus:ring-2 focus:ring-[#2D7DD2]/25 shadow-xs transition-colors"
                            />
                            @error('email')
                                <p class="mt-1 text-[11px] text-rose-600 text-left">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-1 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            wire:target="subscribe"
                            class="btn-primary text-xs tracking-wider uppercase px-6 py-3 font-semibold text-center w-full sm:w-auto shadow-sm flex items-center justify-center gap-2"
                        >
                            <span wire:loading.remove wire:target="subscribe">Join Inner Circle</span>
                            <span wire:loading wire:target="subscribe" class="flex items-center gap-2">
                                <svg class="animate-spin h-3.5 w-3.5 text-[#061A40]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                <span>Joining…</span>
                            </span>
                        </button>
                        <a href="{{ route('about') }}" class="btn-secondary text-xs tracking-wider uppercase px-5 py-3 font-semibold text-center w-full sm:w-auto">
                            About Oghale
                        </a>
                    </div>
                </form>
            @endif

            <div class="flex items-center justify-between text-xs pt-2">
                <span class="font-mono text-[#061A40]/50">[PLATFORM STANCE]</span>
                <span class="font-display italic text-[#2D7DD2] font-semibold text-xs sm:text-sm">"Here's to Achieving Vision"</span>
            </div>
        </div>
    </div>

@else
    <!-- The Good Trade Reference Composition: Centered Editorial Statement + Pill Form Controls + Wavy Shape Frame -->
    <div class="w-full max-w-4xl mx-auto text-center px-4 sm:px-6 py-12 md:py-16">
        
        <!-- Eyebrow Badge Pill with Brand Palette -->
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#82FF9E]/25 border border-[#82FF9E]/60 text-[#061A40] text-xs font-semibold mb-6 shadow-xs">
            <span class="w-2 h-2 rounded-full bg-[#82FF9E] ring-2 ring-[#061A40]/10"></span>
            <span class="tracking-wide uppercase text-[11px] font-mono">The Inner Circle &bull; Weekly Dispatch</span>
        </div>

        <!-- Centered Editorial Headline (matching The Good Trade typography) -->
        <h2 class="font-display font-normal text-3xl sm:text-4xl md:text-5xl lg:text-[3.25rem] text-[#061A40] leading-[1.15] tracking-tight max-w-3xl mx-auto">
            A weekly dispatch delivered to your inbox featuring practical ideas, reflections, and frameworks to turn big vision into finished reality.
        </h2>

        <!-- Supporting Social Proof -->
        <p class="mt-6 font-sans text-base sm:text-lg text-[#061A40]/75 max-w-2xl mx-auto leading-relaxed">
            Join ambitious dreamers and builders worldwide who start their week with clear, actionable direction.
        </p>

        <!-- Newsletter Form Controls (Pill Inputs + Pill Button) -->
        <div class="mt-8 max-w-2xl mx-auto">
            @if($subscribed)
                <div class="p-6 bg-[#82FF9E]/25 border border-[#82FF9E] text-[#061A40] rounded-full font-sans text-sm sm:text-base flex items-center justify-center gap-3 shadow-sm">
                    <span class="w-6 h-6 rounded-full bg-[#82FF9E] text-[#061A40] flex items-center justify-center font-bold text-xs flex-shrink-0">&check;</span>
                    <span class="font-medium">You're in the Inner Circle! Check your inbox for your welcome dispatch.</span>
                </div>
            @else
                <form wire:submit.prevent="subscribe" class="space-y-4">
                    <div class="flex flex-col md:flex-row items-stretch md:items-center gap-3 justify-center">
                        <!-- Pill Name Input -->
                        <div class="flex-1">
                            <label for="newsletter-name-banner" class="sr-only">Your Name</label>
                            <input
                                id="newsletter-name-banner"
                                name="name"
                                type="text"
                                wire:model="name"
                                autocomplete="name"
                                placeholder="Your name"
                                required
                                class="w-full px-6 py-4 rounded-full border border-[#061A40]/30 bg-white font-sans text-sm text-[#061A40] placeholder:text-[#061A40]/45 focus:outline-none focus:border-[#2D7DD2] focus:ring-2 focus:ring-[#2D7DD2]/25 shadow-xs transition-all"
                            />
                        </div>

                        <!-- Pill Email Input -->
                        <div class="flex-1">
                            <label for="newsletter-email-banner" class="sr-only">Email address</label>
                            <input
                                id="newsletter-email-banner"
                                name="email"
                                type="email"
                                wire:model="email"
                                autocomplete="email"
                                placeholder="Email address"
                                required
                                class="w-full px-6 py-4 rounded-full border border-[#061A40]/30 bg-white font-sans text-sm text-[#061A40] placeholder:text-[#061A40]/45 focus:outline-none focus:border-[#2D7DD2] focus:ring-2 focus:ring-[#2D7DD2]/25 shadow-xs transition-all"
                            />
                        </div>

                        <!-- Pill Sign Up Button -->
                        <div>
                            <button
                                type="submit"
                                wire:loading.attr="disabled"
                                wire:target="subscribe"
                                class="w-full md:w-auto px-8 py-4 rounded-full bg-[#EAC435] text-[#061A40] font-sans font-bold text-xs uppercase tracking-wider hover:bg-[#dfb728] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#061A40] disabled:opacity-60 shadow-sm transition-all whitespace-nowrap flex items-center justify-center gap-2"
                            >
                                <span wire:loading.remove wire:target="subscribe">Sign Up</span>
                                <span wire:loading wire:target="subscribe" class="flex items-center gap-2">
                                    <svg class="animate-spin h-4 w-4 text-[#061A40]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    <span>Joining…</span>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Validation Errors -->
                    <div class="flex flex-col items-center gap-1 text-xs text-rose-600">
                        @error('name')
                            <p role="alert">{{ $message }}</p>
                        @enderror
                        @error('email')
                            <p role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <p class="font-sans text-xs text-[#061A40]/60 pt-1">
                        No spam. No promotional noise. Unsubscribe at any time.
                    </p>
                </form>
            @endif
        </div>

    </div>
@endif
