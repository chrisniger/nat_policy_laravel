<?php

namespace App\Providers;

use App\Models\User;
use App\Support\Roles;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Super admins pass every authorization check (server-side, doc 13).
        Gate::before(function (User $user, string $ability) {
            return $user->hasRole(Roles::SUPER_ADMIN) ? true : null;
        });

        // Top-level categories for the public header/footer navigation.
        // NOTE (doc 07 §7): cache as plain arrays once model-safe serialization
        // is in place; Eloquent models cannot round-trip Laravel's file cache.
        View::composer('layouts.public', function ($view) {
            $view->with(
                'headerCategories',
                Category::query()->whereNull('parent_id')->orderBy('name')->get(),
            );
        });
    }
}
