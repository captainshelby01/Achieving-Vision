<div>
    @if($subscribed)
        <div class="p-4 bg-emerald-100 text-emerald-800 rounded-md font-medium">
            Thank you for joining the inner circle! Check your inbox for your welcome email.
        </div>
    @else
        <form wire:submit.prevent="subscribe" class="flex flex-col sm:flex-row gap-3">
            <input 
                type="email" 
                wire:model="email" 
                placeholder="Enter your email address" 
                required 
                class="px-4 py-3 rounded-lg border border-slate-300 flex-1 text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-400"
            />
            <button 
                type="submit" 
                class="px-6 py-3 bg-amber-400 text-slate-900 font-semibold rounded-lg hover:bg-amber-500 transition-colors"
            >
                Subscribe
            </button>
        </form>
        @error('email')
            <p class="text-xs text-rose-500 mt-2">{{ $message }}</p>
        @enderror
    @endif
</div>
