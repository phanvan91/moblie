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

Route::get('/','FrontController@index')->name('trangchu');
Route::get('cate/{id}/{slug}','FrontController@cate')->name('cate');
Route::get('detail/{id}/{slug}','FrontController@detail')->name('detail');
Route::get('contact','FrontController@getcontact')->name('getcontact');
Route::post('contact','FrontController@postcontact')->name('postcontact');

Route::get('mua-hang/{id}/{slug}','FrontController@getmuahang')->name('getmuahang');
Route::get('gio-hang','FrontController@getgiohang')->name('getgiohang');
Route::post('gio-hang','FrontController@postgiohang')->name('postgiohang');
Route::get('xoa-san-pham/{id}','FrontController@xoasanpham')->name('xoasanpham');
Route::get('update/{id}/{qty}','FrontController@update')->name('update');

Auth::routes();





Route::group(['prefix' => 'admin','middleware'=>'auth'],function(){
  Route::get('dashboard',function(){
    return view('admin.dashboard.main');
  })->name('dashboard');
  Route::group(['prefix'=>'user'],function(){
    Route::get('add','UserController@getAddUser')->name('getadduser');
    Route::post('add','UserController@postAddUser')->name('postadduser');
    Route::get('list','UserController@getListUser')->name('getlistuser');
    Route::get('edit/{id}','UserController@getEditUser')->name('getedituser');
    Route::post('edit/{id}','UserController@postEditUser')->name('postedituser');
    Route::get('del/{id}','UserController@getDelUser')->name('getdeluser');
    Route::get('logout','UserController@getlogout')->name('getlogout');
  });
  Route::group(['prefix'=>'cate'],function(){
    Route::get('add','CateController@getCateAdd')->name('getcateadd');
    Route::post('add','CateController@postCateAdd')->name('postcateadd');
    Route::get('list','CateController@getCateList')->name('getcatelist');
    Route::get('edit/{id}','CateController@getCateEdit')->name('getcateedit');
    Route::post('edit/{id}','CateController@postCateEdit')->name('postcateedit');
  });
  Route::group(['prefix'=>'product'],function(){
    Route::get('add','ProductController@getProductAdd')->name('getproductadd');
    Route::post('add','ProductController@postProductAdd')->name('postproductadd');
    Route::get('list','ProductController@getProductList')->name('getproductlist');
    Route::get('edit/{id}','ProductController@getProductEdit')->name('getproductedit');
    Route::post('edit/{id}','ProductController@postProductEdit')->name('postproductedit');
    Route::get('delimg/{id}','ProductController@delimgdetail')->name('getdelimgdetail');
    Route::get('del/{id}','ProductController@getProductDel')->name('getproductdel');
  });
  Route::group(['prefix'=>'don-hang'],function(){
    Route::get('/','DonHangController@getDonHang')->name('getdonhang');
    Route::get('chi-tiet/{id}','DonHangController@getChiTiet')->name('getchitiet');
    Route::get('del/{id}','DonHangController@getDel')->name('getdel');
  });
});
