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

Route::prefix('/')->group(function () {
    //Static pages
    Route::name('frontend.home')->get('/', 'StaticPagesController@home');
    Route::paginate('/', 'StaticPagesController@home');#Optimized paginate route

    Route::name('frontend.about')->get('/about', 'StaticPagesController@about');

    //Articles
    Route::resource('articles', 'ArticlesController', [
        'only' => 'show',
        'names' => [
            'show' => 'frontend.articles.show',
        ],
    ]);
    Route::name('frontend.search')->get('search', 'ArticlesController@search');
    //Tags
    Route::resource('tags', 'TagsController', [
        'only' => 'show',
        'names' => [
            'show' => 'frontend.tags.articles',
        ],
    ]);
    Route::paginate('tags/{id}', 'TagsController@show');#Optimized paginate route

    //Users
    Route::resource('users', 'UsersController', [
        'only' => 'show',
        'names' => [
            'show' => 'frontend.users.profile',
        ],
    ]);
    Route::paginate('users/{user}', 'UsersController@show');#Optimized paginate route

    //前台
    Route::middleware('guest')->group(function () {
        Route::name('frontend.signin')->middleware('guest')->get('signin', 'SessionsController@create');
        Route::name('frontend.signin')->middleware('guest')->post('signin', 'SessionsController@store');
    });
    Route::name('frontend.signout')->middleware('auth')->delete('signout', 'SessionsController@destroy');
});

//后台
Route::prefix('backyard')->middleware('auth')->group(function () {
    Route::name('backend.index')->get('/', 'Backend\HomeController@index');
    Route::name('backend.logout')->delete('/logout', 'Backend\Auth\LoginController@logout');
    Route::resource('articles', 'Backend\ArticlesController', ['except' => ['show', 'destroy']]);

    Route::prefix('articles')->group(function () {
        Route::get('{article}/preview', 'Backend\ArticlesController@preview');
        Route::delete('{article}', 'Backend\ArticlesController@delete');
        Route::get('trash', 'Backend\ArticlesController@trash');
        Route::post('{article}/restore', 'Backend\ArticlesController@restore');
        Route::post('{article}/destroy', 'Backend\ArticlesController@destroy');
    });

    Route::resource('tags', 'Backend\TagsController', ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::prefix('tags')->group(function () {
        Route::get('{tag}/info', 'Backend\TagsController@info');
    });

    Route::resource('users', 'Backend\UsersController', ['only' => ['edit', 'update']]);
});
Route::prefix('backyard')->middleware('guest')->group(function () {
    Route::name('backend.login')->get('login', 'Backend\Auth\LoginController@showLoginForm');
    Route::name('backend.login')->post('login', 'Backend\Auth\LoginController@login');
});

//RSS Feed
Route::name('feed')->get('feed', 'RssController@index');

//预留注册模块
//Users
//Route::get('/signup', 'UsersController@create')->name('signup');
//Activation
//Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
