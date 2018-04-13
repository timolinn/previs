<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    // Because 'Hello, World!' is too mainstream
    return 'Are you looking for me ?';
});

Route::get('/home', function() {
    // Because 'Hello, World!' is too mainstream
    return 'Home Page';
});

Route::get('/about', function() {
    // Because 'Hello, World!' is too mainstream
    return 'About Page';
});