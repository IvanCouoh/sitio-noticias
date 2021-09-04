<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PageController extends Controller
{
    public function home()
    {
        return view('site.home');
    }

    public function details($id)
    {

        $article['article'] = Article::findOrFail($id);
        return view('site.article-details', $article);
    }
}
