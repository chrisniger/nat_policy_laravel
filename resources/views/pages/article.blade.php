@extends('layouts.public')

@section('title', $article->seo_title ?: $article->title.' — National Policy Dialogue')

@section('meta_description', $article->meta_description ?: $article->excerpt)

@section('content')
    <article>
        {{-- Breadcrumb (doc 03 §3) --}}
        <nav aria-label="Breadcrumb" class="border-b border-line bg-surface-muted">
            <div class="npd-container flex flex-wrap items-center gap-2 py-3 text-xs text-ink-soft">
                <a href="{{ route('public.home') }}" class="hover:text-brand-700">Home</a>
                <span aria-hidden="true">/</span>
                <a href="{{ route('public.insights') }}" class="hover:text-brand-700">Insights</a>
                @if ($article->categories->isNotEmpty())
                    <span aria-hidden="true">/</span>
                    <a href="{{ route('public.category', $article->categories->first()->slug) }}" class="hover:text-brand-700">{{ $article->categories->first()->name }}</a>
                @endif
            </div>
        </nav>

        <div class="npd-container py-10">
            <header class="mx-auto max-w-3xl">
                @if ($article->categories->isNotEmpty())
                    <a href="{{ route('public.category', $article->categories->first()->slug) }}" class="npd-kicker text-brand-600">{{ $article->categories->first()->name }}</a>
                @endif

                <h1 class="mt-3 font-serif text-3xl font-bold leading-tight text-ink sm:text-4xl">{{ $article->title }}</h1>

                @if ($article->subtitle)
                    <p class="mt-3 font-serif text-xl text-ink-soft">{{ $article->subtitle }}</p>
                @endif

                <div class="mt-5 flex flex-wrap items-center gap-x-3 gap-y-1 border-b border-line pb-5 text-sm text-ink-soft">
                    @if ($article->author)
                        <span class="font-semibold text-ink">{{ $article->author->name }}</span>
                        <span aria-hidden="true">·</span>
                    @endif
                    <time datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->format('M j, Y') }}</time>
                    <span aria-hidden="true">·</span>
                    <span>{{ $readingTime }} min read</span>
                    @if ($article->show_view_count)
                        <span aria-hidden="true">·</span>
                        <span>{{ number_format($article->views()->sum('views')) }} views</span>
                    @endif
                </div>
            </header>

            @if ($article->featuredMedia)
                <figure class="mx-auto mt-8 max-w-4xl">
                    <img src="{{ $article->featuredMedia->url() }}"
                         alt="{{ $article->featuredMedia->alt_text ?: $article->title }}"
                         class="w-full rounded-xl object-cover"
                         @if ($article->featuredMedia->width && $article->featuredMedia->height)
                             width="{{ $article->featuredMedia->width }}" height="{{ $article->featuredMedia->height }}"
                         @endif>
                    @if ($article->featuredMedia->caption)
                        <figcaption class="mt-2 text-center text-sm text-ink-soft">{{ $article->featuredMedia->caption }}</figcaption>
                    @endif
                </figure>
            @endif

            {{-- Share rail (doc 11 §1) --}}
            <div class="mx-auto mt-8 max-w-3xl">
                <div class="flex flex-wrap items-center gap-2 text-xs">
                    <span class="npd-kicker mr-1 text-ink-soft">Share</span>
                    @php
                        $url = urlencode(url()->current());
                        $title = urlencode($article->social_title ?: $article->title);
                    @endphp
                    <a href="https://wa.me/?text={{ $title }}%20{{ $url }}" target="_blank" rel="noopener" class="rounded-full border border-line px-3 py-1.5 font-medium hover:border-brand-500 hover:text-brand-700">WhatsApp</a>
                    <a href="https://t.me/share/url?url={{ $url }}&text={{ $title }}" target="_blank" rel="noopener" class="rounded-full border border-line px-3 py-1.5 font-medium hover:border-brand-500 hover:text-brand-700">Telegram</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank" rel="noopener" class="rounded-full border border-line px-3 py-1.5 font-medium hover:border-brand-500 hover:text-brand-700">Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $title }}" target="_blank" rel="noopener" class="rounded-full border border-line px-3 py-1.5 font-medium hover:border-brand-500 hover:text-brand-700">X</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}" target="_blank" rel="noopener" class="rounded-full border border-line px-3 py-1.5 font-medium hover:border-brand-500 hover:text-brand-700">LinkedIn</a>
                    <a href="mailto:?subject={{ $title }}&body={{ $url }}" class="rounded-full border border-line px-3 py-1.5 font-medium hover:border-brand-500 hover:text-brand-700">Email</a>
                </div>
            </div>

            {{-- Body --}}
            <div class="article-body mx-auto mt-8 max-w-3xl">{!! $article->body !!}</div>

            {{-- Tags --}}
            @if ($article->tags->isNotEmpty())
                <div class="mx-auto mt-10 max-w-3xl flex flex-wrap gap-2">
                    @foreach ($article->tags as $tag)
                        <a href="{{ route('public.tag', $tag->slug) }}" class="rounded-full bg-surface-muted px-3 py-1 text-xs font-medium text-ink-soft hover:bg-brand-50 hover:text-brand-700">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            @endif

            {{-- Prev / next --}}
            <nav aria-label="Article navigation" class="mx-auto mt-12 grid max-w-3xl gap-4 border-t border-line pt-6 sm:grid-cols-2">
                @if ($previous)
                    <a href="{{ route('public.article', $previous->slug) }}" class="group rounded-lg border border-line p-4 hover:border-brand-400">
                        <span class="npd-kicker text-ink-soft">← Previous</span>
                        <p class="npd-card-title mt-1 line-clamp-2 text-sm">{{ $previous->title }}</p>
                    </a>
                @endif
                @if ($next)
                    <a href="{{ route('public.article', $next->slug) }}" class="group rounded-lg border border-line p-4 text-right hover:border-brand-400 sm:col-start-2">
                        <span class="npd-kicker text-ink-soft">Next →</span>
                        <p class="npd-card-title mt-1 line-clamp-2 text-sm">{{ $next->title }}</p>
                    </a>
                @endif
            </nav>

            {{-- Related --}}
            @if ($related->isNotEmpty())
                <section class="mx-auto mt-14 max-w-5xl" aria-labelledby="related-heading">
                    <h2 id="related-heading" class="border-b border-line pb-3 font-serif text-2xl font-bold text-ink">Related Insights</h2>
                    <div class="mt-6 grid gap-8 sm:grid-cols-3">
                        @foreach ($related as $relatedArticle)
                            @include('partials.article-card', ['article' => $relatedArticle, 'variant' => 'default'])
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </article>
@endsection
