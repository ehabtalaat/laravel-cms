<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontController@index')->name('welcome');
Route::get('/post/{slug}','FrontController@singlePost')->name('singlePost');
Route::get('/category/{id}','FrontController@category')->name('category');
Route::get('/tag/{id}','FrontController@tag')->name('tag');
Auth::routes();


Route::group(['prefix' => 'admin','middleware' =>[ 
    'auth','admin']],function(){
    Route::get('/dashboard', 'HomeController@index')->name('home');
	Route::resource('categories','CategoryController');
	Route::resource('posts','PostController');
	Route::get('trashedPosts','PostController@trashedPosts')->name('trashedPosts');
	Route::delete('trashedPosts/{id}','PostController@delete')->name('trashedPosts.delete');
   Route::get('trashedPosts/{id}','PostController@restore')->name('trashedPosts.restore');
   Route::resource('tags','TagController');
   Route::resource('users','UsersController');
   Route::get('user/makeadmin/{id}','UsersController@makeadmin')->name('users.makeadmin');
   Route::resource('/profile','ProfileController');
   Route::resource('/setting','SettingController');
});
Auth::routes();