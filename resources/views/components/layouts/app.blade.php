<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Achieving Vision — Practical Guidance to Build & Finish Your Vision' }}</title>
    <meta name="description" content="{{ $description ?? 'Achieving Vision gives ambitious dreamers everywhere the practical guidance to take big ideas from inspiration to finished reality.' }}">

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-[#FBF9F4] text-[#061A40] font-sans antialiased selection:bg-[#EAC435] selection:text-[#061A40] flex flex-col min-h-screen">

    <!-- Header Navigation -->
    <header class="sticky top-0 z-50 bg-[#FBF9F4]/90 backdrop-blur-md border-b border-[#E5DFC9]/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Wordmark Logo -->
            <a href="{{ route('home') }}" class="group flex items-center gap-2">
                <span class="font-display font-semibold text-2xl sm:text-3xl tracking-tight text-[#061A40] group-hover:text-[#2D7DD2] transition-colors">
                    Achieving Vision
                </span>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-[#2D7DD2] transition-colors {{ request()->routeIs('home') ? 'text-[#2D7DD2] font-semibold' : 'text-[#061A40]/80' }}">
                    Home
                </a>
                <a href="{{ route('blog.index') }}" class="hover:text-[#2D7DD2] transition-colors {{ request()->routeIs('blog.*') ? 'text-[#2D7DD2] font-semibold' : 'text-[#061A40]/80' }}">
                    Articles & Blog
                </a>
                <a href="{{ route('about') }}" class="hover:text-[#2D7DD2] transition-colors {{ request()->routeIs('about') ? 'text-[#2D7DD2] font-semibold' : 'text-[#061A40]/80' }}">
                    About Oghale
                </a>
                <a href="{{ route('events') }}" class="hover:text-[#2D7DD2] transition-colors {{ request()->routeIs('events') ? 'text-[#2D7DD2] font-semibold' : 'text-[#061A40]/80' }}">
                    Events
                </a>
                <a href="{{ route('contact') }}" class="hover:text-[#2D7DD2] transition-colors {{ request()->routeIs('contact') ? 'text-[#2D7DD2] font-semibold' : 'text-[#061A40]/80' }}">
                    Contact
                </a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden sm:flex items-center gap-4">
                <a href="{{ route('newsletter') }}" class="btn-primary text-sm">
                    Join Inner Circle
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="md:hidden flex items-center" x-data="{ open: false }">
                <button @click="open = !open" class="p-2 rounded-lg text-[#061A40] hover:bg-[#E5DFC9]/40 focus:outline-none" aria-label="Toggle Navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-[#061A40] text-white pt-16 pb-12 border-t border-[#061A40]/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 pb-12 border-b border-white/10">
                <!-- Brand Bio -->
                <div class="md:col-span-5">
                    <a href="{{ route('home') }}" class="font-display font-semibold text-2xl text-white tracking-tight inline-block mb-4">
                        Achieving Vision
                    </a>
                    <p class="text-white/70 text-sm leading-relaxed max-w-sm mb-6 font-sans">
                        We help ambitious dreamers everywhere turn the vision they carry into something they actually build and finish. Practical guidance, honest research, zero hype.
                    </p>
                    <div class="inline-block px-3 py-1 rounded-full bg-[#EAC435]/10 text-[#EAC435] text-xs font-medium border border-[#EAC435]/20">
                        Tagline: Here's to Achieving Vision
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="md:col-span-3">
                    <h4 class="font-display text-base font-semibold text-white mb-4">Explore Platform</h4>
                    <ul class="space-y-3 text-sm text-white/70">
                        <li><a href="{{ route('home') }}" class="hover:text-[#EAC435] transition-colors">Home</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-[#EAC435] transition-colors">Articles & Library</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#EAC435] transition-colors">About the Author</a></li>
                        <li><a href="{{ route('events') }}" class="hover:text-[#EAC435] transition-colors">Speaking & Events</a></li>
                        <li><a href="{{ route('newsletter') }}" class="hover:text-[#EAC435] transition-colors">Newsletter Subscription</a></li>
                    </ul>
                </div>

                <!-- Quick Newsletter Signup -->
                <div class="md:col-span-4">
                    <h4 class="font-display text-base font-semibold text-white mb-2">The Inner Circle</h4>
                    <p class="text-white/70 text-xs mb-4">Weekly actionable guidance delivered straight to your inbox.</p>
                    <livewire:newsletter-form source="footer" />
                </div>
            </div>

            <!-- Bottom Copyright & Legal Links -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-white/50 gap-4">
                <p>&copy; {{ date('Y') }} Achieving Vision (AchieveWithOghale). All rights reserved.</p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a>
                    <a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Support</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
