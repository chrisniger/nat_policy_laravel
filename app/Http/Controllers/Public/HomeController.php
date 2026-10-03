<?php

namespace App\Http\Controllers\Public;

use App\Enums\ArticleStatus;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Services\CalculateReadingTime;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        // NOTE (doc 07 §7): computed each request for now — Eloquent models
        // cannot round-trip Laravel's file cache. Cache plain arrays later.
        $data = (function () {
            $featured = Article::published()
                ->where('featured', true)
                ->with(['author', 'featuredMedia'])
                ->orderByDesc('featured_weight')
                ->orderByDesc('published_at')
                ->first() ?? Article::published()->with(['author', 'featuredMedia'])->latest('published_at')->first();

            $latest = Article::published()
                ->with(['author', 'featuredMedia'])
                ->latest('published_at')
                ->skip(1)
                ->take(10)
                ->get();

            $mostRead = Article::published()
                ->with('author')
                ->select('articles.*')
                ->leftJoin('article_views', function ($join) {
                    $join->on('article_views.article_id', '=', 'articles.id')
                        ->where('article_views.viewed_on', '>=', now()->subDays(7)->toDateString());
                })
                ->groupBy('articles.id')
                ->orderByRaw('COALESCE(SUM(article_views.views), 0) DESC')
                ->limit(5)
                ->get();

            return [
                'featured' => $featured,
                'latest' => $latest,
                'mostRead' => $mostRead,
                'sections' => Category::query()
                    ->whereNull('parent_id')
                    ->orderBy('name')
                    ->get()
                    ->map(fn (Category $category) => [
                        'category' => $category,
                        'articles' => Article::published()
                            ->whereHas('categories', fn ($q) => $q->where('categories.id', $category->id))
                            ->with('author')
                            ->latest('published_at')
                            ->take(3)
                            ->get(),
                    ])
                    ->filter(fn (array $section) => $section['articles']->isNotEmpty())
                    ->values(),
            ];
        });

        return view('pages.home', array_merge($data(), [
            'readingTimeFor' => fn (Article $article) => CalculateReadingTime::forBody($article->body),
        ]));
    }
}
