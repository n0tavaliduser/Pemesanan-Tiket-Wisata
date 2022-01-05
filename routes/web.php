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

//----------------Pelanggan--------------//

Route::get('/','HomeController@index');

Route::get('/Login','PelangganController@login');
Route::post('/PostLogin','PelangganController@postlogin');
Route::get('/Register','PelangganController@register');
Route::post('/AksiRegister','PelangganController@store');
Route::get('/Logout','PelangganController@logout');
Route::get('/Profil','PelangganController@profil');


Route::get('/FormTiketWisata', function () {
    return view('Pelanggan.halaman.FormTiketWisata');
});
Route::get('/FormTiketWisata{id}','PemesananController@index');
Route::post('/AksiPemesanan','PemesananController@store');

Route::get('/Pembayaran{id}','PembayaranController@index');
Route::post('/AksiPembayaran','PembayaranController@store');
Route::get('/Pembayaran', function () {
    return view('Pelanggan.halaman.Pembayaran');
});
Route::get('/CariPembayaran','PembayaranController@cariPembayaran');

Route::get('/Tiket{id_pemesanan}','TiketController@index');
Route::get('/Tiket', function () {
    return view('Pelanggan.halaman.Tiket');
});
Route::get('/CariTiket','TiketController@cariTiket');
Route::get('/CetakTiket{id_pemesanan}','TiketController@cetakTiket');





// --------------Admin-------------------//
Route::get('/admin/DashboardAdmin', function () {
    return view('Admin.halaman.DashboardAdmin');
});

Route::get('/admin/LoginAdmin','LoginAdminController@login');
Route::post('/admin/LoginPost','LoginAdminController@postLogin');
Route::get('/admin/Logout','LoginAdminController@logout');

Route::get('/admin/MengelolaTempatWisata','MengelolaTempatWisataController@index');
Route::get('/admin/TambahTempatWisata','MengelolaTempatWisataController@tambah');
Route::post('/admin/AksiTambahTempatWisata','MengelolaTempatWisataController@store');
Route::get('/admin/UbahTempatWisata{id}','MengelolaTempatWisataController@edit');
Route::post('/admin/AksiUbahTempatWisata{id}','MengelolaTempatWisataController@update');
Route::get('/admin/HapusTempatWisata{id}','MengelolaTempatWisataController@delete');

Route::get('/admin/MengelolaGaleri','MengelolaGaleriController@index');
Route::get('/admin/TambahGaleri','MengelolaGaleriController@tambah');
Route::post('/admin/AksiTambahGaleri','MengelolaGaleriController@store');
Route::get('/admin/HapusGaleri{id}','MengelolaGaleriController@delete');

Route::get('/admin/MengelolaPemesanan','MengelolaPemesananController@index');
Route::get('/admin/UbahPemesanan{id}','MengelolaPemesananController@edit');
Route::post('/admin/AksiUbahPemesanan{id}','MengelolaPemesananController@update');
Route::get('/admin/AksiKonfirmasi{id}','MengelolaPemesananController@konfirmasi');
Route::get('/admin/BatalPemesanan{id}','MengelolaPemesananController@dibatalkan');

Route::get('/admin/MengelolaPembayaran','MengelolaPembayaranController@index');
Route::get('/admin/ValidasiBayar{id}','MengelolaPembayaranController@validasiBayar');
Route::get('/admin/BayarBatal{id}','MengelolaPembayaranController@bayarBatal');

