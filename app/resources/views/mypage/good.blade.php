@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>お気に入り一覧</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        
        @foreach($likes as $like) 
        <div class="row">
            <div class="m-2">
                <div class="col-md-8">
                   
                        <div class="card" style="width: 18rem;">
                                <a href="{{ route('products.show',['product' => $like->product['id']]) }}" method="get">
                                    <img class="img-fluid" src="{{ asset( $like->product['image']) }}" style=" width: 300px; height: 200px; object-fit: cover; ">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $like->product['name'] }}</h5>
                                    <p class="card-text">{{ $like->product['amount'] }}円</p>
                                </div>
                                
                        </div>
                        
                    
                </div>
            </div>
        </div> 
        @endforeach
        
    </div>

   
            
                


                
            
        
    
</div>

@endsection