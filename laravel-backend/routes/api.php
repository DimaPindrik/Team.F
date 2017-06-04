<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/quote', [
  'uses' => 'QuoteController@postQuote',
  'middleware' => 'auth.jwt'
]);

Route::get('/quotes', [
  'uses' => 'QuoteController@getQuotes'
]);

Route::put('/quote/{id}', [
  'uses' => 'QuoteController@putQuote',
  'middleware' => 'auth.jwt'
]);

Route::delete('/quote/{id}', [
  'uses' => 'QuoteController@deleteQuote',
  'middleware' => 'auth.jwt'
]);

Route::post('/user', [
  'uses' => 'UserController@signup'
]);

Route::post('/user/signin', [
  'uses' => 'UserController@signin'
]);

Route::post('/user/logout', [
  'uses' => 'UserController@logout',
  'middleware' => 'auth.jwt'
]);

Route::get('/user/loggedin', [
  'uses' => 'UserController@loggedIn',
  'middleware' => 'auth.jwt'
]);

Route::get('/widgets', [
  'uses' => 'WidgetController@getWidgets'
]);

// Gallery Routes

Route::get('/widgets/Gallery/list', [
  'uses' => 'GalleryController@viewGalleryList'
]);
Route::post('/widgets/Gallery/save', [
  'uses' => 'GalleryController@saveGallery'
]);
Route::get('/widgets/Gallery/view/{id}', [
  'uses' => 'GalleryController@viewGalleryPics'
]);
Route::post('/widgets/Gallery/upload', [
  'uses' => 'GalleryController@doImageUpload'
]);

// end of Gallery routes
