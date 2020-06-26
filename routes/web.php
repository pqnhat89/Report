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
Route::get('/password/change', 'ChangePasswordController@index')->name('password.change');
Route::post('/password/change', 'ChangePasswordController@change');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/users/{email}/change', 'UserController@change')->name('user.change');
    Route::post('/users/{email}/change', 'UserController@change');
    Route::post('/users/{email}/delete', 'UserController@delete')->name('user.delete');

    Route::group(['prefix' => 'skss'], function () {
        Route::get('/', 'AdminSkssController@index');
        Route::get('/b4', 'AdminSkssController@b4');
        Route::get('/b4/{nam}/{loai}', 'AdminSkssController@b4TongHop');
    });
});

Route::group(['prefix' => 'skss'], function () {
    Route::get('/', 'SkssController@index');
    Route::get('/b4', 'SkssController@b4')->name('skss_b4');
    Route::get('/b4/0/tao', 'SkssController@b4Tao');
    Route::get('/b4/{id}', 'SkssController@b4Xem');
    Route::get('/b4/{id}/sua', 'SkssController@b4Sua');
    Route::post('/b4/{id}/tao', 'SkssController@b4Luu');
    Route::post('/b4/{id}/sua', 'SkssController@b4Luu');
    Route::post('/b4/{id}/xoa', 'SkssController@b4Xoa')->name('skss_b4_xoa');
});
