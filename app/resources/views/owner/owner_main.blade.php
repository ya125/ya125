@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>管理者ページ</h1>
        </div>
        <div class="col-md-8">
            <form action="{{ route('products.create') }}" method="get">
                <button type="submit" class="btn btn-primary">
                    {{ __('商品登録') }}
                </button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        
        @foreach($products as $product) 
        <div class="row">
            <div class="m-2">
                <div class="col-md-8">
                        
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('products.show',['product' => $product['id']]) }}" method="get">
                                <img class="img-fluid" src="{{ asset($product['image']) }}">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product['name'] }}</h5>
                                    <p class="card-text">{{ $product['amount'] }}</p>
                                </div>
                        </div>
                    
                </div>
            </div>
        </div> 
        @endforeach
        
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h5>売上</h5>
        </div>
        <div class="col-md-8">
            <form action="{{ route('products.create') }}" method="get">
                <button type="submit" class="btn btn-primary">
                    {{ __('a') }}
                </button>
            </form>
        </div>
    </div>
            
                


                
            
        
    
</div>

@endsection