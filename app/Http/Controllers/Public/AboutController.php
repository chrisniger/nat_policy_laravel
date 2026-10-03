<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        $page = Page::where('slug', 'about')->where('status', 'published')->first();

        return view('pages.about', [
            'page' => $page,
        ]);
    }
}
