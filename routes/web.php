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

Route::get('/', function () {
	return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('gallery', 'GalleryController@index')->middleware('auth');
Route::post('gallery', 'GalleryController@upload')->middleware('auth');
Route::delete('gallery/{id}', 'GalleryController@destroy')->middleware('auth');

Route::get('contact', 'ContactUsController@index');
Route::post('contact', 'ContactUsController@store');
Route::get('contact/all', 'ContactUsController@viewMessages')->middleware('admin');