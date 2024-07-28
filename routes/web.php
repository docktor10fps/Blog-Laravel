<?php

use App\Http\Controllers\Comment\CommentDeleteController;
use App\Http\Controllers\Comment\CommentEditController;
use App\Http\Controllers\Comment\CommentShowController;
use App\Http\Controllers\Comment\CommentStoreController;
use App\Http\Controllers\Comment\CommentUpdateController;
use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Follow\UnfollowController;
use App\Http\Controllers\Post\PostCreateController;
use App\Http\Controllers\Post\PostDeleteController;
use App\Http\Controllers\Post\PostEditController;
use App\Http\Controllers\Post\PostStoreController;
use App\Http\Controllers\Post\PostUpdateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\ShowProfile\ProfileDeleteController;
use App\Http\Controllers\ShowProfile\ProfileEditController;
use App\Http\Controllers\ShowProfile\ProfileShowController;
use App\Http\Controllers\ShowProfile\ProfileUpdateController;
use App\Http\Controllers\Tag\ShowTagController;
use Illuminate\Auth\Middleware\Authorizecan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
    Route::post('/search', [SearchController::class, '__invoke'])->name('search');


    Route::get('/profile/{user_id}', [ProfileShowController::class, '__invoke'])->name('profile.index');
    Route::get('/profile/edit/{id}', [ProfileEditController::class, '__invoke'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileUpdateController::class, '__invoke'])->name('profile.update');
    Route::delete('/profile/delete/{id}', [ProfileDeleteController::class, '__invoke'])->name('profile.destroy');
    Route::get('/home', [\App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');

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

    Route::post('/follow/{user}', [FollowController::class, '__invoke'])->name('follow');
    Route::post('/unfollow/{user}', [UnfollowController::class, '__invoke'])->name('unfollow');

    Route::get('/tag/{id}', [ShowTagController::class, '__invoke'])->name('tag.index');




});
