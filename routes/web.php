<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\API\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryGroupController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\PageController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    // Route::resource('categorias', CategoryController::class);

    Route::resource('grupo_categoria', CategoryGroupController::class);

    Route::resource('noticias', ArticleController::class);

    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
});

Route::get('/inicio', [PageController::class, 'home'])->name('site.home');

