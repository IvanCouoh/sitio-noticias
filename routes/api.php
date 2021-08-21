<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\ArticlesController;
use App\Http\Controllers\API\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/comentarios', CommentController::class);
Route::get('comentarios/{article_id}/noticia', [CommentController::class, 'getArticleComments']);
Route::get('comentarios/{comment_id}/ban', [CommentController::class, 'banComment']);
Route::get('noticias/recientes', [ArticlesController::class, 'getArticle']);
