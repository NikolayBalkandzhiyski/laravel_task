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

Route::get('/', function () {
    return view('welcome')->with('title','Welcome');
});

Route::get('/home', function () {
    return view('home')->with('title','Home');
});

Route::get('login', 'LoginController@index');

Route::get('register', 'RegisterController@index');

Route::post('register', 'RegisterController@register');

Route::get('articles', 'ArticlesController@articles');

Route::get('article/{id}', 'ArticlesController@article');

Route::group(['middleware' => ['front']], function () {

    Route::get('admin/dashboard', '\Backpack\Base\app\Http\Controllers\AdminController@dashboard');

    Route::post('admin/login', '\Backpack\Base\app\Http\Controllers\Auth\LoginController@login');

    CRUD::resource('admin/article', 'Admin\ArticleCrudController');
});