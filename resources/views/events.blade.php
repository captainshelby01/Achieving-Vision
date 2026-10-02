<x-layouts.app title="Events & Speaking Engagements — Achieving Vision" description="Join author Oghale for upcoming live masterclasses, webinars, and speaking events on vision execution and finishing what you start.">

    <!-- Events Page Header -->
    <section class="py-16 md:py-24 bg-white border-b border-[#061A40]/10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <div class="flex flex-wrap items-center gap-2.5">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#061A40]/5 border border-[#061A40]/10 text-[#061A40] text-xs font-semibold tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#EAC435]"></span>
                    Live &bull; Online Masterclasses &bull; Speaking
                </div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#82FF9E]/25 text-[#061A40] text-xs font-semibold border border-[#82FF9E]/60 shadow-xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#82FF9E]"></span>
                    <span>Live Sessions</span>
                </div>
            </div>

            <h1 class="font-display font-semibold text-4xl sm:text-5xl lg:text-6xl text-[#061A40] leading-[1.12] tracking-tight">
                Speaking Engagements & Live Events
            </h1>

            <p class="font-sans text-lg sm:text-xl text-[#061A40]/80 leading-relaxed">
                Join author Oghale for live masterclasses, interactive webinars, and fireside sessions dedicated to practical vision execution.
            </p>

            <div class="pt-2 flex flex-wrap items-center gap-4 text-xs font-semibold text-[#2D7DD2]">
                <span class="badge-type bg-[#EAC435] text-[#061A40]">Interactive Sessions</span>
                <span>&bull;</span>
                <span class="font-display italic text-sm text-[#061A40]">"Practical guidance for builders worldwide"</span>
            </div>

        </div>
    </section>

    <!-- Upcoming Events Schedule List -->
    <section class="py-16 md:py-20 bg-white border-b border-[#061A40]/10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            
            <div class="flex items-center justify-between pb-4 border-b border-[#061A40]/10">
                <div>
                    <h2 class="font-display font-semibold text-2xl sm:text-3xl text-[#061A40]">
                        Upcoming Schedule
                    </h2>
                    <p class="text-xs text-[#061A40]/70 mt-1">
                        Register for upcoming sessions or add them to your calendar.
                    </p>
                </div>

                <span class="px-3.5 py-1 rounded-full bg-[#061A40]/10 text-[#061A40] text-xs font-semibold">
                    {{ $events->count() }} {{ Str::plural('Event', $events->count()) }} Scheduled
                </span>
            </div>

            <!-- Event Cards Grid -->
            <div class="space-y-6">
                @forelse($events as $event)
                    <article class="bg-white border border-[#061A40]/10 rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow flex flex-col md:flex-row md:items-center justify-between gap-6 group">
                        
                        <!-- Left: Date & Time Pill -->
                        <div class="flex md:flex-col items-center justify-center bg-[#061A40] text-white p-4 rounded-xl min-w-[120px] text-center flex-shrink-0 shadow-inner">
                            <span class="text-xs uppercase tracking-widest text-[#EAC435] font-bold">
                                {{ $event->event_date->format('M') }}
                            </span>
                            <span class="font-display font-bold text-3xl text-white">
                                {{ $event->event_date->format('d') }}
                            </span>
                            <span class="text-[11px] text-white/70">
                                {{ $event->event_date->format('Y') }}
                            </span>
                        </div>

                        <!-- Center: Event Details -->
                        <div class="flex-1 space-y-2">
                            <div class="flex flex-wrap items-center gap-2">
                                @if($event->is_featured)
                                    <span class="badge-type bg-[#EAC435] text-[#061A40] text-[10px]">
                                        Featured Masterclass
                                    </span>
                                @endif
                                
                                <span class="inline-flex items-center gap-1.5 text-xs text-[#2D7DD2] font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-geo-alt w-3.5 h-3.5" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                    <span>{{ $event->location }}</span>
                                </span>
                            </div>

                            <h3 class="font-display font-semibold text-xl sm:text-2xl text-[#061A40] group-hover:text-[#2D7DD2] transition-colors">
                                {{ $event->title }}
                            </h3>

                            <p class="font-sans text-sm text-[#061A40]/80 leading-relaxed max-w-2xl">
                                {{ $event->description }}
                            </p>
                        </div>

                        <!-- Right: Action CTA -->
                        <div class="flex-shrink-0 pt-2 md:pt-0">
                            @if($event->external_link)
                                <a 
                                    href="{{ $event->external_link }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer" 
                                    class="btn-primary text-xs py-2.5 px-6 whitespace-nowrap"
                                >
                                    <span>Reserve Spot</span>
                                    <span>&rarr;</span>
                                </a>
                            @else
                                <a href="{{ route('contact') }}" class="btn-secondary text-xs py-2 px-5 whitespace-nowrap">
                                    <span>Inquire &bull; RSVP</span>
                                </a>
                            @endif
                        </div>

                    </article>
                @empty
                    <div class="bg-white border border-[#061A40]/10 rounded-2xl p-12 text-center shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-[#82FF9E]/30 text-[#061A40] flex items-center justify-center mx-auto mb-4 font-display font-bold text-xl border border-[#82FF9E]/60">&bull;</div>
                        <h4 class="font-display font-semibold text-lg text-[#061A40] mb-2">No Upcoming Events Right Now</h4>
                        <p class="text-sm text-[#061A40]/70 max-w-md mx-auto mb-6">
                            New speaking dates and masterclasses will be announced shortly. Join the inner circle to get early access.
                        </p>
                        <a href="{{ route('newsletter') }}" class="btn-primary text-xs py-2.5 px-6">
                            Join Newsletter for Updates
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- Speaking Inquiries Box (For Conferences & Workshops) -->
    <section class="py-16 md:py-24 bg-white border-b border-[#061A40]/10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-[#061A40]/10 rounded-3xl p-8 sm:p-12 shadow-sm grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                
                <div class="md:col-span-8 space-y-4">
                    <span class="badge-type bg-[#2D7DD2]/10 text-[#2D7DD2]">Book Oghale for Speaking</span>
                    
                    <h2 class="font-display font-semibold text-2xl sm:text-3xl text-[#061A40]">
                        Invite Oghale to Speak at Your Event
                    </h2>

                    <p class="font-sans text-sm sm:text-base text-[#061A40]/80 leading-relaxed">
                        Oghale delivers practical keynote presentations and workshops for organizations, leadership retreats, and conferences. Key topics include vision follow-through, overcoming comparison traps, and high-impact execution.
                    </p>

                    <div class="pt-2">
                        <a href="{{ route('contact') }}" class="btn-primary text-xs py-3 px-6">
                            <span>Submit Speaking Inquiry</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-4 bg-[#061A40] text-white rounded-2xl p-6 space-y-4 shadow-inner">
                    <h4 class="font-display font-semibold text-base text-[#EAC435]">Core Keynote Topics:</h4>
                    <ul class="space-y-2.5 text-xs text-white/80 font-sans">
                        <li class="flex items-start gap-2">
                            <span class="text-[#EAC435] font-bold">&check;</span>
                            <span>The Architecture of Follow-Through</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#EAC435] font-bold">&check;</span>
                            <span>Building Transgenerational Outcomes</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#EAC435] font-bold">&check;</span>
                            <span>Sustaining Momentum in Isolation</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

</x-layouts.app>

