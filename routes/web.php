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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/forum', 'ForumController@index');
    Route::post('/forum', 'ForumController@store');
    Route::get('/forum/{forum}', 'ForumController@show');
    Route::post('/komentar', 'KomentarController@store');


    Route::get('/profile', 'UserController@index');
    Route::get('/beranda', 'UserController@beranda');
    Route::post('/beranda/komentar', 'UserController@komentarberanda');


    Route::get('/tugas', 'UserController@tugas');
});

Route::get('/admin', 'AdminController@index');
Route::get('/admin/kelas', 'AdminController@kelas');
Route::get('/admin/siswa', 'AdminController@siswa');
Route::post('/admin/kelas', 'AdminController@inputkelas');
Route::get('/admin/kelas/detail/{kelas}', 'AdminController@showkelas');
Route::get('/admin/siswa/detail/{user}', 'AdminController@showsiswa');
Route::post('/admin/siswa/{user}/addnilai', 'AdminController@addnilai');

Route::get('/admin/mapel', 'MapelController@index');
Route::get('/admin/mapel/{mapel}', 'MapelController@show');

Route::get('/admin/guru', 'AdminController@guru');
Route::get('/admin/guru/{guru}', 'AdminController@detailguru');


Route::get('/login', 'AuthController@login')->middleware('guest')->name('login');
Route::post('/postlogin', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');