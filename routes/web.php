<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/', 'PostController@index')->name('posts');
Route::get("/posts/{slug}", "PostController@show")->name('posts.show');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin') /* prefisso rotta */
->namespace('Admin') /* sottocartella controller */
->middleware('auth')  /* filtro autenticazione rotta */
->name('admin.')
->group(function () {
Route::resource('posts', 'PostController');
});
