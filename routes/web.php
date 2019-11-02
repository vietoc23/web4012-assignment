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

Route::name('front.')->group(function () {
    Route::get('/', 'Frontpage\PostController@index')->name('index');

    Route::middleware('check_current_login')->group(function () {
        Route::get('register', 'Frontpage\RegisterController@create')->name('register.create');
    
        Route::post('register', 'Frontpage\RegisterController@store')->name('register.store');
        
        Route::get('login', 'Frontpage\LoginController@getLoginForm')->name('auth.login-form');
        
        Route::post('login', 'Frontpage\LoginController@login')->name('auth.login');
    });
    Route::get('signout', 'Frontpage\LoginController@signout')->name('auth.signout');
    
    Route::get('posts/{id}', 'Frontpage\PostController@show')->name('posts.show');

    Route::get('user/{id}/posts', 'Frontpage\PostController@showPostsByUsername')->name('user-posts.show');

    Route::get('category/{id}/posts', 'Frontpage\PostController@showPostsByCategory')->name('category-posts.show');
});

Route::name('user.')->prefix('user')->middleware('check_user_login')->group(function () {
    Route::post('posts/{post_id}/comments', 'Frontpage\PostController@storeComment')->name('posts.store-comment');
    
    Route::get('profile', 'Frontpage\UserController@profile')->name('show-profile');
    
    Route::post('profile', 'Frontpage\UserController@updateProfile')->name('update-profile');

    Route::get('posts', 'Frontpage\UserController@showPosts')->name('posts');

    Route::name('posts.')->prefix('posts')->group(function () {
        Route::get('create', 'Frontpage\UserController@createPost')->name('create');

        Route::post('create', 'Frontpage\UserController@storePost')->name('store');

        Route::get('edit/{id}', 'Frontpage\UserController@editPost')->name('edit')->middleware('check_post_ownership');

        Route::put('update/{id}', 'Frontpage\UserController@updatePost')->name('update')->middleware('check_post_ownership');

        Route::delete('delete/{id}', 'Frontpage\UserController@deletePost')->name('delete')->middleware('check_post_ownership');

    });

    Route::name('comments.')->prefix('comments')->middleware('check_comment_ownership')->group(function () {
        Route::get('edit/{id}', 'Frontpage\UserController@editComment')->name('edit');

        Route::put('update/{id}', 'Frontpage\UserController@updateComment')->name('update');

        Route::delete('delete/{id}', 'Frontpage\UserController@deleteComment')->name('delete');
    });

    Route::get('comments', 'Frontpage\UserController@showComments')->name('comments');

    Route::get('other-comments', 'Frontpage\UserController@showOtherComments')->name('other-comments');

    Route::get('change-password', 'Frontpage\UserController@changePasswordForm')->name('change-password-form');
    Route::put('change-password', 'Frontpage\UserController@changePassword')->name('change-password');
});



Route::name('admin.')->prefix('admin')->group(function () {
    Route::middleware('check_admin_login', 'check_admin_role')->group(function () {
        Route::view('/', 'admin.dashboard')->name('index');
    
        Route::resource('users', 'Admin\UserController');
    
        Route::resource('categories', 'Admin\CategoryController');
    
        Route::resource('posts', 'Admin\PostController');
    
        Route::resource('comments', 'Admin\CommentController');

        Route::get('signout', 'Admin\LoginController@signout')->name('signout');
    });
    
    Route::get('login', 'Admin\LoginController@loginForm')->name('login-form');
    
    Route::post('login', 'Admin\LoginController@authenticate')->name('login');
});
