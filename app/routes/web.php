<?php

use App\Http\Controllers\HomeController;

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

//viewの()の間に書くのは、resourse/viewsフォルダー配下のblade名を書く
Route::get('/', function () {
    return view('home');
});

// Route::get('/', [ResourceController::class, 'index']);

// resouceのコントローラーのルート
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ownermain_form', [HomeController::class, 'ownermainForm'])->name('owner.main');

Route::resource('products', 'ProductController');