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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sample-mail', 'MailController@sample');

Route::resource('cabang', 'CabangsController');

//KELOMPOK ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['admin'] ], function(){
	Route::get('/', function () {return view('admin.index');})->name('adminpage');
	Route::resource('/user', 'AdminUserController');
	Route::resource('kategori','Kategori');
	Route::resource('merek','Merek');
	Route::resource('supplier','Supplier');
	Route::resource('barang','Barang');
	//Stok Barang Thins
	Route::get('stok-barang/{id}','Barang@StokBarangIndex')->name('stok-barang');
	Route::get('stok-barang/{id}/create','Barang@StokBarangCreate')->name('stok-barang-create');
	Route::post('stok-barang/{id}/store','Barang@StokBarangStore')->name('stok-barang-store');

	//Perubahan Status Pemesanan
	Route::get('pemesanan', 'Pemesanan@Admin')->name('pemesanan-admin');
	Route::get('pemesanan/{id}', 'Pemesanan@GantiStatusView')->name('ganti-status-view');
	Route::patch('pemesanan/{id}', 'Pemesanan@GantiStatusStore')->name('ganti-status-store');

});

Route::group(['middleware' => ['usercabang'] ], function(){
	Route::resource('pemesanan','Pemesanan');
	Route::post('/pemesanan/{id}', 'Pemesanan@Finish')->name('pemesanan-finish');

	Route::get('/pemesanan/rincian/{id}', 'Pemesanan@Rincian')->name('rincian');

	Route::post('/pemesanan/rincian/{id}', 'RincianPemesanan@store')->name('rincian-store');
	Route::delete('/pemesanan/rincian/{id}', 'RincianPemesanan@destroy')->name('rincian-store');
	//JSON
	Route::get('rincianpemesanan/{id}', 'RincianPemesanan@show');
	Route::get('semuabarang', 'RincianPemesanan@all');
});