<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class TagController extends Controller
{
    public function __invoke(Tag $tag): View
    {
        $articles = $tag->articles()
            ->published()
            ->with(['author', 'featuredMedia'])
            ->latest('published_at')
            ->paginate(12);

        return view('pages.category', [
            'category' => $tag,
            'articles' => $articles,
            'isTag' => true,
        ]);
    }
}
