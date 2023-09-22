<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //カートの中のページに遷移のメソッド
    public function index()
    {
        
        $cart = Cart::where('user_id', \Auth::user()->id)->where('category', '=', '0')->get();
       
        
        return view('user.buy', [
            'carts' => $cart,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //購入履歴ページ遷移
    public function create()
    {
        $cart = Cart::where('user_id', \Auth::user()->id)->where('category', '=', '1')->get();
        
        
        return view('mypage.buy_his', [
            'carts' => $cart,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //新規登録処理
    public function store(Request $request)
    {

        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    //カートに商品を入れる　cartsデータベースに登録
    public function show(Request $request,$id)
    {
        
        $cart = new Cart;
        
        $cart->category = 0;

        // $products = Product::find($product_id)->first();
        
        // $cart->join('products', 'carts.product_id', '=', 'products.id')->first()->get();

        // $products = $product;
        
        $cart->user_id = auth()->id();
        $cart->product_id = $id;
        $cart->number = $request->number;

        $cart->save();
        
        
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    //商品購入ページへ遷移
    public function edit($id)
    {

        $cart = Cart::find($id);

        if(is_null($cart)){
            abort(404);
        }
        
        
        return view('user.buy_conf', [
            'carts' => $cart,
        ]);
    }
    public function buy_all()
    {
        
        $cart = Cart::where('user_id', \Auth::user()->id)->where('category', '=', '0')->get();
       
        
        return view('user.buy_conf_all', [
            'carts' => $cart,
        ]);
    }
     //商品購入処理
     public function buy_conf_all(CreateData $request, Cart $id)
     {
        dd($request);
         $id->category = 1;
         $id->name = $request->name;
         $id->tel = $request->tel;
         $id->post_code = $request->post_code;
         $id->address = $request->address;
         $id->number = $request->number;
 
         
         
         $id->save();
        
         return redirect('carts');
     }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    //商品購入処理
    public function update(CreateData $request, Cart $cart)
    {
        $cart->category = 1;
        $cart->name = $request->name;
        $cart->tel = $request->tel;
        $cart->post_code = $request->post_code;
        $cart->address = $request->address;
        $cart->number = $request->number;

        
        
        $cart->save();
       
        return redirect('carts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
