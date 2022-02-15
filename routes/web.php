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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth','ceklevel:Super Admin,Admin Informatika,Admin Informasi,Admin Persandian,Admin Statistika,Mahasiswa Informatika,Mahasiswa Informasi,Mahasiswa Persandian,Mahasiswa Statistika']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();
Route::group(['middleware' => ['auth','ceklevel:Super Admin,Admin Informatika,Admin Informasi,Admin Persandian,Admin Statistika']], function() {
    Route::resource('/karyawan','DataKaryawanController');
    Route::resource('/mahasiswa', 'DataMahasiswaController');
    Route::resource('/user', 'DataUserController');

    Route::resource('/laporanLogBook', 'LaporanLogBookController');
    Route::resource('/laporanInformatika', 'LaporanInformatikaController');
    Route::resource('/laporanSistemInformasi', 'LaporanSistemInformasiController');
    Route::resource('/laporanPersandian', 'LaporanPersandianController');

    Route::get('/laporanDetailInformatika/{id}','LaporanInformatikaController@show');
    Route::get('/laporanDetailInformasi/{id}','LaporanSistemInformasiController@show');
    Route::get('/laporanDetailPersandian/{id}','LaporanPersandianController@show');
    Route::get('/laporanDetail/{id}','LaporanLogBookController@show');

    Route::get('/cetakInformatika/{id}', 'LaporanInformatikaController@cetak_pdf');
    Route::get('/cetakInformasi/{id}', 'LaporanSistemInformasiController@cetak_pdf');
    Route::get('/cetakPersandian/{id}', 'LaporanPersandianController@cetak_pdf');
    Route::get('/cetak/{id}', 'LaporanLogBookController@cetak_pdf');

});

Auth::routes();
Route::group(['middleware' => ['auth','ceklevel:Mahasiswa Informatika']], function() {
    Route::resource('/informatika','LogBook\InformatikaController');
    Route::get('/historyInformatika/{tglAwal}/{tglAkhir}', 'LogBook\InformatikaController@cetak');
    Route::get('/historyInformatika','LogBook\InformatikaController@lihat_history');
});

Auth::routes();
Route::group(['middleware' => ['auth','ceklevel:Mahasiswa Informasi']], function() {
    Route::resource('/informasi','LogBook\InformasiController');
    Route::get('/historyInformasi/{tglAwal}/{tglAkhir}', 'LogBook\InformasiController@cetak');
    Route::get('/historyInformasi','LogBook\InformasiController@lihat_history');
});

Auth::routes();
Route::group(['middleware' => ['auth','ceklevel:Mahasiswa Persandian']], function() {
    Route::resource('/persandian','LogBook\PersandianController');
    Route::get('/historyPersandian/{tglAwal}/{tglAkhir}', 'LogBook\PersandianController@cetak');
    Route::get('/historyPersandian','LogBook\PersandianController@lihat_history');
});

Auth::routes();
Route::group(['middleware' => ['auth','ceklevel:Mahasiswa Statistika']], function() {
    Route::resource('/logBook','LogBook\LogBookController');
    Route::get('/history/{tglAwal}/{tglAkhir}', 'LogBook\LogBookController@cetak');
    Route::get('/history','LogBook\LogBookController@lihat_history');
});




