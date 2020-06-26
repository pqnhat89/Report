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
    Route::get('/', 'SkssController@index')->name('skss.index');
    Route::get('/b4', 'SkssController@b4')->name('skss.b4.index');
    Route::get('/b4/0/create', 'SkssController@createB4')->name('skss.b4.create');
    Route::post('/b4/0/create', 'SkssController@saveB4');
    Route::get('/b4/{id}', 'SkssController@showB4')->name('skss.b4.show');
    Route::get('/b4/{id}/edit', 'SkssController@editB4')->name('skss.b4.edit');
    Route::post('/b4/{id}/edit', 'SkssController@saveB4');
    Route::post('/b4/{id}/delete', 'SkssController@deleteB4')->name('skss.b4.delete');
});
