<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello');
});

Route::get('/info', function () {
    phpinfo();
});

Route::get('/about', function () {
    return view('about');
});

Route::resource('todos', TodoController::class);
