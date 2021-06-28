<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/hi/{name}', function(string $name) {
   return "Hello, {$name}";
});

Route::get('/welcome/{name}', function(string $name) {
    return "Welcome, {$name}";
});

Route::get('/information', function() {
    return "Information page";
});

Route::get('/news', function() {
    return "News list";
});

Route::get('/news/{id}', function(string $id) {
    return "Return page {$id}";
});

