<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return 'Welcome To Previs Discount Club';
});

Route::get('/home', function() {
    return 'Home Page';
});

Route::get('/about', function() {
    return 'About Page';
});

Route::get('/users', 'App\Controllers\UserController@index');
Route::get('/home-control', 'App\Controllers\HomeController@index');

Route::group(['prefix' => 'auth'], function() {
    Route::get('/login', 'App\Controllers\AuthController@getLoginForm')->name('login-form');
    Route::post('/login', 'App\Controllers\AuthController@postLogin')->name('login');
    Route::get('/register', 'App\Controllers\AuthController@getRegisterForm')->name('register-form');
    Route::post('/register', 'App\Controllers\AuthController@getRegister')->name('register');
});