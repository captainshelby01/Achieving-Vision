<div>
    <button 
        wire:click="toggleLike" 
        class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-300 hover:border-slate-400 text-sm font-medium transition-colors {{ $hasLiked ? 'bg-amber-100 text-amber-900 border-amber-300' : 'text-slate-700' }}"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 {{ $hasLiked ? 'fill-amber-500 stroke-amber-500' : 'fill-none stroke-current' }}" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
        </svg>
        <span>{{ $likesCount }} {{ Str::plural('Like', $likesCount) }}</span>
    </button>
</div>
