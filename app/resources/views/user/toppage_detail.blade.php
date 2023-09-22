@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        
    </div>
    <div class="row justify-content-center">
        

        <div class="row">
            <div class="m-2">
                <div class="col-md-8">
                        
                        <div class="card" style="width: 18rem;">
                           
                            <img class="img-fluid" src="{{ asset($product->image) }}" style=" width: 300px; height: 200px; object-fit: cover; ">
                           
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->amount }}円</p>
                                    <p class="card-text">{{ $product->text }}</p>
                                </div>
                        </div>
                    
                </div>
            </div>
        </div> 
       
        
    </div>    

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h5>レビュー</h5>
        </div>
        
       
                <div class="col-md-8">
                @foreach($product->review as $review)
                        <div class="card" style="width: 18rem;">
                           
                           
                        
                                <div class="card-body">
                                    
                                    <h6>タイトル</h6>
                                    <p class="card-text">{{ $review->title }}</p>
                                    <h6>コメント</h6>
                                    <p class="card-text">{{ $review->text }}</p>
                                   
                                </div>
                               
                        </div>
                        @endforeach
                </div>
        
    </div>
            
            
                


                
            
        
    
</div>

@endsection

