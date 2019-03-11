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


Route::Group(['prefix' => 'admin','as' => 'admin.'], function (){
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
    Route::post('/loaiphong/update', 'KroomController@update')->name('loaiphong.update');
    Route::delete('/loaiphong/{id}', 'KroomController@delete')->name('loaiphong.delete');


});


