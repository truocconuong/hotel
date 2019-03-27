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


Route::group(['prefix' => 'admin','as' => 'admin.'], function (){
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/listuser', 'UserController@datalistuser')->name('users.data');
    Route::post('/users/', 'UserController@store')->name('users.store');
    Route::get('/users/{id}', 'UserController@show')->where('id','[0-9]+')->name('users.show');
    Route::post('/users/{id}', 'UserController@update')->name('users.update');
    Route::delete('/users/{id}', 'UserController@delete')->name('users.delete');

    Route::get('/loaiphong', 'KroomController@index')->name('loaiphong.index');
    Route::get('/loaiphong/create', 'KroomController@create')->name('loaiphong.create');
    Route::post('/loaiphong/', 'KroomController@store')->name('loaiphong.store');
    Route::get('/loaiphong/listphong', 'KroomController@datalistphong')->name('loaiphong.data');
    Route::get('/loaiphong/{id}', 'KroomController@show')->where('id','[0-9]+')->name('loaiphong.show');
    Route::put('/loaiphong/{id}', 'KroomController@update')->name('loaiphong.update');
    Route::delete('/loaiphong/{id}', 'KroomController@delete')->name('loaiphong.delete');

    Route::get('/phong', 'RoomController@index')->name('phong.index');
    Route::post('/phong/', 'RoomController@store')->name('phong.store');
    Route::get('/phong/listphong', 'RoomController@datalistroom')->name('phong.data');
    Route::get('/phong/{id}', 'RoomController@show')->where('id','[0-9]+')->name('phong.show');
    Route::post('/phong/{id}', 'RoomController@update')->name('phong.update');
    Route::delete('/phong/{id}', 'RoomController@delete')->name('phong.delete');


    Route::get('/dichvu', 'ServiceController@index')->name('dichvu.index');
    Route::post('/dichvu/', 'ServiceController@store')->name('dichvu.store');
    Route::get('/dichvu/listdichvu', 'ServiceController@datalistdichvu')->name('dichvu.data');
    Route::get('/dichvu/{id}', 'ServiceController@show')->where('id','[0-9]+')->name('dichvu.show');
    Route::post('/dichvu/{id}', 'ServiceController@update')->name('dichvu.update');
    Route::delete('/dichvu/{id}', 'ServiceController@delete')->name('dichvu.delete');

    Route::get('/khachhang', 'CustomerController@index')->name('khachhang.index');
    Route::post('/khachhang/', 'CustomerController@store')->name('khachhang.store');
    Route::get('/khachhang/listkhachhang', 'CustomerController@datalistkhachhang')->name('khachhang.data');
    Route::get('/khachhang/{id}', 'CustomerController@show')->where('id','[0-9]+')->name('khachhang.show');
    Route::put('/khachhang/{id}', 'CustomerController@update')->name('khachhang.update');
    Route::delete('/khachhang', 'CustomerController@delete')->name('khachhang.delete');

    Route::get('/datphong', 'OrderController@index')->name('datphong.index');
    Route::post('/datphong/', 'OrderController@store')->name('datphong.store');
    Route::get('/datphong/listdatphong', 'OrderController@datalistroder')->name('datphong.data');
    Route::get('/datphong/{id}', 'OrderController@show')->where('id','[0-9]+')->name('datphong.show');
    Route::post('/datphong', 'OrderController@update')->name('datphong.update');
    Route::delete('/datphong', 'OrderController@delete')->name('datphong.delete');

    Route::get('/thuephong', 'CheckinController@index')->name('thuephong.index');
    Route::post('/thuephong/', 'CheckinController@store')->name('thuephong.store');
    Route::get('/thuephong/listthuephong', 'CheckinController@datalistroder')->name('thuephong.data');
    Route::get('/thuephong/{id}', 'CheckinController@show')->where('id','[0-9]+')->name('thuephong.show');
    Route::put('/thuephong/{id}', 'CheckinController@update')->name('thuephong.update');
    Route::get('/thuephong/thanhtoan/{id}', 'CheckinController@checkout')->name('thuephong.thanhtoan');


    Route::get('/sddichvu', 'UseserviceController@index')->name('sddichvu.index');
    Route::post('/sddichvu/', 'UseserviceController@store')->name('sddichvu.store');
    Route::get('/sddichvu/add/{id}', 'UseserviceController@add')->name('sddichvu.add');
    Route::get('/sddichvu/listsddichvu', 'UseserviceController@datalistsddichvu')->name('sddichvu.data');
    Route::get('/sddichvu/{id}', 'UseserviceController@show')->where('id','[0-9]+')->name('sddichvu.show');
    Route::post('/sddichvu/{id}', 'UseserviceController@update')->name('sddichvu.update');
    Route::delete('/sddichvu/{id}', 'UseserviceController@delete')->name('sddichvu.delete');
    
});



