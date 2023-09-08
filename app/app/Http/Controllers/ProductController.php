<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        $all = $product->all();

        return view('owner.owner_main', [
            'products' => $all,
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
    public function store(Request $request)
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
        $products = Product::where('id' ,$product['id'])->first();
        
        if(Auth::user()->role == 0){
            return view('owner.ownerpost_detail', [
                'product' => $products,
            ]);
        } else {
            return view('user.post_detail', [
                'product' => $products,
            ]);
        }
       
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
    public function update(Request $request, Product $product)
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
            $product->image=$product['image'];
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

        $products->delete();

        return redirect('products');
    
    }
}
