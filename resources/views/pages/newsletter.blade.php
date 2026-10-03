@extends('layouts.public')

@section('title', 'Newsletter — National Policy Dialogue')

@section('content')
    <div class="npd-container py-12">
        <header class="mx-auto max-w-2xl border-b border-line pb-8 text-center">
            <p class="npd-kicker text-brand-600">Stay close to the dialogue</p>
            <h1 class="mt-3 font-serif text-4xl font-bold text-ink">The NPD Newsletter</h1>
            <p class="mt-4 text-ink-soft">Policy insights, dialogue invitations and the best of our long-form journalism — in your inbox.</p>
        </header>

        <div class="mx-auto mt-10 max-w-md">
            @if (session('subscribed'))
                <div class="rounded-lg border border-brand-200 bg-brand-50 p-5 text-sm text-brand-800" role="status">
                    <p class="font-semibold">Thank you for subscribing.</p>
                    <p class="mt-1">Please check your inbox — if double opt-in is enabled you'll receive a confirmation link before we send anything.</p>
                </div>
            @endif

            <form action="{{ route('public.newsletter.subscribe') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="newsletter-name" class="mb-1 block text-sm font-medium text-ink">Name <span class="font-normal text-ink-soft">(optional)</span></label>
                    <input id="newsletter-name" type="text" name="name"
                           class="h-11 w-full rounded-md border border-line px-4 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-200">
                </div>
                <div>
                    <label for="newsletter-email" class="mb-1 block text-sm font-medium text-ink">Email address</label>
                    <input id="newsletter-email" type="email" name="email" required
                           class="h-11 w-full rounded-md border border-line px-4 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-200">
                </div>
                <button type="submit" class="h-11 w-full rounded-md bg-brand-700 text-sm font-semibold text-white hover:bg-brand-600">Subscribe</button>
                <p class="text-xs text-ink-soft">You can unsubscribe at any time. We store your consent and never share your address.</p>
            </form>
        </div>
    </div>
@endsection
