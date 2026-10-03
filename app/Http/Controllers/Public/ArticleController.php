<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\CalculateReadingTime;
use App\Services\RecordArticleView;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __invoke(Article $article, RecordArticleView $recordView): View
    {
        abort_unless(
            $article->status === \App\Enums\ArticleStatus::Published
            && $article->published_at !== null
            && $article->published_at->lte(now()),
            404,
        );

        $article->load(['author', 'featuredMedia', 'categories', 'tags']);

        $recordView->handle($article, session()->getId());

        $related = Article::published()
            ->whereKeyNot($article->id)
            ->when($article->categories->isNotEmpty(), function ($query) use ($article) {
                $query->whereHas('categories', fn ($q) => $q->whereIn('categories.id', $article->categories->pluck('id')));
            })
            ->with(['author', 'featuredMedia'])
            ->latest('published_at')
            ->take(3)
            ->get();

        [$previous, $next] = [
            Article::published()->where('published_at', '<', $article->published_at)->latest('published_at')->first(),
            Article::published()->where('published_at', '>', $article->published_at)->oldest('published_at')->first(),
        ];

        return view('pages.article', [
            'article' => $article,
            'readingTime' => CalculateReadingTime::forBody($article->body),
            'related' => $related,
            'previous' => $previous,
            'next' => $next,
        ]);
    }
}
