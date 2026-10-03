@extends('layouts.public')

@section('title', 'About NPD — National Policy Dialogue')

@section('content')
    <div class="npd-container py-12">
        <header class="mx-auto max-w-3xl border-b border-line pb-8 text-center">
            <p class="npd-kicker text-brand-600">Who We Are</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-ink">National Policy Dialogue</h1>
            <p class="mt-4 font-serif text-xl text-ink-soft">…the abode of Wisdom.</p>
        </header>

        <div class="mx-auto mt-10 max-w-3xl">
            @if ($page)
                <div class="article-body">{!! $page->body !!}</div>
            @else
                <div class="article-body">
                    <p>
                        National Policy Dialogue (NPD) is a public-policy, ideas and long-form publishing platform dedicated to
                        awakening the new Nigeria consciousness. We publish rigorous analysis, curated dialogue and reflective
                        essays across governance, economic development, education, health, environment and technology.
                    </p>
                    <h2>Vision</h2>
                    <p>A Nigerian society informed by evidence, enriched by dialogue and inspired by ideas that work.</p>
                    <h2>Mission</h2>
                    <p>
                        To convene citizens, experts and institutions around the policy questions that matter — and to publish
                        the insights that move the national conversation forward.
                    </p>
                    <blockquote>“Awakening the New Nigeria Consciousness.”</blockquote>
                    <h2>What we publish</h2>
                    <ul>
                        <li><strong>Dialogue with Wisdom</strong> — reflective conversations on statecraft and society.</li>
                        <li><strong>Renewed Hope Intelligentsia (RHI)</strong> — policy-focused commentary and analysis.</li>
                        <li><strong>Inspirational</strong> — essays on character, leadership and public life.</li>
                        <li><strong>Agribusiness</strong> — food systems, value chains and rural prosperity.</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
