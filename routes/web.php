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

//Route::get('/', function () {
//    return view('welcome');
Auth::routes();//});


// HomeController

Route::get('/home', 'HomeController@index');

//Route::post('/logout','Site/HomeController');
//Site/HomeController
Route::resource('site/home','Site\HomeController');
Route::get('/',[
    'as'=>'site.home.index',
    'uses'=>'Site\HomeController@index'
]);
Route::get('/login','Site\HomeController@getLogin');
Route::post('/login' ,[
    'as'=>'site.home.login',
    'uses'=> 'Site\HomeController@postLogin' 
]);


Route::get('/register','Site\HomeController@getregister');
Route::post('/register' ,[
    'as'=>'site.home.register',
    'uses'=> 'Site\HomeController@postregister'
]);
//Shopping Cart




////Catecontroller
Route::resource('categories','Site\CategoryController');
Route::get('/list','Site\CategoryController@index');//getlist = index
//
//

// Cart
Route::resource('/cart','Site\CartsController');

//Site/product
Route::resource('products','Site\ProductController');


Route::get('/product','Site\ProductController@getproduct');
Route::post('/product' ,['as'=>'site.product.index','uses'=> 'Site\ProductController@postproduct' ]);

Route::get('/product/detail/{id}','Site\ProductController@details');
Route::get('/product',[
    'as'=>'search',
    'uses'=>'Site\HomeController@Search'
]);

Route::get('/product/show','Site\ProductController@show');

//admin
Route::group(['prefix'=>'admin'],function ()
{
   Route::resource("/user", 'Admin\UserController' );
   Route::resource("/category", 'Admin\CategoryController' );
   Route::resource("/product", 'Admin\ProductController' );
});


Route::get('loai_sp/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'HomeController@loaisanpham']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'Site\CartsController@xoasanpham']);

