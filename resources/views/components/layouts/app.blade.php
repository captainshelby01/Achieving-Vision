<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Achieving Vision — Practical Guidance to Build & Finish Your Vision' }}</title>
    <meta name="description" content="{{ $description ?? 'Achieving Vision gives ambitious dreamers everywhere the practical guidance to take big ideas from inspiration to finished reality.' }}">

    <!-- OpenGraph & Social Cards -->
    <meta property="og:site_name" content="Achieving Vision">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Achieving Vision — Practical Guidance to Build & Finish Your Vision' }}">
    <meta property="og:description" content="{{ $description ?? 'Achieving Vision gives ambitious dreamers everywhere the practical guidance to take big ideas from inspiration to finished reality.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Achieving Vision' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Achieving Vision gives ambitious dreamers everywhere the practical guidance to take big ideas from inspiration to finished reality.' }}">

    <!-- Google Analytics (GA4) -->
    @if(env('GOOGLE_ANALYTICS_ID'))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_ID') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ env('GOOGLE_ANALYTICS_ID') }}');
        </script>
    @endif

    <!-- Google AdSense Script -->
    @if(env('GOOGLE_ADSENSE_CLIENT_ID'))
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ env('GOOGLE_ADSENSE_CLIENT_ID') }}" crossorigin="anonymous"></script>
    @endif

    <!-- Google Fonts Preconnect & Parallel Font Loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Plus+Jakarta+Sans:wght@500;600;700&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-white text-[#061A40] font-sans antialiased selection:bg-[#EAC435] selection:text-[#061A40] flex flex-col min-h-screen overflow-x-hidden">

    <!-- Header Navigation -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-[#061A40]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between">
            <!-- Wordmark Logo -->
            <a href="{{ route('home') }}" class="group flex items-center gap-2">
                <span class="font-display font-semibold text-xl sm:text-2xl md:text-3xl tracking-tight text-[#061A40] group-hover:text-[#2D7DD2] transition-colors">
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
            <div class="md:hidden flex items-center">
                <button 
                    id="mobile-menu-btn"
                    type="button"
                    class="p-2.5 rounded-lg text-[#061A40] hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-[#2D7DD2]/40 transition active:scale-95" 
                    aria-label="Toggle Navigation"
                    aria-expanded="false"
                >
                    <!-- Hamburger Icon -->
                    <svg id="mobile-hamburger-icon" class="h-6 w-6 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close Icon -->
                    <svg id="mobile-close-icon" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div 
            id="mobile-menu-drawer"
            class="hidden md:hidden bg-white border-b border-[#061A40]/10 shadow-2xl px-4 pt-3 pb-6 space-y-3"
        >
            <div class="flex flex-col space-y-1.5 font-medium text-base">
                <a 
                    href="{{ route('home') }}" 
                    class="mobile-nav-link px-3.5 py-3 rounded-lg transition-colors {{ request()->routeIs('home') ? 'bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold' : 'text-[#061A40] hover:bg-slate-50' }}"
                >
                    Home
                </a>
                <a 
                    href="{{ route('blog.index') }}" 
                    class="mobile-nav-link px-3.5 py-3 rounded-lg transition-colors {{ request()->routeIs('blog.*') ? 'bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold' : 'text-[#061A40] hover:bg-slate-50' }}"
                >
                    Articles & Blog
                </a>
                <a 
                    href="{{ route('about') }}" 
                    class="mobile-nav-link px-3.5 py-3 rounded-lg transition-colors {{ request()->routeIs('about') ? 'bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold' : 'text-[#061A40] hover:bg-slate-50' }}"
                >
                    About Oghale
                </a>
                <a 
                    href="{{ route('events') }}" 
                    class="mobile-nav-link px-3.5 py-3 rounded-lg transition-colors {{ request()->routeIs('events') ? 'bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold' : 'text-[#061A40] hover:bg-slate-50' }}"
                >
                    Events
                </a>
                <a 
                    href="{{ route('contact') }}" 
                    class="mobile-nav-link px-3.5 py-3 rounded-lg transition-colors {{ request()->routeIs('contact') ? 'bg-[#2D7DD2]/10 text-[#2D7DD2] font-semibold' : 'text-[#061A40] hover:bg-slate-50' }}"
                >
                    Contact
                </a>
            </div>

            <div class="pt-3 border-t border-[#061A40]/10">
                <a 
                    href="{{ route('newsletter') }}" 
                    class="mobile-nav-link btn-primary w-full text-center text-sm py-3.5 justify-center shadow-md font-semibold"
                >
                    Join Inner Circle
                </a>
            </div>
        </div>
    </header>

    <script>
        (function() {
            function initMobileMenu() {
                const btn = document.getElementById('mobile-menu-btn');
                const drawer = document.getElementById('mobile-menu-drawer');
                const hamburgerIcon = document.getElementById('mobile-hamburger-icon');
                const closeIcon = document.getElementById('mobile-close-icon');

                if (!btn || !drawer) return;

                function toggleMenu(forceState) {
                    const isHidden = drawer.classList.contains('hidden');
                    const shouldOpen = typeof forceState === 'boolean' ? forceState : isHidden;

                    if (shouldOpen) {
                        drawer.classList.remove('hidden');
                        if (hamburgerIcon) {
                            hamburgerIcon.classList.remove('block');
                            hamburgerIcon.classList.add('hidden');
                        }
                        if (closeIcon) {
                            closeIcon.classList.remove('hidden');
                            closeIcon.classList.add('block');
                        }
                        btn.setAttribute('aria-expanded', 'true');
                    } else {
                        drawer.classList.add('hidden');
                        if (hamburgerIcon) {
                            hamburgerIcon.classList.remove('hidden');
                            hamburgerIcon.classList.add('block');
                        }
                        if (closeIcon) {
                            closeIcon.classList.remove('block');
                            closeIcon.classList.add('hidden');
                        }
                        btn.setAttribute('aria-expanded', 'false');
                    }
                }

                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleMenu();
                });

                document.addEventListener('click', function(e) {
                    if (!drawer.contains(e.target) && !btn.contains(e.target)) {
                        toggleMenu(false);
                    }
                });

                document.querySelectorAll('.mobile-nav-link').forEach(function(link) {
                    link.addEventListener('click', function() {
                        toggleMenu(false);
                    });
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initMobileMenu);
            } else {
                initMobileMenu();
            }
        })();
    </script>

    <!-- Main Content Area -->
    <main class="flex-grow [&>*:last-child]:border-b-0">
        {{ $slot }}
    </main>

    <!-- Curved Footer Edge Transition (Replacing Straight Line) -->
    <div class="w-full overflow-hidden leading-none bg-white -mb-[1px] pointer-events-none select-none" aria-hidden="true">
        <svg class="relative block w-full h-8 sm:h-12 md:h-16 lg:h-20 text-[#061A40]" viewBox="0 0 1440 64" preserveAspectRatio="none" fill="currentColor">
            <path d="M0,48 C360,6 1080,6 1440,48 L1440,64 L0,64 Z"></path>
        </svg>
    </div>

    <!-- Footer -->
    <footer class="bg-[#061A40] text-white pt-8 sm:pt-12 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 pb-12 border-b border-white/10 items-start">
                <!-- Brand Bio -->
                <div class="lg:col-span-4">
                    <a href="{{ route('home') }}" class="font-display font-semibold text-2xl text-white tracking-tight inline-block mb-4">
                        Achieving Vision
                    </a>
                    <p class="text-white/70 text-sm leading-relaxed max-w-sm mb-6 font-sans">
                        We help ambitious dreamers everywhere turn the vision they carry into something they actually build and finish. Practical guidance, honest research, zero hype.
                    </p>
                    <div class="flex flex-wrap items-center gap-2 mb-6">
                        <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#EAC435]/15 text-[#EAC435] text-xs font-medium border border-[#EAC435]/30">
                            Tagline: Here's to Achieving Vision
                        </div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#82FF9E]/15 text-[#82FF9E] text-xs font-medium border border-[#82FF9E]/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#82FF9E]"></span>
                            <span>Active Research &bull; Updated Weekly</span>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="lg:col-span-3">
                    <h4 class="font-display text-base font-semibold text-white mb-4">Explore Platform</h4>
                    <ul class="space-y-3 text-sm text-white/70">
                        <li><a href="{{ route('home') }}" class="hover:text-[#EAC435] transition-colors">Home</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-[#EAC435] transition-colors">Articles & Library</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#EAC435] transition-colors">About the Author</a></li>
                        <li><a href="{{ route('events') }}" class="hover:text-[#EAC435] transition-colors">Speaking & Events</a></li>
                        <li><a href="{{ route('newsletter') }}" class="hover:text-[#EAC435] transition-colors">Newsletter Subscription</a></li>
                    </ul>
                </div>

                <!-- Distinct Newsletter Subscription Card -->
                <div class="lg:col-span-5">
                    <div class="bg-white/[0.04] border border-white/12 hover:border-[#EAC435]/40 rounded-2xl p-6 sm:p-7 shadow-xl relative overflow-hidden backdrop-blur-xs transition-colors">
                        <!-- Top Accent Highlight Stripe -->
                        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-[#2D7DD2] via-[#82FF9E] to-[#EAC435]" aria-hidden="true"></div>

                        <div class="space-y-4">
                            <div>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-[#EAC435]/15 text-[#EAC435] text-[11px] font-mono tracking-wide uppercase font-semibold border border-[#EAC435]/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#EAC435] animate-pulse"></span>
                                    Weekly Dispatch
                                </span>
                            </div>

                            <div>
                                <h4 class="font-display font-semibold text-xl text-white tracking-tight">The Inner Circle</h4>
                                <p class="text-white/70 text-xs sm:text-sm leading-relaxed font-sans mt-1.5">
                                    Weekly actionable ideas, reflections, and frameworks on building and finishing meaningful work.
                                </p>
                            </div>

                            <div class="pt-1">
                                <livewire:newsletter-form source="footer" />
                            </div>
                        </div>
                    </div>
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
