<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsControler;

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

//admin
Route::group(
    [
        'prefix' => 'admin'
        ,'as' => 'admin.'
    ]
    ,function()
    {
        Route::resource('category', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
    }
);

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.id');

Route::get('/news', [NewsControler::class, 'index'])->name('news');
Route::get('/news/show/{id}', [NewsControler::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

/*
Route::get('/hi/{name}', function(string $name) {
   return "Hello, {$name}";
});

Route::get('/welcome/{name}', function(string $name) {
    return "Welcome, {$name}";
});

Route::get('/information', function() {
    return "Information page";
});

Route::get('/news/{id}', function(string $id) {
    return "Return page {$id}";
});
*/
