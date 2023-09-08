@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>購入履歴</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        
        @foreach($carts as $cart) 
        <div class="row">
            <div class="m-2">
                <div class="col-md-8">
                   
                        <div class="card" style="width: 18rem;">
                                <a href="{{ route('products.show',['product' => $cart->product['id']]) }}" method="get">
                                    <img class="img-fluid" src="{{ asset( $cart->product['image']) }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cart->product['name'] }}</h5>
                                    <p class="card-text">{{ $cart->product['amount'] }}円</p>
                                    <p class="card-text">購入数量 {{$cart['number']}}</p>
                                    <p class="card-text">購入日時</p>
                                    <p class="card-text">{{ $cart['updated_at'] }}</p>
                                </div>
                                
                        </div>
                        <div class="col-md-8">
                            <form action="{{ route('reviews.edit',['review' => $cart->product['id']]) }}" method="get">
                                <button type="submit" class="btn btn-primary">
                                {{ __('レビュー投稿') }}
                                </button>
                            </form>
                         </div>
                    
                </div>
            </div>
        </div> 
        @endforeach
        
    </div>

   
            
                


                
            
        
    
</div>

@endsection