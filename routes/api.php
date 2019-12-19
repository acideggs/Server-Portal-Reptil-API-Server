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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk kategori

Route::get('kategori', 'KategoriController@search');

Route::post('kategori', 'KategoriController@create');

Route::put('kategori', 'KategoriController@update');

Route::delete('kategori', 'KategoriController@delete');


// Route untuk artikel

Route::get('artikel', 'ArtikelController@search');

Route::post('artikel', 'ArtikelController@create');

Route::put('artikel', 'ArtikelController@update');

Route::delete('artikel', 'ArtikelController@delete');


// Route untuk Komentar

Route::get('komentar', 'KomentarController@search');

Route::post('komentar', 'KomentarController@create');

Route::put('komentar', 'KomentarController@update');

Route::delete('komentar', 'KomentarController@delete');


// Route untuk user

Route::get('user', 'UserController@search');

Route::post('user', 'UserController@create');

Route::put('user', 'UserController@update');

Route::delete('user', 'UserController@delete');