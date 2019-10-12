<?php

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

use Illuminate\Support\Facades\Route;


Route::get('/', 'Frontpage\PostController@index')->name('homepage');

Route::get('login', 'Frontpage\LoginController@getLoginForm')->name('auth.login-form');

Route::post('login', 'Frontpage\LoginController@login')->name('auth.login');


Route::get('posts/{id}', 'Frontpage\PostController@show');


Route::name('admin.')->prefix('admin')->middleware('admin-auth')->group(function () {
    Route::view('dashboard', 'admin.dashboard')->name('index');

    Route::resource('users', 'Admin\UserController');

    Route::resource('categories', 'Admin\CategoryController');

    Route::resource('posts', 'Admin\PostController');

    Route::resource('comments', 'Admin\CommentController');
});

Route::get('admin/login', 'Admin\LoginController@loginForm')->name('admin.login');

Route::post('admin/login', 'Admin\LoginController@authenticate');