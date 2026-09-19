<!-- Reader Discussion & Comments Section -->
<div class="mt-16 pt-12 border-t border-[#E5DFC9] space-y-10">
    
    <!-- Section Header with Count -->
    <div class="flex items-center justify-between">
        <h3 class="font-display font-semibold text-2xl text-[#061A40]">
            Reader Thoughts & Discussion
        </h3>
        <span class="px-3 py-1 rounded-full bg-[#061A40]/10 text-[#061A40] text-xs font-semibold">
            {{ $comments->count() }} {{ Str::plural('Thought', $comments->count()) }}
        </span>
    </div>

    <!-- Submission Form / Feedback Alert -->
    <div class="bg-[#F5F1E8] border border-[#E5DFC9] rounded-2xl p-6 sm:p-8 shadow-sm">
        @if($submitted)
            <div class="p-5 bg-[#82FF9E]/20 border border-[#82FF9E] text-[#061A40] rounded-xl font-medium text-sm text-center">
                Thank you for sharing your thoughts. Your comment has been submitted and will appear once approved by our moderation team.
            </div>
        @else
            <form wire:submit.prevent="submitComment" class="space-y-4">
                <h4 class="font-display font-semibold text-lg text-[#061A40]">
                    Join the Conversation
                </h4>
                <p class="text-xs text-[#061A40]/70">
                    Share your practical insights or questions. Punctuation and polite discourse are appreciated.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="author_name" class="block text-xs font-semibold text-[#061A40] mb-1">Your Name</label>
                        <input 
                            id="author_name"
                            type="text" 
                            wire:model="author_name" 
                            placeholder="e.g. Samuel" 
                            required 
                            class="w-full px-4 py-2.5 bg-white border border-[#E5DFC9] rounded-xl text-sm text-[#061A40] focus:outline-none focus:ring-2 focus:ring-[#EAC435]"
                        />
                        @error('author_name')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="author_email" class="block text-xs font-semibold text-[#061A40] mb-1">Your Email (Private)</label>
                        <input 
                            id="author_email"
                            type="email" 
                            wire:model="author_email" 
                            placeholder="you@example.com" 
                            required 
                            class="w-full px-4 py-2.5 bg-white border border-[#E5DFC9] rounded-xl text-sm text-[#061A40] focus:outline-none focus:ring-2 focus:ring-[#EAC435]"
                        />
                        @error('author_email')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-xs font-semibold text-[#061A40] mb-1">Your Thought / Comment</label>
                    <textarea 
                        id="content"
                        wire:model="content" 
                        rows="4" 
                        placeholder="What stood out to you from this guide?" 
                        required 
                        class="w-full px-4 py-3 bg-white border border-[#E5DFC9] rounded-xl text-sm text-[#061A40] focus:outline-none focus:ring-2 focus:ring-[#EAC435]"
                    ></textarea>
                    @error('content')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="btn-primary text-xs py-2.5 px-6">
                        <span>Submit Thought</span>
                        <span>&rarr;</span>
                    </button>
                </div>
            </form>
        @endif
    </div>

    <!-- Approved Comments List -->
    <div class="space-y-6">
        @forelse($comments as $comment)
            <div class="bg-white border border-[#E5DFC9] rounded-2xl p-6 shadow-sm space-y-3">
                <div class="flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#061A40] text-white flex items-center justify-center font-bold text-xs">
                            {{ substr($comment->author_name, 0, 1) }}
                        </span>
                        <span class="font-semibold text-[#061A40]">{{ $comment->author_name }}</span>
                    </div>
                    <span class="text-[#061A40]/50">{{ $comment->created_at->format('M d, Y') }}</span>
                </div>
                
                <p class="font-sans text-sm text-[#061A40]/80 leading-relaxed pl-9">
                    {{ $comment->content }}
                </p>
            </div>
        @empty
            <p class="text-center text-sm text-[#061A40]/50 py-6">
                No reader thoughts yet. Be the first to share your reflection on this guide.
            </p>
        @endforelse
    </div>

</div>
