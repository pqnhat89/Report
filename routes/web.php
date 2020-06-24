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

Route::group(['prefix' => 'bao-cao'], function () {
    Route::group(['prefix' => 'skss'], function () {
        Route::get('/', 'SkssController@index');
        Route::get('/b4', 'SkssController@b4');
        Route::get('/b4/{id}', 'SkssController@b4Xem');
        Route::get('/b4/{id}/sua', 'SkssController@b4Sua');
    });
});
