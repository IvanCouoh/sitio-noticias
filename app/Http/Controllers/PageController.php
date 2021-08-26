<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('site.home');
    }
}
