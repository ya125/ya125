
@extends('layouts.app')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>商品登録編集</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('products.update',['product' => $product['id']]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <label for='name'>商品名</label>
                                <input type='text' class='form-control' name='name' value="{{ old('name',$product['name']) }}"/>
                            <label for='amount' class='mt-2'>金額</label>
                                <input type='text' class='form-control' name='amount' value="{{ old('amount',$product['amount']) }}"/>
                            <label for='text' class='mt-2'>商品説明</label>
                                <textarea class='form-control' name='text'>{{ old('text',$product['text']) }}</textarea>
                            <label for='image' class='mt-2'>画像</label>
                                <input type="file" name="image">
                                    <div class='row justify-content-center'>
                                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                                    </div>
                                
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection