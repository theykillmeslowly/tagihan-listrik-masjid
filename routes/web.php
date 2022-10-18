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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('beranda');
Route::get('/daftar-masjid', 'App\Http\Controllers\HomeController@daftarMasjid')->name('daftarMasjid');
Route::get('/pendaftaran', 'App\Http\Controllers\HomeController@pendaftaran')->name('pendaftaran');
Route::post('/pendaftaran', 'App\Http\Controllers\HomeController@pendaftaran')->name('pendaftaran');
Route::get('/bantuan', 'App\Http\Controllers\HomeController@bantuan')->name('bantuan');
Route::get('/bantuan/{id}', 'App\Http\Controllers\HomeController@viewBantuan')->name('view_bantuan');
Route::get('/hubungi-kami', 'App\Http\Controllers\HomeController@hubungiKami')->name('hubungiKami');

Route::get('/login', 'App\Http\Controllers\HomeController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\HomeController@login')->name('login');

Route::group(['prefix' => 'admin'], function (){
  Route::group(['middleware'=>'admin'], function (){
    Route::get('/index', 'App\Http\Controllers\AdminController@index');
    Route::group(['prefix'=>'masjid'], function (){
      Route::get('/', 'App\Http\Controllers\MasjidController@index');
    });
    Route::group(['prefix'=>'bantuan'], function (){
      Route::get('/', 'App\Http\Controllers\AdminController@bantuan');
    });
    Route::group(['prefix'=>'user'], function (){
      Route::get('/', 'App\Http\Controllers\UserController@index');
      Route::get('/tambah', 'App\Http\Controllers\UserController@tambah');
      Route::post('/tambah', 'App\Http\Controllers\UserController@tambah');
      Route::get('/edit/{id}', 'App\Http\Controllers\UserController@edit');
      Route::post('/edit/{id}', 'App\Http\Controllers\UserController@edit');

    });
    Route::get('/pendaftaran','App\Http\Controllers\MasjidController@pendaftaran');
    Route::get('/logout', 'App\Http\Controllers\AdminController@logoutAdmin');
  });
});