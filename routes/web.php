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

Auth::routes();

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.admin');

    Route::get('/dashboard/produk', 'ProductController@index')->name('produk.admin');
    Route::get('/dashboard/produk/cari', 'ProductController@cari')->name('cariproduk.admin');
    Route::get('/dashboard/produk/tambah', 'ProductController@tambahForm')->name('tampiltambah.admin');
    Route::post('/dashboard/produk/tambah', 'ProductController@tambahProduk')->name('tambahproduk.admin');
    Route::get('/dashboard/produk/ubah/{slug}', 'ProductController@editForm')->name('tampilubahproduk.admin');
    Route::post('/dashboard/produk/ubah/{slug}', 'ProductController@updateProduk')->name('updateproduk.admin');
    Route::delete('/dashboard/produk/hapus/{slug}', 'ProductController@hapusProduk')->name('hapusproduk.admin');
    Route::get('/dashboard/produk/detail/{slug}', 'ProductController@detailProduk')->name('detailproduk.admin');

    Route::get('/dashboard/kategori', 'CategoryController@index')->name('tampilkategori.admin');
    Route::post('/dashboard/kategori/tambah', 'CategoryController@tambahCategory')->name('tambahkategori.admin');
    Route::get('/dashboard/kategori/ubah/{slug}', 'CategoryController@editForm')->name('tampilubahkategori.admin');
    Route::post('/dashboard/kategori/ubah/{slug}', 'CategoryController@updateCategory')->name('updatekategori.admin');
    Route::delete('/dashboard/kategori/hapus/{slug}', 'CategoryController@hapusCategory')->name('hapuskategori.admin');

    Route::get('/dashboard/pengguna/cari', 'UserController@cari')->name('cariuser.admin');
    Route::get('/dashboard/pengguna', 'UserController@index')->name('user.admin');
    Route::get('/dashboard/pengguna/detail/{slug}', 'UserController@detailUser')->name('detailuser.admin');
    Route::get('/dashboard/pengguna/tambah', 'UserController@tampilForm')->name('tampiltambahpengguna.admin');
    Route::post('/dashboard/pengguna/tambah', 'UserController@tambahPengguna')->name('tambahpengguna.admin');

    Route::get('/dashboard/pemesanan', 'OrderController@index')->name('pemesanan.admin');
    Route::get('/dashboard/pemesanan/{slug}', 'OrderController@detail')->name('pemesananDetail.admin');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::post('/keranjang/{slug}', 'CartController@order')->name('tambahkeranjang.index');
    Route::delete('/keranjang/{slug}', 'CartController@hapusKeranjang')->name('hapuskeranjang.index');

    Route::get('/riwayat', 'HistoryController@index')->name('history.index');
    Route::get('/riwayat/{slug}', 'HistoryController@detail')->name('historydetail.index');

    Route::get('/riwayat/cetak_pdf/{slug}', 'HistoryController@cetak_pdf')->name('cetakhistorydetail.index');

    Route::get('/checkout', 'OrderController@tampilCheckout')->name('tampilcheckout.index');
    Route::post('/checkout/selesai', 'OrderController@checkout')->name('checkout.index');

    Route::get('/profil', 'UserController@profile')->name('profile.index');
    Route::post('/profil', 'UserController@updateProfile')->name('updateprofile.index');
});

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/produk', 'HomeController@produk')->name('produk.index');
Route::get('/produk/cari', 'HomeController@cari')->name('cariproduk.index');
Route::get('/produk/kategori/{slug}', 'HomeController@kategori')->name('produkkategori.index');
Route::get('/produk/{slug}', 'HomeController@show')->name('detailproduk.index');


Route::get('/keranjang', 'CartController@keranjang')->name('keranjang.index');

Route::post('/bayar/{id}', 'OrderController@bayar')->name('bayar');

Route::get('/about', 'AboutController@index')->name('about.index');
