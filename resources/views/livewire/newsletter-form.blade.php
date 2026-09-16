<!-- Dedicated Newsletter Section (Inspired by Editorial Standards) -->
<div class="bg-[#F5F1E8] border border-[#E5DFC9] rounded-2xl p-8 sm:p-12 shadow-sm relative overflow-hidden">
    <div class="max-w-2xl mx-auto text-center space-y-6">
        
        <!-- Header -->
        <div class="space-y-3">
            <span class="badge-type bg-[#061A40] text-white">
                THE INNER CIRCLE
            </span>
            
            <h2 class="font-display font-semibold text-3xl sm:text-4xl text-[#061A40]">
                A clearer way forward, once a week.
            </h2>

            <p class="font-sans text-base text-[#061A40]/80 leading-relaxed">
                Receive one practical idea, reflection, or framework to help you make steady progress on meaningful work.
            </p>
        </div>

        <!-- Form / Success State -->
        @if($subscribed)
            <div class="p-5 bg-[#82FF9E]/20 border border-[#82FF9E] text-[#061A40] rounded-xl font-medium text-sm">
                Thank you for joining the inner circle! We have sent a welcome email to your inbox.
            </div>
        @else
            <form wire:submit.prevent="subscribe" class="space-y-3 max-w-md mx-auto">
                <div class="flex flex-col sm:flex-row gap-3">
                    <input 
                        type="email" 
                        wire:model="email" 
                        placeholder="Enter your email address" 
                        required 
                        class="px-4 py-3 bg-white rounded-lg border border-[#E5DFC9] flex-1 text-[#061A40] placeholder-[#061A40]/40 text-sm focus:outline-none focus:ring-2 focus:ring-[#EAC435] shadow-sm"
                    />
                    <button 
                        type="submit" 
                        class="btn-primary text-sm whitespace-nowrap"
                    >
                        Subscribe
                    </button>
                </div>
                @error('email')
                    <p class="text-xs text-rose-600 text-left">{{ $message }}</p>
                @enderror
            </form>
        @endif

        <!-- Reassurance Subtext -->
        <p class="text-xs text-[#061A40]/60 font-medium pt-1">
            No spam. Unsubscribe anytime.
        </p>

    </div>
</div>
