<?php

namespace App\Http\Controllers;

use App\Review;
use App\Cart;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Review $review)
    {
        $review->user_id = Auth::user()->id;
        $review->product_id = $request->product_id;
        $review->title = $request->title;
        $review->text = $request->text;
        
        $review->save();
       
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    //商品レビュー投稿ページへ遷移
    public function edit($id)
    {
        $cart = Cart::where('product_id' ,$id)->first();
        
       
        return view('mypage.review_conf', [
            'carts' => $cart,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    //商品レビュー投稿処理
    public function update(Request $request, Review $review)
    {
        $review->title = $request->title;
        $review->text = $request->text;
        
        $review->save();
       
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
