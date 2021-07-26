<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use \App\Http\Controllers\Account\IndexController as AccountController;
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
//    return view('welcome');
//    return response()->download('robots.txt');
//    return redirect()->route('news');
    return response()->json([
        'title' => 'Example',
        'description' => 'ExampleDescription'
    ]);
});

Route::get('collection', function() {
    $collection = collect([
        1,2,3,4,5,6,7,8,45,6,54,3,43,65
    ]);
});

Route::get('session', function (){
//    session()->put('key','value');
    session(['newSession' => 'newValue']);
    if (session()->has('newSession')){
        dd(session()->get('newSession'), session()->all());

        session()->remove('newSession');
    }

    return 'Сессий нет';
});


//site
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{category}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.show');

Route::get('/news', [NewsControler::class, 'index'])->name('news');
Route::get('/news/{news}', [NewsControler::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::view('/contact', 'contact');


//backoffice
Route::group(['middleware' => 'auth'], function (){
    Route::get('/account', AccountController::class);
    Route::get('/logout', function (){
       \Auth::logout();
       return redirect()->route('login');
    })->name('logout');

    //admin
    Route::group(
        [
            'prefix' => 'admin'
            ,'middleware' => 'admin'
            ,'as' => 'admin.'
        ]
        ,function()
        {
            Route::view('/','admin.index')->name('index');
            Route::resource('category', AdminCategoryController::class);
            Route::resource('news', AdminNewsController::class);
            Route::resource('user', AdminUserController::class);
        }
    );
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
