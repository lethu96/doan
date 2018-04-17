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
Route::get('/typeproduct','TypeProductController@index')->name('typeproduct');
Route::get('/typeproduct/destroy/{id}','TypeProductController@destroy');
Route::get('/typeproduct/update/{id}','TypeProductController@show');
Route::post('/typeproduct/update','TypeProductController@update')->name('updatetypeproduct');
Route::get('/typeproduct/create','TypeProductController@getStore');
Route::post('/typeproduct/create','TypeProductController@store');

Route::get('/company','CompanyController@index')->name('company');
Route::get('/company/destroy/{id}','CompanyController@destroy');
Route::get('/company/update/{id}','CompanyController@show');
Route::post('/company/update','CompanyController@update')->name('companyupdate');
Route::get('/company/create','CompanyController@getStore');
Route::post('/company/create','CompanyController@store');

Route::get('/user','UserController@index')->name('user');
Route::get('/user/destroy/{id}','UserController@destroy');
Route::get('/user/update/{id}','UserController@show');
Route::post('/user/update','UserController@update')->name('userupdate');
Route::get('/user/create','UserController@getStore');
Route::post('/user/create','UserController@store');

Route::get('/sale','SaleController@index')->name('sale');
Route::get('/sale/destroy/{id}','SaleController@destroy');
Route::get('/sale/update/{id}','SaleController@show');
Route::post('/sale/update','SaleController@update')->name('saleupdate');
Route::get('/sale/create','SaleController@getStore');
Route::post('/sale/create','SaleController@store');

Route::get('/size','SizeController@index')->name('size');
Route::get('/size/destroy/{id}','SizeController@destroy');
Route::get('/size/update/{id}','SizeController@show');
Route::post('/size/update','SizeController@update')->name('sizeupdate');
Route::get('/size/create','SizeController@getStore');
Route::post('/size/create','SizeController@store');

Route::get('/color', 'ColorController@index')->name('color');
Route::get('/color/destroy/{id}', 'ColorController@destroy');
Route::get('/color/update/{id}', 'ColorController@show');
Route::post('/color/update', 'ColorController@update')->name('colorupdate');
Route::get('/color/create', 'ColorController@getStore');
Route::post('/color/create', 'ColorController@store');

Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/destroy/{id}', 'ProductController@destroy');
Route::get('/product/update/{id}', 'ProductController@show');
Route::post('/product/update', 'ProductController@update')->name('productupdate');
Route::get('/product/create', 'ProductController@getStore');
Route::post('/product/create', 'ProductController@store');

Route::get('/bill', 'BillController@index')->name('bill');
Route::get('/bill/destroy/{id}', 'BillController@destroy');
Route::get('/bill/update/{id}', 'BillController@show');
Route::post('/bill/update', 'BillController@update')->name('billupdate');
Route::get('bill/create', 'BillController@getStore');
Route::post('/bill/create', 'BillController@store');

Route::get('/comment', 'CommentController@index')->name('comment');
Route::get('/comment/destroy/{id}', 'CommnetController@destroy');

Route::get('/phuotstyle', 'HomeController@showHome');
Route::get('/topproduct', 'ProductController@productTop');
Route::get('product/detail/{id}', 'HomeController@showDetail');
Route::get('/typeproduct/{id}', 'HomeController@typeProduct');

Route::get('/report', 'ReportController@overview')->name('report');