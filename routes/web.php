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

Route::get('/login', function () {
    return view('auth.login');
});


Route::group(['middleware'=>'auth'], function(){
    Route::get('/access-control', 'AccessControlController@show');
    Route::get('/users', 'UserController@show');
    Route::delete('/users/{user}', "UserController@destroy")->name('delete');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit');
    Route::put('/users/{user}', 'UserController@update')->name('update');
});



Auth::routes();

