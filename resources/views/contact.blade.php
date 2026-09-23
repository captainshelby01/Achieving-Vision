<x-layouts.app title="Contact Oghale & Achieving Vision — Inquiries & Speaking" description="Get in touch with author Oghale for speaking engagements, media requests, bulk book orders, or general guidance questions.">

    <!-- Contact Header -->
    <section class="py-16 md:py-24 bg-[#FBF9F4] border-b border-[#E5DFC9]/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#061A40]/5 border border-[#061A40]/10 text-[#061A40] text-xs font-semibold tracking-wide uppercase">
                <span class="w-2 h-2 rounded-full bg-[#EAC435]"></span>
                Get In Touch &bull; Connect
            </div>

            <h1 class="font-display font-semibold text-4xl sm:text-5xl lg:text-6xl text-[#061A40] leading-[1.12] tracking-tight">
                Let's Start a Conversation
            </h1>

            <p class="font-sans text-lg sm:text-xl text-[#061A40]/80 leading-relaxed">
                Whether you want to book Oghale for a keynote, discuss book distribution, or ask a question about the guides, we are here to help.
            </p>

            <div class="pt-2 flex flex-wrap items-center gap-4 text-xs font-semibold text-[#2D7DD2]">
                <span class="badge-type bg-[#EAC435] text-[#061A40]">Direct Channels</span>
                <span>&bull;</span>
                <span class="font-display italic text-sm text-[#061A40]">"Practical guidance for builders worldwide"</span>
            </div>

        </div>
    </section>

    <!-- Main Contact Section (Form + Information Column) -->
    <section class="py-16 md:py-24 bg-[#FBF9F4] border-b border-[#E5DFC9]/80">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Left: Contact Form -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="space-y-2">
                        <h2 class="font-display font-semibold text-2xl sm:text-3xl text-[#061A40]">
                            Send a Direct Inquiry
                        </h2>
                        <p class="text-xs sm:text-sm text-[#061A40]/70">
                            Fill out the details below. We review every note personally and reply within 2 business days.
                        </p>
                    </div>

                    <livewire:contact-form />
                </div>

                <!-- Right: Information & FAQ Cards -->
                <div class="lg:col-span-5 space-y-6">
                    
                    <!-- Direct Channels Box -->
                    <div class="bg-[#F5F1E8] border border-[#E5DFC9] rounded-2xl p-6 sm:p-8 space-y-6">
                        <h3 class="font-display font-semibold text-xl text-[#061A40]">
                            Contact Details
                        </h3>

                        <div class="space-y-4 text-sm text-[#061A40]/80 font-sans">
                            <div class="flex items-start gap-3.5">
                                <div class="w-8 h-8 rounded-lg bg-[#061A40] text-[#EAC435] flex items-center justify-center font-bold text-xs flex-shrink-0">
                                    @
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[#061A40] text-xs uppercase tracking-wider">General & Media</h4>
                                    <p class="text-sm font-medium text-[#2D7DD2]">contact@achievingvision.com</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-8 h-8 rounded-lg bg-[#061A40] text-[#EAC435] flex items-center justify-center font-bold text-xs flex-shrink-0">
                                    &bull;
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[#061A40] text-xs uppercase tracking-wider">Speaking & Keynotes</h4>
                                    <p class="text-sm font-medium text-[#2D7DD2]">speaking@achievingvision.com</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-8 h-8 rounded-lg bg-[#061A40] text-[#EAC435] flex items-center justify-center font-bold text-xs flex-shrink-0">
                                    #
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[#061A40] text-xs uppercase tracking-wider">Response Time</h4>
                                    <p class="text-xs text-[#061A40]/70">Monday to Friday within 48 hours.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Guidance for Common Inquiries -->
                    <div class="bg-[#061A40] text-white rounded-2xl p-6 sm:p-8 space-y-4 shadow-inner">
                        <h3 class="font-display font-semibold text-lg text-[#EAC435]">
                            Quick Inquiry Guidelines
                        </h3>

                        <ul class="space-y-3 text-xs text-white/80 font-sans">
                            <li class="flex items-start gap-2">
                                <span class="text-[#EAC435] font-bold">&check;</span>
                                <span><strong>Keynote Requests:</strong> Include expected date, location, audience size, and primary theme.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[#EAC435] font-bold">&check;</span>
                                <span><strong>Bulk Book Orders:</strong> Specify desired quantity and target delivery timeline.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[#EAC435] font-bold">&check;</span>
                                <span><strong>Media & Podcasts:</strong> Please share your show link and target recording dates.</span>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </section>

</x-layouts.app>