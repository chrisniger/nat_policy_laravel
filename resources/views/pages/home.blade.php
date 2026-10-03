@extends('layouts.public')

@section('title', 'National Policy Dialogue — …the abode of Wisdom.')

@section('content')
    @if ($featured)
        {{-- Lead hero (doc 03 §2 module 3) --}}
        <section class="border-b border-line bg-surface-muted">
            <div class="npd-container grid gap-8 py-10 lg:grid-cols-[1.6fr_1fr] lg:py-14">
                <article class="group">
                    <a href="{{ route('public.article', $featured->slug) }}" class="block overflow-hidden rounded-xl">
                        @include('partials.thumbnail', ['article' => $featured, 'size' => 'aspect-[16/9] w-full'])
                    </a>
                    <div class="mt-5 max-w-3xl">
                        @if ($featured->categories->isNotEmpty())
                            <a href="{{ route('public.category', $featured->categories->first()->slug) }}"
                               class="npd-kicker text-brand-600">{{ $featured->categories->first()->name }}</a>
                        @endif
                        <h1 class="mt-2 font-serif text-3xl font-bold leading-tight text-ink sm:text-4xl">
                            <a href="{{ route('public.article', $featured->slug) }}" class="hover:text-brand-800">{{ $featured->title }}</a>
                        </h1>
                        @if ($featured->excerpt)
                            <p class="mt-3 text-base text-ink-soft">{{ $featured->excerpt }}</p>
                        @endif
                        <p class="mt-4 text-sm text-ink-soft">
                            @if ($featured->author)
                                By <span class="font-semibold text-ink">{{ $featured->author->name }}</span> ·
                            @endif
                            <time datetime="{{ $featured->published_at->toIso8601String() }}">{{ $featured->published_at->format('M j, Y') }}</time>
                            · {{ $readingTimeFor($featured) }} min read
                        </p>
                    </div>
                </article>

                <aside>
                    <h2 class="npd-kicker border-b border-line pb-2 text-ink-soft">Latest</h2>
                    <div class="mt-4 space-y-5">
                        @forelse ($latest->take(4) as $article)
                            @include('partials.article-card', ['article' => $article, 'variant' => 'row'])
                        @empty
                            <p class="text-sm text-ink-soft">More stories coming soon.</p>
                        @endforelse
                    </div>
                </aside>
            </div>
        </section>
    @endif

    <div class="npd-container py-12">
        <div class="grid gap-12 lg:grid-cols-[1fr_320px]">
            <div class="space-y-12">
                {{-- Latest strip --}}
                <section aria-labelledby="latest-heading">
                    <div class="flex items-end justify-between border-b border-line pb-3">
                        <h2 id="latest-heading" class="font-serif text-2xl font-bold text-ink">Latest Insights</h2>
                        <a href="{{ route('public.insights') }}" class="text-sm font-semibold text-brand-700 hover:text-brand-800">View all →</a>
                    </div>
                    <div class="mt-6 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        @forelse ($latest->skip(4) as $article)
                            @include('partials.article-card', ['article' => $article, 'variant' => 'default'])
                        @empty
                            <p class="text-sm text-ink-soft">Articles are on the way. Run <code class="rounded bg-surface-muted px-1">php artisan db:seed --class=SampleContentSeeder</code> to preview with sample content.</p>
                        @endforelse
                    </div>
                </section>

                {{-- Category sections (doc 03 §2 modules 5–7) --}}
                @foreach ($sections as $section)
                    <section aria-labelledby="section-{{ $section['category']->id }}">
                        <div class="flex items-end justify-between border-b border-line pb-3">
                            <h2 id="section-{{ $section['category']->id }}" class="font-serif text-2xl font-bold text-ink">{{ $section['category']->name }}</h2>
                            <a href="{{ route('public.category', $section['category']->slug) }}" class="text-sm font-semibold text-brand-700 hover:text-brand-800">More →</a>
                        </div>
                        <div class="mt-6 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($section['articles'] as $article)
                                @include('partials.article-card', ['article' => $article, 'variant' => 'default'])
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>

            {{-- Sidebar: most read + institutional statement --}}
            <aside class="space-y-10">
                <section aria-labelledby="most-read-heading">
                    <h2 id="most-read-heading" class="npd-kicker border-b border-line pb-2 text-ink-soft">Most Read</h2>
                    <ol class="mt-4 space-y-4">
                        @forelse ($mostRead as $index => $article)
                            <li class="flex gap-3">
                                <span class="font-serif text-2xl font-bold text-brand-200">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                <div class="min-w-0">
                                    <h3 class="line-clamp-2 text-sm font-semibold leading-snug">
                                        <a href="{{ route('public.article', $article->slug) }}" class="hover:text-brand-700">{{ $article->title }}</a>
                                    </h3>
                                    <p class="mt-1 text-xs text-ink-soft">{{ $article->published_at->format('M j, Y') }}</p>
                                </div>
                            </li>
                        @empty
                            <li class="text-sm text-ink-soft">Read counts appear as articles are viewed.</li>
                        @endforelse
                    </ol>
                </section>

                <section class="rounded-xl bg-brand-900 p-6 text-brand-50" aria-labelledby="about-npd-heading">
                    <h2 id="about-npd-heading" class="font-serif text-xl font-bold text-white">About NPD</h2>
                    <p class="mt-3 text-sm leading-relaxed text-brand-100">
                        National Policy Dialogue is a public-policy, ideas and long-form publishing platform —
                        awakening the new Nigeria consciousness through dialogue.
                    </p>
                    <a href="{{ route('public.about') }}" class="mt-4 inline-block text-sm font-semibold text-brand-300 hover:text-white">Who we are →</a>
                </section>

                <section class="rounded-xl border border-line bg-surface-muted p-6" aria-labelledby="dialogue-cta-heading">
                    <h2 id="dialogue-cta-heading" class="font-serif text-xl font-bold text-ink">Join the Dialogue Room</h2>
                    <p class="mt-2 text-sm text-ink-soft">Share your insight on the questions shaping national policy.</p>
                    <a href="{{ route('public.contact') }}" class="mt-4 inline-block rounded-md bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-500">Participate</a>
                </section>
            </aside>
        </div>
    </div>
@endsection
