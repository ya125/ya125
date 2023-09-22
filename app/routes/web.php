<?php

use App\Cart;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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
Route::get('/', function (Request $request) {
    $product = new Product;

    $word = $request->word; 
    $from = $request->from;
    $to = $request->to;
    if(isset($word)){
        $product = $product->where('name', 'LIKE', '%'.$word.'%')
        ->orWhere('text', 'LIKE', '%'.$word.'%');
    }
    
//    if(isset($from) && isset($to)){
//         $product = $product->where('amount', [$from, $to]);
//    }
    if(isset($from)){
        $product = $product->where('amount', '>=', $from);
    }
    if(isset($to)){
        $product = $product->where('amount', '<=', $to);
    }
    $all = $product->where('del_flg', '=', '0')->get();
    return view('user.toppage', [
        'products' => $all,
        'word' => $word,
        'from' => $from,
        'to' => $to,
    ]);
    

})->name('top');

    // 詳細ページの表示のメソッド
    Route::get('/detail/{id}', function($id)
    {
       
       
        $product = Product::find($id);
      
            return view('user.toppage_detail', [
                'product' => $product,
                
            ]);
        
       
    })->name('top_detail');

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@toppage')->name('toppage');

// Route::get('/', [ResourceController::class, 'index']);

// resouceのコントローラーのルート
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function(){



Route::get('/ownermain_form', [HomeController::class, 'ownermainForm'])->name('owner.main');
Route::get('/user_list', [HomeController::class, 'userlist'])->name('user.list');

Route::resource('products', 'ProductController');
Route::resource('carts', 'CartController');
Route::get('/buy_all', 'CartController@buy_all')->name('buy.all');
Route::post('/buy_conf_all/{id}', 'CartController@buy_conf_all')->name('buy.conf.all');
Route::resource('users', 'UserController');
Route::resource('reviews', 'ReviewController');



Route::post('/ajaxlike', 'ProductController@ajaxlike')->name('products.ajaxlike');


Route::get('/good', 'ProductController@good')->name('products.good');

});