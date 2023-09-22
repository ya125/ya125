<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Like;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsData;
use App\Http\Requests\Products_editData;
use Illuminate\Support\Facades\Auth;
use InterventionImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product;
        
        $all = $product->where('del_flg', '=', '0')->get();

      

        $cart = Cart::where('category', '=', '1')->get();

        return view('owner.owner_main', [
            'products' => $all,
            'carts' => $cart,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 商品の新規登録をするためのページ遷移のメソッド
    public function create()
    {
        return view('owner/product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 商品の新規登録の処理をするメソッド
    public function store(ProductsData $request)
    {

        // ディレクトリ名
        $dir = 'sample';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        

        $product = new Product;

        $product->user_id = 1;
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->text = $request->text;
        $product->image = 'storage/' . $dir . '/' . $file_name;


        
        $product->save();
        
        return redirect('products');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // 詳細ページの表示のメソッド
    public function show(Product $product)
    {
        $products = Product::withCount('like')->find($product->id);
       
        $like_model = new Like;
        
        if(Auth::user()->role == 0){
            return view('owner.ownerpost_detail', [
                'product' => $products,
            ]);
        } else {
            return view('user.post_detail', [
                'product' => $products,
                'like_model'=>$like_model,
            ]);
        }
       
    }

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $product_id = $request->product_id;
        $like = new Like;
        $product = Product::findOrFail($product_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $product_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('product_id', $product_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->product_id = $request->product_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }
    
        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $productLikeCount = $product->loadCount('like')->like_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'productLikeCount' => $productLikeCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }

    // お気に入り一覧
    public function good()
    {
        $like = Like::where('user_id', \Auth::user()->id)->get();
       
        
        return view('mypage.good', [
            'likes' => $like,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // 編集をするためのページ遷移をするためのメソッド
    public function edit(Product $product)
    {
        $products = Product::where('id' ,$product['id'])->first();
      

        return view('owner.product_edit', [
            'product' => $products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // 編集のページ遷移を処理をするメソッド
    public function update(Products_editData $request, Product $product)
    {
        // ディレクトリ名
        $dir = 'sample';
        
        // $product = Product::where('id' ,$product['id'])->first();
        
        // アップロードされたファイル名を取得
        if($request['image'] != null){

        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $product->image = 'storage/' . $dir . '/' . $file_name;
        } else {
            $product->image = $product['image'];
        }
        

        $product->user_id = 1;
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->text = $request->text;
       
        
        
        $product->save();
        $products = Product::where('id' ,$product['id'])->first();
        return view('owner.ownerpost_detail', [
            'product' => $products,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // 削除するメソッド
    public function destroy(Product $product)
    {
        $products = Product::where('id' ,$product['id'])->first();


        $record = $products;

        $record->del_flg = 1;
        
        $record->save();



        return redirect('products');
    
    }
}
