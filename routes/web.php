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


Route::get('/', 'AuthController@pengaduan')->name('home1');
Route::get('/signup', 'AuthController@formdaftar')->name('formdaftar');
Route::get('/signin', 'AuthController@formLogin')->name('formLogin');
Route::post('/login', 'AuthController@Login')->name('Login');
Route::get('/logout', 'AuthController@logout')->name('Logout');
Route::get('/admin/logout', 'DashboardController@LogoutAdmin')->name('LogoutAdmin');

Route::get('/admin', 'PetugasController@loginformpetugas');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/loginpetugas', 'PetugasController@loginpetugas')->name('loginPetugas');

Route::get('/tambahpetugas', 'PetugasController@tambahpetugas')->name('tambahpetugas');
Route::get('/tanggapan/{pengaduan}', 'PengaduanController@show')->name('tanggapan');

Route::post('tanggapan/createOrUpdate', 'TanggapanController@createOrUpdate')->name('tanggapan.createOrUpdate');
Route::post('laporan/getLaporan', 'LaporanController@getLaporan')->name('getLaporan');

Route::post('select-desa', 'AuthController@store')
    ->name('dependent-dropdown.store');
Route::post('/register', 'AuthController@register')->name('Register');
Route::post('/store', 'PengaduanController@storePengaduan')->name('lapor');
Route::resource('petugas', 'PetugasController');
Route::resource('pengaduan', 'PengaduanController');
Route::resource('masyarakat', 'MasyarakatController');
Route::resource('laporan', 'LaporanController');


