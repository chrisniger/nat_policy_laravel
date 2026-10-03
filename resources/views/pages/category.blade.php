@extends('layouts.public')

@section('title', ($category->name ?? 'Archive').' — National Policy Dialogue')

@section('content')
    <div class="npd-container py-10">
        <header class="border-b border-line pb-6">
            <p class="npd-kicker text-brand-600">{{ $isTag ?? false ? 'Topic' : 'Section' }}</p>
            <h1 class="mt-2 font-serif text-3xl font-bold text-ink sm:text-4xl">{{ $category->name }}</h1>
            @if (!empty($category->description))
                <p class="mt-2 max-w-2xl text-ink-soft">{{ $category->description }}</p>
            @endif
        </header>

        <div class="mt-8 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($articles as $article)
                @include('partials.article-card', ['article' => $article, 'variant' => 'default'])
            @empty
                <p class="text-sm text-ink-soft">Nothing published here yet — check back soon.</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $articles->links() }}</div>
    </div>
@endsection
