<div>
    <button 
        wire:click="toggleLike" 
        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full border transition-all text-xs font-semibold {{ $hasLiked ? 'bg-[#2D7DD2] text-white border-[#2D7DD2]' : 'bg-white text-[#061A40] border-[#061A40]/15 hover:bg-slate-50' }}"
    >
        @if($hasLiked)
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill w-4 h-4" viewBox="0 0 16 16">
                <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.863.22 1.401.996 1.309 1.884l-.307 2.97h2.822c1.077 0 1.907.956 1.737 2.02l-1.127 7.042A2 2 0 0 1 11.612 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2.51a2 2 0 0 1 1.704-.954zM2 8v6h1V8zm3 6h6.612a1 1 0 0 0 .984-.842l1.127-7.042a1 1 0 0 0-.984-1.158H9.914l.43-4.164a.8.8 0 0 0-.46-.864.8.8 0 0 0-.82.164L5.342 7.215A1 1 0 0 0 5 7.93z"/>
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up w-4 h-4" viewBox="0 0 16 16">
                <path d="M8.864.046C7.901-.145 7 .48 7 1.442v3.743L5.498 7H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h8.791a2 2 0 0 0 1.932-1.468l1.79-6.42A2 2 0 0 0 10.638 6H8V1.774a.8.8 0 0 1 .864-.728M2 8h3v7H2zM8.47 7H10.638a1 1 0 0 1 .966 1.28l-1.79 6.42a1 1 0 0 1-.966.734H6V8.127l1.76-2.515z"/>
            </svg>
        @endif
        <span>{{ $hasLiked ? 'This helped me' : 'Helpful' }} ({{ $likesCount }})</span>
    </button>
</div>
