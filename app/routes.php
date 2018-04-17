<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return 'Are you looking for me ?';
});

Route::get('/home', function() {
    return 'Home Page';
});

Route::get('/about', function() {
    return 'About Page';
});

Route::get('/users', 'App\Controllers\UserController@index');
Route::get('/home-control', 'App\Controllers\HomeController@index');