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


Auth::routes();

//登录注册
Route::get('/', 'HomeController@index')->name('home');
Route::get('/email/verify/{token}', 'EmailController@verify')->name('email.verify');

//文章
Route::resource('post' , 'PostController');
Route::post('/post/imageUpload' , 'PostController@imageUpload');
Route::get('/v{column}', 'PostController@column')->name('post.column');
Route::post('/post/{post_id}/comment', 'PostController@comment')->name('post.comment');
Route::get('/post/{post_id}/zan' , 'PostController@zan')->name('post.zan');
Route::get('/post/{post_id}/unzan' , 'PostController@unzan')->name('post.unzan');

//个人中心
Route::get('/user/{user}/home' , 'UserController@home')->name('user.home');
Route::get('/user/{user}/fan' , 'UserController@fan')->name('user.fan');
Route::get('/user/{user}/unfan' , 'UserController@unfan')->name('user.unfan');

Route::namespace('Admin')->group(function (){
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/welcome', 'HomeController@welcome')->name('admin.welcome');
    });
});
