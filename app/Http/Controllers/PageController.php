<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\Comment;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('site.home');
    }

    public function details($id)
    {

        $article['article'] = Article::findOrFail($id);
        return view('site.articleDetail', $article);
    }
}
