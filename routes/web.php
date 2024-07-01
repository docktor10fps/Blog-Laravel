<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware'=>['auth','admin']], function () {
    
    Route::get('/role', [RoleController::class, '__invoke'])->name('role');

    });
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware'=>['auth','admin']], function () {
    
    Route::get('/index', [RoleController::class, '__invoke'])->name('role');
    
    });
