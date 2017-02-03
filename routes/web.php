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
    Route::get('/', 'StaticPagesController@home')->name('frontend.home');
    Route::paginate('/', 'StaticPagesController@home');#Optimized paginate route

    Route::get('/about', 'StaticPagesController@about')->name('frontend.about');

    //Articles
    Route::resource('articles', 'ArticlesController', [
        'only' => 'show',
        'names' => [
            'show' => 'frontend.articles.show',
        ],
    ]);
    Route::get('search', 'ArticlesController@search')->name('frontend.search');
    //Tags
    Route::resource('tags', 'TagsController', [
        'only' => 'show',
        'names' => [
            'show' => 'frontend.tags.articles',
        ],
    ]);
    Route::paginate('tags/{user}', 'TagsController@show');#Optimized paginate route

    //Users
    Route::resource('users', 'UsersController', [
        'only' => 'show',
        'names' => [
            'show' => 'frontend.users.profile',
        ],
    ]);
    Route::paginate('users/{user}', 'UsersController@show');#Optimized paginate route

    //前台
    Route::group(['middleware' => 'guest'], function () {
        Route::get('signin', 'SessionsController@create')->name('frontend.signin');
        Route::post('signin', 'SessionsController@store')->name('frontend.signin');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::delete('signout', 'SessionsController@destroy')->name('frontend.signout');
    });
});

//后台
Route::group(['prefix' => 'backyard'],function (){
    Route::group(['middleware' => 'auth'],function() {
        Route::get('/', 'Backend\HomeController@index')->name('backend.index');
        Route::delete('/logout', 'Backend\Auth\LoginController@logout')->name('backend.logout');
        Route::resource('articles', 'Backend\ArticlesController', ['except' => ['show', 'destroy']]);

        Route::group(['prefix' => 'articles'], function () {
            Route::get('{article}/preview', 'Backend\ArticlesController@preview');
            Route::delete('{article}', 'Backend\ArticlesController@delete');
            Route::get('trash', 'Backend\ArticlesController@trash');
            Route::post('{article}/restore', 'Backend\ArticlesController@restore');
            Route::post('{article}/destroy', 'Backend\ArticlesController@destroy');
        });

        Route::resource('tags', 'Backend\TagsController', ['only' => ['index', 'store', 'update', 'destroy']]);
        Route::group(['prefix' => 'tags'], function () {
            Route::get('{tag}/info', 'Backend\TagsController@info');
        });

        Route::resource('users', 'Backend\UsersController', ['only' => ['edit', 'update']]);
    });
    Route::group(['middleware' => 'guest'],function() {
        Route::get('login', 'Backend\Auth\LoginController@showLoginForm')->name('backend.login');
        Route::post('login', 'Backend\Auth\LoginController@login')->name('backend.login');
    });
});

//RSS Feed
Route::get('feed', 'RssController@index')->name('feed');

//预留注册模块
//Users
//Route::get('/signup', 'UsersController@create')->name('signup');
//Activation
//Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
