@php
    $variant = $variant ?? 'default'; @endphp

<article class="group {{ $variant === 'row' ? 'flex gap-4' : '' }}">
    @if ($variant !== 'row')
        <a href="{{ route('public.article', $article->slug) }}" class="block overflow-hidden rounded-lg">
            @include('partials.thumbnail', ['article' => $article, 'size' => $variant === 'large' ? 'aspect-[16/9] w-full' : 'aspect-[16/9] w-full'])
        </a>
    @else
        <a href="{{ route('public.article', $article->slug) }}" class="w-28 shrink-0 overflow-hidden rounded-lg sm:w-36">
            @include('partials.thumbnail', ['article' => $article, 'size' => 'aspect-[4/3] w-full'])
        </a>
    @endif

    <div class="{{ $variant === 'row' ? 'min-w-0' : 'mt-3' }}">
        @if ($article->categories->isNotEmpty())
            <a href="{{ route('public.category', $article->categories->first()->slug) }}"
               class="npd-kicker text-brand-600 hover:text-brand-700">{{ $article->categories->first()->name }}</a>
        @endif

        <h3 class="{{ ($variant === 'large') ? 'mt-2 font-serif text-2xl font-bold' : (($variant === 'row') ? 'mt-0.5 line-clamp-2 text-sm font-semibold' : 'npd-card-title mt-1 text-base') }}">
            <a href="{{ route('public.article', $article->slug) }}">{{ $article->title }}</a>
        </h3>

        @if (in_array($variant, ['default', 'large']) && $article->excerpt)
            <p class="mt-2 line-clamp-2 text-sm text-ink-soft">{{ $article->excerpt }}</p>
        @endif

        <p class="mt-2 text-xs text-ink-soft">
            @if ($article->author)
                <span class="font-medium text-ink">{{ $article->author->name }}</span>
                <span aria-hidden="true">·</span>
            @endif
            <time datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->format('M j, Y') }}</time>
            @if (isset($showReadingTime) && $showReadingTime)
                <span aria-hidden="true">·</span>
                {{ $readingTime }} min read
            @endif
        </p>
    </div>
</article>
