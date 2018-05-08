<?php

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

Route::auth();

Route::group(['middleware' => 'auth'],function(){

	Route::get('/', 'home@index');
	Route::get('peminjaman','inventoryController@index');
	Route::get('pengembalian','inventoryController@pengembalianIndex');
	Route::post('pengembalian/simpan','inventoryController@pengembalian');
	Route::post('Inventory/simpan', 'inventoryController@simpan');
	Route::get('Inventory/simpan', 'inventoryController@simpan');
	Route::post('Inventory/update','inventoryController@update');
	Route::get('cetak_nota_pinjam/{id}','inventoryController@cetakNota');
	Route::get('getListPinjam/{id}','inventoryController@getPinjam');
	Route::get('cetak_peringatan_pinjam/{id}','inventoryController@cetakPeringatan');
	Route::get('cetak_peringatan_pinjam_terakhir/{id}','inventoryController@cetakTerakhir');
	Route::get('barang_belum_kembali','inventoryController@belumKembali');
	Route::get('cetak_peringatan_akhir/{id}','inventoryController@cetakAkhir');
	Route::get('laporan/laporan_barang','laporan@lap_barang');
	Route::get('laporan/laporan_pengembalian','laporan@lap_pengembalian');
	Route::get('laporan/laporan_status_barang','laporan@lap_status');
	Route::post('laporan/laporan_status_barang','laporan@lap_status');
	Route::get('cetakFilter/{id}','laporan@cetakLaporanStatus');
	Route::post('cetakFilter/{id}','laporan@cetakLaporanStatus');
	Route::get('cekStatus/{id}','laporan@filterStatus');

	Route::get('cetakBarang','laporan@cetakLaporanBarang');
	Route::get('cetakPengembalian','laporan@cetakLaporanPengembalian');

	Route::get('cetakDetail/{id}','laporan@cetakDetailBarangPinjam');

	Route::post('simpanPassword','home@ubahpassword');

	Route::get('dataSiswa','siswa@index');
	Route::post('methodSiswa','siswa@method');

	Route::get('barang/daftar','barangController@index');
	Route::get('barang/terima','barangController@create');
	Route::post('barang/terima','barangController@store');

	Route::post('barang/update','barangController@methodUpdate');
	Route::post('barang/delete','barangController@methodDelete');

	Route::get('referensi/jenisBarang','referensiController@jenis_barang');
	Route::get('referensi/daftarPengguna','referensiController@pengguna');

	Route::post('referensi/jenis/add','referensiController@add');
	Route::post('referensi/jenis/edit','referensiController@edit');
	Route::post('referensi/jenis/delete','referensiController@delete');

	Route::post('referensi/user/add','referensiController@addUser');
	Route::post('referensi/user/edit','referensiController@editUser');
	Route::post('referensi/user/delete','referensiController@deleteUser');

	Route::get('data/ambilPeminjam/{id}','inventoryController@ambilPeminjamEdit');
	Route::get('data/ambilList/{id}','inventoryController@ambilListbarang');

	Route::get('blacklist/{id}','inventoryController@blacklist');
	Route::get('unblacklist/{id}','inventoryController@unblacklist');
});