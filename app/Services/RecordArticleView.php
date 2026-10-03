<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleView;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RecordArticleView
{
    protected const SESSION_KEY_PREFIX = 'npd.article_viewed.';

    /**
     * Increment today's aggregate view count for an article.
     * One view per article per browser session; no raw IP is ever stored (doc 14 §4).
     */
    public function handle(Article $article, ?string $sessionId = null): void
    {
        $key = static::SESSION_KEY_PREFIX.$article->id;

        if ($sessionId !== null && session()->get($key) === true) {
            return;
        }

        DB::transaction(function () use ($article) {
            ArticleView::upsert(
                [
                    'article_id' => $article->id,
                    'viewed_on' => now()->toDateString(),
                    'views' => 1,
                    'unique_estimate' => 1,
                ],
                ['article_id', 'viewed_on'],
                [
                    'views' => DB::raw('article_views.views + 1'),
                    'unique_estimate' => DB::raw('article_views.unique_estimate + 1'),
                ],
            );
        });

        if ($sessionId !== null) {
            session()->put($key, true);
        }

        // Homepage "most read" list depends on this table.
        Cache::forget('npd.home.most_read');
    }
}
