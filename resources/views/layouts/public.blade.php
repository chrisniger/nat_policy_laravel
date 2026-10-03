<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>@yield('title', 'National Policy Dialogue — …the abode of Wisdom.')</title>
    <meta name="description" content="@yield('meta_description', 'National Policy Dialogue — Awakening the New Nigeria Consciousness. Policy, ideas and long-form dialogue.')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col">

    {{-- Utility bar (doc 03 §2 module 1) --}}
    <div class="bg-brand-900 text-xs text-brand-100">
        <div class="npd-container flex h-9 items-center justify-between">
            <p class="tracking-wide">…the abode of Wisdom.</p>
            <div class="flex items-center gap-4">
                <a href="{{ route('public.contact') }}" class="hover:text-white">Contact</a>
                <a href="{{ route('public.newsletter') }}" class="rounded-full bg-brand-600 px-3 py-1 font-semibold text-white hover:bg-brand-500">Subscribe</a>
            </div>
        </div>
    </div>

    {{-- Main header --}}
    <header class="sticky top-0 z-40 border-b border-line bg-surface/95 backdrop-blur">
        <div class="npd-container flex h-16 items-center justify-between gap-4">
            <a href="{{ route('public.home') }}" class="flex items-center gap-2.5">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-700 font-serif text-lg font-bold text-white">N</span>
                <span class="leading-tight">
                    <span class="block font-serif text-lg font-bold text-brand-900">National Policy Dialogue</span>
                    <span class="block text-[11px] tracking-[0.18em] text-ink-soft uppercase">Policy · Ideas · Dialogue</span>
                </span>
            </a>

            <nav class="hidden items-center gap-6 text-sm font-medium text-ink-soft md:flex" aria-label="Main navigation">
                <a href="{{ route('public.home') }}" class="hover:text-brand-700">Home</a>
                <a href="{{ route('public.insights') }}" class="hover:text-brand-700">Insights</a>
                @foreach ($headerCategories as $category)
                    <a href="{{ route('public.category', $category->slug) }}" class="hover:text-brand-700">{{ $category->name }}</a>
                @endforeach
                <a href="{{ route('public.about') }}" class="hover:text-brand-700">About</a>
            </nav>

            <form action="{{ route('public.search') }}" method="GET" role="search" class="hidden md:block">
                <label class="sr-only" for="header-search">Search</label>
                <input id="header-search" type="search" name="q" placeholder="Search insights…"
                       class="h-9 w-44 rounded-full border border-line bg-surface-muted px-4 text-sm placeholder:text-ink-soft/60 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-200">
            </form>

            <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-md text-ink md:hidden"
                    aria-controls="mobile-nav" aria-expanded="false" aria-label="Open menu"
                    x-data="{ open: false }" @click="open = ! open" :aria-expanded="open">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>
        </div>

        {{-- Mobile nav (simple, no JS dependency beyond Alpine toggle) --}}
        <div id="mobile-nav" class="hidden border-t border-line bg-surface md:hidden">
            <div class="npd-container flex flex-col gap-1 py-3 text-sm font-medium text-ink-soft">
                <a href="{{ route('public.home') }}" class="rounded-md px-2 py-2 hover:bg-surface-muted">Home</a>
                <a href="{{ route('public.insights') }}" class="rounded-md px-2 py-2 hover:bg-surface-muted">Insights</a>
                @foreach ($headerCategories as $category)
                    <a href="{{ route('public.category', $category->slug) }}" class="rounded-md px-2 py-2 hover:bg-surface-muted">{{ $category->name }}</a>
                @endforeach
                <a href="{{ route('public.about') }}" class="rounded-md px-2 py-2 hover:bg-surface-muted">About</a>
                <a href="{{ route('public.newsletter') }}" class="rounded-md bg-brand-600 px-2 py-2 text-center text-white hover:bg-brand-500">Subscribe</a>
            </div>
        </div>
    </header>

    {{-- Main content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Newsletter CTA (doc 10 §2 entry points) --}}
    <section class="bg-brand-900">
        <div class="npd-container flex flex-col items-start justify-between gap-6 py-12 md:flex-row md:items-center">
            <div>
                <h2 class="font-serif text-2xl font-bold text-white">Awakening the New Nigeria Consciousness.</h2>
                <p class="mt-1 text-sm text-brand-100">Get NPD's policy insights and dialogue in your inbox.</p>
            </div>
            <form action="{{ route('public.newsletter.subscribe') }}" method="POST" class="flex w-full max-w-md gap-2">
                @csrf
                <label class="sr-only" for="footer-newsletter-email">Email address</label>
                <input id="footer-newsletter-email" type="email" name="email" required placeholder="you@example.com"
                       class="h-11 flex-1 rounded-md border-0 bg-white px-4 text-sm text-ink placeholder:text-ink-soft/60 focus:ring-2 focus:ring-brand-400">
                <button type="submit" class="h-11 rounded-md bg-brand-500 px-5 text-sm font-semibold text-white hover:bg-brand-400">Subscribe</button>
            </form>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="border-t border-brand-800 bg-brand-950 text-sm text-brand-200">
        <div class="npd-container grid gap-8 py-12 md:grid-cols-4">
            <div class="md:col-span-2">
                <p class="font-serif text-lg font-bold text-white">National Policy Dialogue</p>
                <p class="mt-2 max-w-sm text-brand-300">A public-policy, ideas and long-form publishing platform — Awakening the New Nigeria Consciousness.</p>
                <p class="mt-4 text-brand-300">info@nationalpolicydialogue.org</p>
            </div>
            <div>
                <p class="npd-kicker text-brand-400">Sections</p>
                <ul class="mt-3 space-y-2">
                    <li><a href="{{ route('public.insights') }}" class="hover:text-white">Insights</a></li>
                    @foreach ($headerCategories as $category)
                        <li><a href="{{ route('public.category', $category->slug) }}" class="hover:text-white">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <p class="npd-kicker text-brand-400">NPD</p>
                <ul class="mt-3 space-y-2">
                    <li><a href="{{ route('public.about') }}" class="hover:text-white">About NPD</a></li>
                    <li><a href="{{ route('public.contact') }}" class="hover:text-white">Contact Us</a></li>
                    <li><a href="{{ route('public.newsletter') }}" class="hover:text-white">Newsletter</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-brand-900">
            <div class="npd-container flex flex-col items-center justify-between gap-2 py-5 text-xs text-brand-400 md:flex-row">
                <p>&copy; {{ now()->year }} National Policy Dialogue. All rights reserved.</p>
                <p>…the abode of Wisdom.</p>
            </div>
        </div>
    </footer>

</body>
</html>
