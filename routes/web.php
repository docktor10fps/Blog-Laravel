<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowProfile\ShowController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;

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

    Route::get('/profile', [ShowController::class, '__invoke'])->name('profile.index');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/post/create', [CreateController::class, '__invoke'])->name('post.create');
    Route::post('/post/store', [StoreController::class, '__invoke'])->name('post.store');

});
