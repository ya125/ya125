
@extends('layouts.app')
@section('content')
<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>商品購入</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        @if($errors->any())
                        <div class='alert alert-danger'>
                            <ul>
                                @foreach($errors->all() as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('carts.update',['cart' => $carts['id']]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="m-2">
                                    <div class="col-md-8">
                                            
                                            <div class="card" style="width: 18rem;">
                                            
                                                <img class="img-fluid" src="{{ asset( $carts->product['image'] ) }}">
                                                
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $carts->product['name'] }}</h5>
                                                        <p class="card-text">{{ $carts->product['amount'] }}円</p>
                                                        <input type="number" name='number' min='1' value="{{$carts['number']}}">
                                                    </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div> 
                            
                            <label for='name'>氏名</label>
                                <input type='text' class='form-control' name='name' value="{{ old('name') }}"/>
                            <label for='tel' class='mt-2'>電話番号</label>
                                <input type='text' class='form-control' name='tel' value="{{ old('tel') }}"/>
                            <label for='post_code' class='mt-2'>郵便番号</label>
                                <input type='text' class='form-control' name='post_code' value="{{ old('post_code') }}"/>
                            <label for='address' class='mt-2'>住所</label>
                                <input type='text' class='form-control' name='address' value="{{ old('address') }}"/>
                                    <div class='row justify-content-center'>
                                        <button type='submit' class='btn btn-primary w-25 mt-3'>購入</button>
                                    </div>
                                
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection