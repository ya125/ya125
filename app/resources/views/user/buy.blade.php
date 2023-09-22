@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    
       
             <div class="col-md-8">
                 <h3>カート</h3>
                 
            </div>
       
    </div>
    <div class="row justify-content-center">
        
        @foreach($carts as $cart) 
        <div class="row">
            <div class="m-2">
                <div class="col-md-8">
                       
                        <div class="card" style="width: 18rem;">
                                <img class="img-fluid" src="{{ asset( $cart->product['image']) }}" style=" width: 300px; height: 200px; object-fit: cover; ">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cart->product['name'] }}</h5>
                                    <p class="card-text">{{ $cart->product['amount'] }}円</p>
                                </div>
                        </div>
                        <div class="col-md-8">
                            <form action="{{ route('carts.edit',['cart' => $cart['id']]) }}" method="get">
                
                                <button type="submit" class="btn btn-primary">
                                {{ __('購入する') }}
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