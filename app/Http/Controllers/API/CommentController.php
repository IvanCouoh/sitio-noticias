<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = $request['author'];
        if(empty($author)){
            $request['author'] = "Anonimo";
        }
        Comment::create($request->all());
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

    /* Devuelce articulo con todos sus comentarios */
    public function getArticleComments($article_id){
        $article = Article::with(['comments'])->where('id', $article_id)->get();
        return $article;
    }

    /* dvuelve articulo con sus comentarios no baneados */
    public function getArticleCommentsNotBanned($article_id){
        $article = Article::with([
                                'comments' => function($query){
                                    return $query->where('is_banned', false);
                                },
                            ])
                            ->where('id', $article_id)
                            ->first();
        return $article;
    }

    public function banComment($comment_id){
        $comment = Comment::findOrFail($comment_id);

        /* Para que funcione como toggle */
        if($comment->is_banned == true){
            $comment->is_banned = false;
        }else{
            $comment->is_banned = true;
        }

        $comment->save();
        return [
            'message' => 'comment banned'
        ];
    }

    public function getCommentArticle($article_id){
        $comment = Article::with(['comments'])->where('id','=',$article_id)->get();
        return $comment;
    }
}
