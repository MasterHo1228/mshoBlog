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

//Static pages
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/about', 'StaticPagesController@about')->name('about');

//Users
Route::get('/signup', 'UsersController@create')->name('signup');
//Route::resource('users', 'UsersController');
//Activation
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//Sessions
//Route::get('signin','SessionsController@create')->name('signin');
//Route::post('signin','SessionsController@store')->name('signin');
//Route::delete('signout', 'SessionsController@destroy')->name('signout');

//Articles
Route::resource('articles', 'ArticlesController', ['only' => ['create', 'show', 'store', 'edit', 'update', 'destroy']]);

//backend
Route::group(['prefix' => 'backyard', 'middleware' => 'auth'], function () {
    Route::resource('home', 'Backend\HomeController');
    Route::resource('article', 'Backend\ArticlesController');
});