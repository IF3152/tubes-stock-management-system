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

//KELOMPOK ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['admin'] ], function(){
	Route::get('/', function () {
    	return view('admin.index');
	});
	Route::resource('kategori','Kategori');
	Route::resource('merek','Merek');
	Route::resource('supplier','Supplier');
	Route::resource('barang','Barang');
	//Stok Barang Thins
	Route::get('stok-barang/{id}','Barang@StokBarangIndex')->name('stok-barang');
	Route::get('stok-barang/{id}/create','Barang@StokBarangCreate')->name('stok-barang-create');
	Route::post('stok-barang/{id}/store','Barang@StokBarangStore')->name('stok-barang-store');
});