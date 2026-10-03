<?php

use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ArticleController;
use App\Http\Controllers\Public\CategoryController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\InsightsController;
use App\Http\Controllers\Public\NewsletterController;
use App\Http\Controllers\Public\SearchController;
use App\Http\Controllers\Public\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('public.home');
Route::get('/insights', InsightsController::class)->name('public.insights');
Route::get('/category/{category:slug}', CategoryController::class)->name('public.category');
Route::get('/tag/{tag:slug}', TagController::class)->name('public.tag');
Route::get('/search', SearchController::class)->name('public.search');
Route::get('/about', AboutController::class)->name('public.about');
Route::get('/contact', ContactController::class)->name('public.contact');
Route::get('/newsletter', [NewsletterController::class, 'show'])->name('public.newsletter');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('public.newsletter.subscribe');

// Flat legacy-compatible article URLs (doc 19) — keep last.
Route::get('/{article:slug}', ArticleController::class)
    ->where('article', '[a-z0-9-_]+')
    ->name('public.article');
