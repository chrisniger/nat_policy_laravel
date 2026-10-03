<?php

namespace App\Http\Controllers\Public;

use App\Enums\NewsletterSubscriberStatus;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    public function show(): View
    {
        return view('pages.newsletter');
    }

    public function subscribe(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email:filter', 'max:255'],
            'name' => ['nullable', 'string', 'max:120'],
        ]);

        NewsletterSubscriber::updateOrCreate(
            ['email' => strtolower($validated['email'])],
            [
                'name' => $validated['name'] ?? null,
                // Configurable double opt-in starts everyone as pending (doc 10 §1).
                'status' => NewsletterSubscriberStatus::Pending,
                'source' => 'public_website',
                'consented_at' => now(),
            ],
        );

        return redirect()
            ->route('public.newsletter')
            ->with('subscribed', true);
    }
}
