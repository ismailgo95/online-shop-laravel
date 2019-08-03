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

Route::resource('/', 'StoreController');
Route::post('/product/{id}', 'StoreController@addCart');
Route::get('/products', 'StoreController@product');
Route::get('/aboute', 'StoreController@aboute');
// ini penambahan Route Masuk ke Product detail
// Route::get('/product/detail', function(){
//     return view('store.product_detail');
// });

Route::get('/product/{id}', 'StoreController@detail')->name('product');
Route::get('/contact', 'StoreController@contact');
Route::get('/checkout', 'StoreController@checkout');
Route::get('/product/search', 'StoreController@search');
// Carts Guys
Route::get('/cart', 'CartController@index');
Route::post('/cart/update', 'CartController@rubahqty');
Route::get('/cart/{id}/hapus', 'CartController@destroy');
Route::post('/cart/add', 'CartController@store');
Route::get( '/cart/{id}', 'CartController@index');


Route::post('/sale/add', 'SaleController@store');
Route::get('/sale/thanks', 'SaleController@thanks');


// Proses Status dan Upload Bukti
Route::get('/status', 'StatusKirimController@index');
Route::get('/status/{id}/hapus', 'StatusKirimController@hapus');
Route::post('/status/upload', 'StatusKirimController@upload');
Route::post('/status/{id}/edit', 'StatusKirimController@edit');
Route::patch('/status/{id}/terimabarang', 'StatusKirimController@terimabarang');



Route::get('/product/search', 'StoreController@search');

Auth::routes();

Route::get('/dashboard', 'AdminController@index');


Route::prefix('/dashboard')->group(function () {
    Route::resource("/product", "Admin\ProductController");
    Route::resource("/categorie", "Admin\CategorieController");
    Route::resource('/pages', 'Admin\PageController');
    Route::resource('/template', 'Admin\TemplateController');

    Route::get('/template-edit', 'TemplateController@edit');
    Route::get('/create', 'TemplateController@create');
    Route::get('/insert-insert', 'TemplateController@store');

    Route::get("/template", "Admin\TemplateController@index");
    Route::get('/template/{id}/select', 'Admin\TemplateController@select');
    Route::post('/template/{id}/edit', 'TemplateController@edit');
    Route::post('/template/{id}/edit', 'TemplateController@edit');

    Route::get('/saleitem', 'Admin\SaleController@index');
    Route::post('/saleitem/search', 'Admin\SaleController@search');
    Route::get('/saleitem/{id}/detail', 'Admin\SaleController@detail');
    Route::get('/saleitem/{id}/cetak', 'Admin\SaleController@cetak');
    Route::delete('/saleitem/{id}/destroy', 'Admin\SaleController@destroy');
    Route::get('/statusadmin/{id}/status', 'Admin\SaleController@status');
    Route::post('/statusadmin/{id}/update', 'Admin\SaleController@update');

    Route::get('/notif/read', 'Admin\notifController@read');

    
});
