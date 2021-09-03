<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryGroupController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

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

/* Admin routes without auth protection */
Route::prefix('admin')->group(function () {
    Auth::routes(['register'=>false, 'reset'=>false]);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

/* Admin routes with auth protection */
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('categorias', CategoryController::class);

    Route::get('perfil', [UserController::class, 'profileEdit'])->name('admin.profile.edit');
    Route::patch('perfil/{id}', [UserController::class, 'profileUpdate'])->name('admin.profile.update');

    Route::resource('grupo_categoria', CategoryGroupController::class);

    Route::resource('noticias', ArticleController::class);

    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
});


/* Site routes */
Route::get('/', [PageController::class, 'home'])->name('site.home');
Route::get('noticia/{id}', [PageController::class, 'details'])->name('site.details');
