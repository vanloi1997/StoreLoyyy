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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get','post'],'/admin','AdminController@login');

Route::group(['middleware' => ['auth']], function(){
    Route::get('admin/dashboard','AdminController@dashboard');
    Route::get('admin/settings','AdminController@settings');
    Route::get('admin/check-pwd','AdminController@chkPassword');
    Route::match(['get', 'post'],'admin/update-pwd', 'AdminController@updatePassword');

    //Categories Admin
    Route::match(['get','post'], 'admin/add-category', 'CategoryController@addCategory');
    Route::match(['get','post'], 'admin/edit-category/{id}', 'CategoryController@editCategory');
    Route::match(['get','post'], 'admin/delete-category/{id}', 'CategoryController@deleteCategory');
    Route::get('admin/view-category', 'CategoryController@viewCategory');
    //Product Routes
    Route::match(['get','post'], 'admin/add-product', 'ProductsController@addProduct');
    Route::match(['get','post'], 'admin/edit-product/{id}', 'ProductsController@editProduct');
    Route::get('admin/view-product', 'ProductsController@viewProduct');
    Route::get('admin/delete-product-image/{id}' ,'ProductsController@deleteImageProduct');
    Route::get('admin/delete-product/{id}', 'ProductsController@deleteProduct');
    //Product Attributes Routes
    Route::match(['get','post'], 'admin/add-attributes/{id}', 'ProductsController@addAttributes');
    Route::get('admin/delete-attributes/{id}', 'ProductsController@deleteAttributes');
});
Route::get('logout','AdminController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
