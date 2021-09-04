<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getArticle()
    {
        $article = Article::with(['category'])->orderByRaw('created_at DESC')->take(4)->get();
        return $article;
    }

    public function getArticlesByCategoryId($id){
        $articles = Category::with(['articles', 'articles.category'])->where('id', $id)->first()->articles;

        return $articles;
    }

    public function getArticlesId($id){
        $articles = Article::where('id', $id)->first();

        return $articles;
    }

    public function getArticleCategory(){
        $articles = Article::with(['category'])->get();
        return $articles;
    }
}
