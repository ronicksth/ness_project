<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route::get('/login', function () {
//     return view('login');
// });
Route::view('/login', 'login')->name('login');
