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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/password/change', 'ChangePasswordController@index')->name('password.change');
Route::post('/password/change', 'ChangePasswordController@change');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'department'], function () {
    // for user
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/users', 'UserController@index')->name('user.index');
        Route::get('/users/{email}/create', 'UserController@edit')->name('user.create');
        Route::post('/users/{email}/create', 'UserController@save');
        Route::get('/users/{email}/edit', 'UserController@edit')->name('user.edit');
        Route::post('/users/{email}/edit', 'UserController@save');
        Route::post('/users/{email}/delete', 'UserController@delete')->name('user.delete');
    });

    // for reports
    Route::group(['prefix' => '{type}'], function () {
        Route::get('/', 'AdminReportController@index')->name('admin.report.index');
        Route::post('/lock', 'AdminReportController@lock')->name('admin.report.lock');
        Route::get('/{year}/{month}', 'AdminReportController@sum')->name('admin.report.sum');
    });
});

Route::group(['prefix' => 'download'], function () {
    Route::get('/', 'FileController@index')->name('file.index');
});

Route::group(['prefix' => '{type}'], function () {
    Route::get('/template', 'FileController@template')->name('file.template');
    Route::post('/upload', 'FileController@upload')->name('file.upload');

    Route::get('/', 'ReportController@index')->name('report.index');
    Route::get('/create', 'ReportController@create')->name('report.create');
    Route::post('/create', 'ReportController@save');
    Route::get('/{id}', 'ReportController@show')->name('report.show');
    Route::get('/{id}/edit', 'ReportController@edit')->name('report.edit');
    Route::post('/{id}/edit', 'ReportController@save');
    Route::post('/{id}/delete', 'ReportController@delete')->name('report.delete');
});
