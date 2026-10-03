<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __invoke(Category $category): View
    {
        $articles = $category->articles()
            ->published()
            ->with(['author', 'featuredMedia'])
            ->latest('published_at')
            ->paginate(12);

        return view('pages.category', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }
}
