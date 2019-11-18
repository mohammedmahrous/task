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

Route::get('/', 'PagesController@all');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/page/{id}', 'PagesController@getpage');


Route::get('postss', 'PostaController@index');
Route::get('post/create', 'PostaController@create');
Route::post('posts/create', 'PostaController@store');
Route::get('post/edit/{id?}', 'PostaController@edit');
Route::post('post/update/{id?}', 'PostaController@update');
Route::get('readmore/{id?}', 'PostaController@show');
Route::delete('post/delete/{id?}', 'PostaController@destroy');

Route::get('/pages', 'PagesController@index');
Route::get('/page/create', 'PagesController@create');
Route::post('/pages/create', 'PagesController@store');

Route::get('/page/edit/{id}', 'PagesController@edit');
Route::post('/page/update/{id}', 'PagesController@update');
Route::delete('/page/delete/{id}', 'PagesController@destroy');

Route::get('/users', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/users/create', 'UserController@store');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/users/update/{id}', 'UserController@update');
Route::delete('/user/delete/{id}', 'UserController@destroy');

Route::post('/change', 'UserController@changeSiteName');
      

Route::group(['middleware' => ['auth.user']], function () {
});
Route::group(['middleware' => ['auth.admin']], function () {
    // login protected routes.
});