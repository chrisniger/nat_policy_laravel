@extends('layouts.public')

@section('title', 'Search — National Policy Dialogue')

@section('content')
    <div class="npd-container py-10">
        <header class="border-b border-line pb-6">
            <p class="npd-kicker text-brand-600">Search</p>
            <h1 class="mt-2 font-serif text-3xl font-bold text-ink">
                @if ($term !== '')
                    Results for “{{ $term }}”
                @else
                    Search NPD
                @endif
            </h1>
            @if ($term !== '')
                <p class="mt-2 text-ink-soft">{{ $articles->total() }} {{ Str::plural('result', $articles->total()) }} found.</p>
            @endif
        </header>

        <form action="{{ route('public.search') }}" method="GET" role="search" class="mt-6 flex max-w-xl gap-2">
            <label class="sr-only" for="search-input">Search</label>
            <input id="search-input" type="search" name="q" value="{{ $term }}" placeholder="Search articles, topics and authors…"
                   class="h-11 flex-1 rounded-md border border-line bg-surface px-4 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-200">
            <button type="submit" class="h-11 rounded-md bg-brand-700 px-5 text-sm font-semibold text-white hover:bg-brand-600">Search</button>
        </form>

        <div class="mt-8 space-y-8">
            @forelse ($articles as $article)
                @include('partials.article-card', ['article' => $article, 'variant' => 'row'])
            @empty
                <div class="rounded-lg border border-line bg-surface-muted p-6">
                    <p class="text-sm text-ink-soft">
                        @if ($term !== '')
                            No results for “{{ $term }}”. Try different keywords, or
                        @else
                            Enter a search term to begin, or
                        @endif
                        <a href="{{ route('public.insights') }}" class="font-semibold text-brand-700 hover:underline">browse all insights</a>.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">{{ $articles->links() }}</div>
    </div>
@endsection
