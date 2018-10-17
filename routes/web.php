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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/email/verify/{token}', 'EmailController@verify')->name('email.verify');
Route::resource('post' , 'PostController');
Route::post('/post/imageUpload' , 'PostController@imageUpload');
Route::get('/v{column}', 'PostController@column')->name('post.column');
Route::post('/post/{post}/comment', 'PostController@comment')->name('post.comment');

Route::namespace('Admin')->group(function (){
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/welcome', 'HomeController@welcome')->name('admin.welcome');
    });
});
