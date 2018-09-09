<?php
Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => 'adminchecklogin'], function() {
        Route::get('/login', '\App\Admin\Controllers\LoginController@index');
    });

    Route::post('/login', '\App\Admin\Controllers\LoginController@login');
    Route::get('/logout', '\App\Admin\Controllers\LoginController@logout');

    Route::group(['middleware' => 'auth:admin'], function() {

        Route::get('/index', '\App\Admin\Controllers\Controller@layout');
        //home
        Route::get('/home/index', '\App\Admin\Controllers\HomeController@index');
        //manage
        Route::resource('/users', '\App\Admin\Controllers\UserController');

    });
});