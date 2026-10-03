<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\SearchQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __invoke(Request $request): View
    {
        $term = trim((string) $request->query('q', ''));

        $articles = Article::published()
            ->with(['author', 'featuredMedia'])
            ->when($term !== '', function ($query) use ($term) {
                $query->where(function ($query) use ($term) {
                    $query->where('title', 'like', "%{$term}%")
                        ->orWhere('excerpt', 'like', "%{$term}%")
                        ->orWhere('body', 'like', "%{$term}%");
                });
            })
            ->latest('published_at')
            ->paginate(12)
            ->withQueryString();

        if ($term !== '') {
            SearchQuery::create([
                'query' => Str::limit($term, 190),
                'result_count' => $articles->total(),
                'session_hash' => hash('sha256', (string) session()->getId()),
                'searched_at' => now(),
            ]);
        }

        return view('pages.search', [
            'term' => $term,
            'articles' => $articles,
        ]);
    }
}
