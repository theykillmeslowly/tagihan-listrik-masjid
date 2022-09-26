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
Route::get('/bantuan', 'App\Http\Controllers\HomeController@bantuan')->name('bantuan');
Route::get('/hubungi-kami', 'App\Http\Controllers\HomeController@hubungiKami')->name('hubungiKami');

Route::get('/login', 'App\Http\Controllers\HomeController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\HomeController@login')->name('login');

