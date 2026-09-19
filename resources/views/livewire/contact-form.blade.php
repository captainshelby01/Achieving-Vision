<div class="bg-white border border-[#E5DFC9] rounded-2xl p-6 sm:p-10 shadow-sm">
    @if($submitted)
        <div class="bg-[#82FF9E]/20 border border-[#82FF9E]/40 rounded-xl p-6 text-center space-y-3">
            <div class="w-12 h-12 rounded-full bg-[#82FF9E]/40 text-[#061A40] flex items-center justify-center mx-auto text-xl font-bold font-display">
                &check;
            </div>
            <h3 class="font-display font-semibold text-xl text-[#061A40]">
                Thank You for Reaching Out
            </h3>
            <p class="font-sans text-sm text-[#061A40]/80 leading-relaxed max-w-md mx-auto">
                We have received your message. Our team will review your inquiry and respond within 2 business days.
            </p>
            <div class="pt-2">
                <button 
                    wire:click="resetForm" 
                    type="button"
                    class="btn-secondary text-xs py-2 px-5"
                >
                    Send Another Message
                </button>
            </div>
        </div>
    @else
        <form wire:submit.prevent="submit" class="space-y-6">
            
            <!-- Inquiry Subject Type -->
            <div class="space-y-2">
                <label class="block font-display font-medium text-sm text-[#061A40]">
                    What can we help you with? <span class="text-[#2D7DD2]">*</span>
                </label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <label class="flex items-center gap-3 p-3.5 rounded-xl border cursor-pointer transition-all {{ $subject_type === 'general' ? 'border-[#061A40] bg-[#061A40]/5 ring-1 ring-[#061A40]' : 'border-[#E5DFC9] hover:bg-[#FBF9F4]' }}">
                        <input type="radio" wire:model.live="subject_type" value="general" class="text-[#061A40] focus:ring-[#EAC435]">
                        <div class="text-xs font-medium text-[#061A40]">
                            <span class="font-semibold block">General Inquiry</span>
                            <span class="text-[#061A40]/70 text-[11px]">Questions or feedback</span>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3.5 rounded-xl border cursor-pointer transition-all {{ $subject_type === 'speaking' ? 'border-[#061A40] bg-[#061A40]/5 ring-1 ring-[#061A40]' : 'border-[#E5DFC9] hover:bg-[#FBF9F4]' }}">
                        <input type="radio" wire:model.live="subject_type" value="speaking" class="text-[#061A40] focus:ring-[#EAC435]">
                        <div class="text-xs font-medium text-[#061A40]">
                            <span class="font-semibold block">Speaking & Keynotes</span>
                            <span class="text-[#061A40]/70 text-[11px]">Events and workshops</span>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3.5 rounded-xl border cursor-pointer transition-all {{ $subject_type === 'books' ? 'border-[#061A40] bg-[#061A40]/5 ring-1 ring-[#061A40]' : 'border-[#E5DFC9] hover:bg-[#FBF9F4]' }}">
                        <input type="radio" wire:model.live="subject_type" value="books" class="text-[#061A40] focus:ring-[#EAC435]">
                        <div class="text-xs font-medium text-[#061A40]">
                            <span class="font-semibold block">Books & Bulk Orders</span>
                            <span class="text-[#061A40]/70 text-[11px]">Orders and distribution</span>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3.5 rounded-xl border cursor-pointer transition-all {{ $subject_type === 'press' ? 'border-[#061A40] bg-[#061A40]/5 ring-1 ring-[#061A40]' : 'border-[#E5DFC9] hover:bg-[#FBF9F4]' }}">
                        <input type="radio" wire:model.live="subject_type" value="press" class="text-[#061A40] focus:ring-[#EAC435]">
                        <div class="text-xs font-medium text-[#061A40]">
                            <span class="font-semibold block">Media & Interviews</span>
                            <span class="text-[#061A40]/70 text-[11px]">Press and podcasts</span>
                        </div>
                    </label>
                </div>
                @error('subject_type') <p class="text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Name and Email Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="name" class="block font-sans text-xs font-semibold text-[#061A40]">
                        Your Name <span class="text-[#2D7DD2]">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model="name" 
                        placeholder="e.g. Alex Morgan"
                        class="w-full px-4 py-2.5 rounded-xl border border-[#E5DFC9] bg-[#FBF9F4] text-sm text-[#061A40] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#061A40] transition-colors"
                    />
                    @error('name') <p class="text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5">
                    <label for="email" class="block font-sans text-xs font-semibold text-[#061A40]">
                        Email Address <span class="text-[#2D7DD2]">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        wire:model="email" 
                        placeholder="alex@example.com"
                        class="w-full px-4 py-2.5 rounded-xl border border-[#E5DFC9] bg-[#FBF9F4] text-sm text-[#061A40] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#061A40] transition-colors"
                    />
                    @error('email') <p class="text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Message Field -->
            <div class="space-y-1.5">
                <label for="message" class="block font-sans text-xs font-semibold text-[#061A40]">
                    Your Message <span class="text-[#2D7DD2]">*</span>
                </label>
                <textarea 
                    id="message" 
                    wire:model="message" 
                    rows="5" 
                    placeholder="Please provide details about your project, speaking date, or question..."
                    class="w-full px-4 py-3 rounded-xl border border-[#E5DFC9] bg-[#FBF9F4] text-sm text-[#061A40] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#061A40] transition-colors resize-y"
                ></textarea>
                <div class="flex justify-between items-center text-[11px] text-[#061A40]/60">
                    <span>Please write in plain English. No em dashes allowed.</span>
                    <span>Max 2000 chars</span>
                </div>
                @error('message') <p class="text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button 
                    type="submit" 
                    class="btn-primary w-full sm:w-auto text-xs py-3.5 px-8 flex items-center justify-center gap-2"
                >
                    <span>Send Message</span>
                    <span>&rarr;</span>
                </button>
            </div>

        </form>
    @endif
</div>