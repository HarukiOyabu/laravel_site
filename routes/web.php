<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\TopController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PhotoRequest;
use App\Http\Requests\EditRequest;
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

Route::controller(AuthController::class)->group(function(){
    Route::get('auth/index', 'auth_index')->name('auth.index');
    Route::get('user/index', 'user_index')->name('user.index');
    Route::patch('auth/user/edit','user_update')->name('user_update');
    Route::get('post/index', 'post_index')->name('post.index');
    Route::post('post/index','post_store')->name('post.store');
    Route::delete('post/delete/{post}', 'post_destroy')->name('post.destroy');
    Route::get('post/edit/{post}', 'post_edit')->name('post.edit');
    Route::patch('post/update/{post}', 'post_update')->name('post.update');
    Route::get('work/index', 'work_index')->name('work.index');
    Route::post('work/index', 'work_store')->name('work.store');
    Route::delete('work/delete/{work}', 'work_destroy')->name('work.destroy');
    Route::get('work/edit/{work}','work_edit')->name('work.edit');
    Route::patch('work/update/{work}', 'work_update')->name('work.update');
});

Route::controller(TopController::class)->group(function(){
    Route::get('top', 'index')->name('top.index');
    Route::get('post/show/{post}', 'post_show')->name('post.show');
    Route::get('posts/index', 'post_all')->name('post.all');
    Route::get('work/show/{work}', 'work_show')->name('work.show');
    Route::get('works/index', 'work_all')->name('work.all');
});




//ログインに関するルーティング
Auth::routes();