<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InsightsController extends Controller
{
    public function __invoke(Request $request): View
    {
        $articles = Article::published()
            ->with(['author', 'featuredMedia', 'categories'])
            ->latest('published_at')
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('categories', fn ($q) => $q->where('slug', $request->string('category')));
            })
            ->paginate(12)
            ->withQueryString();

        return view('pages.insights', [
            'articles' => $articles,
            'categories' => Category::orderBy('name')->get(),
            'activeCategory' => $request->string('category')->toString(),
        ]);
    }
}
