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

Route::get('/', 'frontendController@home');

//adminController
Route::get('/admin','adminController@slider');
Route::get('/admin/createSlider', 'adminController@createSlider');
Route::post('/addslider', 'adminController@storeSlider');
Route::get('/admin/{id}','adminController@editSlider');
Route::put('/admin/{id}/edit','adminController@updateSlider');
Route::put('/deleteslider/{id}/','adminController@deleteslider');


Route::get('/produk','adminController@produk');
Route::get('/createProduk', 'adminController@createProduk');
Route::post('/addproduct', 'adminController@storeProduk');
Route::get('/produk/{id}','adminController@editProduk');
Route::put('/produk/{id}/edit','adminController@updateProduk');
Route::put('/deleteProduk/{id}/','adminController@deleteProduk');

Route::get('/pesananAdmin','adminController@pesananAdmin');
Route::get('/viewPesanan/{id}','adminController@viewPesanan');
Route::put('/viewPesanan/{id}/approve','adminController@approvePesanan');
Route::get('/pesananKonfrmAdmin','adminController@pesananKonfrmAdmin');

Route::get('/pesan/{id}','userController@formPesan');
Route::post('/addpesanan','userController@storePesanan');
Route::get('/pesanan','userController@pesanan');
Route::get('/upload/{id}','userController@upload');
Route::put('/upload/{id}/update','userController@uploadBukti');
Route::get('/kwitansi/{id}','userController@viewKwitansi');

// Authentication routes...
Route::get('loginPage',['as' => 'loginPage','uses'=>'LoginController@index']);
Route::get('error', ['as'=> 'error','uses'=>'ManageFrontendController@error']);
Route::get('dashboard', 'AuthController@getRoot');
Route::post('loginPage/postLogin', 'LoginController@postLogin');
Route::get('logout', 'LoginController@logout');
