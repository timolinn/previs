<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function() {
//     return 'Welcome To Previs Discount Club';
// });

Route::group(['namespace' => 'App\Controllers'], function() {

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/users', 'UserController@index');
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'auth'], function() {
        Route::get('/login', 'AuthController@getLoginForm');
        Route::post('/login', 'AuthController@postLogin');
        Route::get('/register', 'AuthController@getRegisterForm');
        Route::post('/register', 'AuthController@postRegister');
    });

});