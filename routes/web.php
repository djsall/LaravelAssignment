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

Route::get('gallery', 'GalleryController@index');
Route::post('gallery', 'GalleryController@upload')->middleware('auth');
Route::delete('gallery/{id}', 'GalleryController@destroy')->middleware('auth');

Route::get('contact', 'ContactUsController@index');
Route::post('contact', 'ContactUsController@store');
Route::get('contact/all', 'ContactUsController@viewMessages')->middleware('admin');

Route::get('nonprofit/1', 'NonprofitController@page1');
Route::get('nonprofit/2', 'NonprofitController@page2');
Route::get('nonprofit/3', 'NonprofitController@page3');
Route::get('nonprofit/4', 'NonprofitController@page4');
Route::get('nonprofit/5', 'NonprofitController@page5');