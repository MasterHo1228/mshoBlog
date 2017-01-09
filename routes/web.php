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

Route::group(['prefix' => '/'], function () {
    //Static pages
    Route::get('/', 'StaticPagesController@home')->name('home');
    Route::get('/about', 'StaticPagesController@about')->name('about');

    //Articles
    Route::resource('articles', 'ArticlesController', ['only' => ['show']]);

    //Tags
    Route::resource('tags', 'TagsController', ['only' => 'index']);

    //前台
    Route::group(['middleware' => 'guest'], function () {
        Route::get('signin', 'SessionsController@create')->name('signin');
        Route::post('signin', 'SessionsController@store')->name('signin');
    });
});

//后台
Route::group(['prefix' => 'backyard'],function (){
    Route::group(['middleware' => 'auth'],function() {
        Route::get('/', 'backend\HomeController@index');
        Route::get('/index', 'backend\HomeController@index');
        Route::delete('/logout', 'Backend\Auth\LoginController@logout');
        Route::resource('articles', 'Backend\ArticlesController');
    });
    Route::group(['middleware' => 'guest'],function() {
        Route::get('login', 'Backend\Auth\LoginController@showLoginForm');
        Route::post('login', 'Backend\Auth\LoginController@login');
    });
});


//Users
//Route::get('/signup', 'UsersController@create')->name('signup');
//Route::resource('users', 'UsersController');
//Activation
//Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//Route::delete('signout', 'SessionsController@destroy')->name('signout');