<div>
    <button 
        wire:click="toggleLike" 
        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full border transition-all text-xs font-semibold {{ $hasLiked ? 'bg-[#2D7DD2] text-white border-[#2D7DD2]' : 'bg-white text-[#061A40] border-[#E5DFC9] hover:bg-[#F5F1E8]' }}"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 {{ $hasLiked ? 'fill-white stroke-white' : 'fill-none stroke-current' }}" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/>
        </svg>
        <span>{{ $hasLiked ? 'This helped me' : 'Helpful' }} ({{ $likesCount }})</span>
    </button>
</div>
