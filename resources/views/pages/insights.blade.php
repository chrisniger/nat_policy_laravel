@extends('layouts.public')

@section('title', 'Insights — National Policy Dialogue')

@section('content')
    <div class="npd-container py-10">
        <header class="border-b border-line pb-6">
            <p class="npd-kicker text-brand-600">All Publications</p>
            <h1 class="mt-2 font-serif text-3xl font-bold text-ink sm:text-4xl">Insights</h1>
            <p class="mt-2 max-w-2xl text-ink-soft">Long-form analysis, dialogue and ideas from National Policy Dialogue.</p>
        </header>

        <div class="mt-6 flex flex-wrap gap-2">
            <a href="{{ route('public.insights') }}"
               class="rounded-full px-3 py-1.5 text-xs font-semibold {{ $activeCategory === '' ? 'bg-brand-700 text-white' : 'bg-surface-muted text-ink-soft hover:bg-brand-50 hover:text-brand-700' }}">All</a>
            @foreach ($categories as $category)
                <a href="{{ route('public.insights', ['category' => $category->slug]) }}"
                   class="rounded-full px-3 py-1.5 text-xs font-semibold {{ $activeCategory === $category->slug ? 'bg-brand-700 text-white' : 'bg-surface-muted text-ink-soft hover:bg-brand-50 hover:text-brand-700' }}">{{ $category->name }}</a>
            @endforeach
        </div>

        <div class="mt-8 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($articles as $article)
                @include('partials.article-card', ['article' => $article, 'variant' => 'default'])
            @empty
                <p class="text-sm text-ink-soft">No published insights in this section yet.</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $articles->links() }}</div>
    </div>
@endsection
