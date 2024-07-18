<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowProfile\ProfileShowController;
use App\Http\Controllers\Post\PostCreateController;
use App\Http\Controllers\Post\PostStoreController;
use App\Http\Controllers\Post\PostEditController;
use App\Http\Controllers\Post\PostUpdateController;
use App\Http\Controllers\Post\PostDeleteController;
use App\Http\Controllers\Comment\CommentStoreController;
use App\Http\Controllers\Comment\CommentShowController;
use App\Http\Controllers\Comment\CommentUpdateController;
use App\Http\Controllers\Comment\CommentEditController;
use App\Http\Controllers\Comment\CommentDeleteController;
use Illuminate\Auth\Middleware\Authorizecan;
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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('/role', [RoleController::class, '__invoke'])->name('role');
    });

    Route::get('/profile', [ProfileShowController::class, '__invoke'])->name('profile.index');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/post/create', [PostCreateController::class, '__invoke'])->name('post.create');
    Route::post('/post/store', [PostStoreController::class, '__invoke'])->name('post.store');
    Route::get('/post/{post}/edit', [PostEditController::class, '__invoke'])->name('posts.edit');
    Route::put('/post/{post}', [PostUpdateController::class, '__invoke'])->name('posts.update');
    Route::delete('/post/{id}', [PostDeleteController::class, '__invoke'])->name('posts.destroy');

    Route::post('/comment/store', [CommentStoreController::class, '__invoke'])->name('comment.store');
    Route::get('/comment/show/{id}', [CommentShowController::class, '__invoke'])->name('comment.show');
    Route::delete('/comment/delete/{id}', [CommentDeleteController::class, '__invoke'])->name('comment.destroy');
    Route::get('/comment/edit/{id}', [CommentEditController::class, '__invoke'])->name('comment.edit');
    Route::put('/comment/update/{id}', [CommentUpdateController::class, '__invoke'])->name('comments.update');

});
