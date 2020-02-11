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
    return redirect()->route('home');
});

Auth::routes();

Route::group(["middleware" => "auth"], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile/{id}', 'ProfileController@update')->name('profileUpdate');
});
Route::group(["middleware" => ["role.adminUtama", "auth"]], function () {
    Route::resource("informasiToko", "InformasiTokoController");
    Route::resource("users", "UserController");
});
Route::group(["middleware" => ["role.adminGudang", "auth"]], function () {
    Route::resource("currencies", "CurrencyController");
    Route::resource("ppn", "PpnController");
    Route::resource("units", "UnitController");
    Route::resource("persentaseKeuntungan", "PersentaseKeuntunganController");
    Route::resource("bahan", "BahanController");
    Route::resource("kategoriProduk", "KategoriController");
    Route::resource("produk", "ProdukController");
    Route::resource("produkKosong", "ProdukKosongController");
    Route::get('produkMasuk', 'ProdukMasukController@index')->name('produkMasuk');
});
Route::group(["middleware" => ["role.kasir", "auth"]], function () {
    Route::resource('transaksi', 'CartController');
    Route::get('transaksiClean', 'CartController@transaksiClean')->name('transaksiClean');
    Route::resource("produk", "ProdukController");
    Route::resource('checkout', 'CheckoutController');
    Route::resource('invoice', 'InvoiceController');
});

Route::group(["prefix" => "print"], function () {
    Route::get('users', 'UserController@print')->name("printUsers");

    Route::get('kategoriProduk', 'KategoriController@print')->name("printKategoriProduk");
    Route::get('produkMasuk', 'ProdukMasukController@print')->name("printProdukMasuk");
    Route::get('produkKosong', 'ProdukKosongController@print')->name("printProdukKosong");

    Route::get('riwayatTransaksi', 'InvoiceController@print')->name("printRiwayatTransaksi");
});
