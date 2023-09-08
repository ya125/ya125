@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>管理者ページ</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        

        <div class="row">
            <div class="m-2">
                <div class="col-md-8">
                        
                        <div class="card" style="width: 18rem;">
                           
                            <img class="img-fluid" src="{{ asset($product->image) }}">
                            
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->amount }}</p>
                                    <p class="card-text">{{ $product->text }}</p>
                                </div>
                        </div>
                    
                </div>
            </div>
        </div> 
        
        
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('products.edit',['product' => $product['id']]) }}" method="get">
                <button type="submit" class="btn btn-primary">
                    {{ __('編集') }}
                </button>
            </form>
        </div>
        <div class="col-md-8">
            <form action="{{ route('products.destroy',['product' => $product['id']]) }}" method="post">
            @csrf
            @method('delete')
                <button type="submit" class="btn btn-primary">
                    {{ __('削除') }}
                </button>
            </form>
        </div>
    </div>
            
                


                
            
        
    
</div>

@endsection