@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-body">
                    <div class="card-body">
                        <form action="{{route('top')}}" method="get" enctype="multipart/form-data">
                            @csrf
                            <label for='name'>キーワード</label>
                                <input type='text' class='form-control' name='word' value="{{ $word }}"/>
                            <label for='amount' class='mt-2'>金額</label>
                                <select class='form-control' name='from' value="{{ $from }}">
                                    
                                    <option value="">{{ $from }}</option>
                                    <option value="0">0</option>
                                    <option value="1000">1000</option>
                                    <option value="2000">2000</option>
                                    <option value="3000">3000</option>
                                </select>
                                〜
                                <select class='form-control' name='to' value="{{ $to }}">
                                    <option value="">{{ $to }}</option>
                                    <option value="1000">1000</option>
                                    <option value="2000">2000</option>
                                    <option value="3000">3000</option>
                                    <option value="4000">4000〜</option>
                                </select>
                        
                                    <div class='row justify-content-center'>
                                        <button type='submit' class='btn btn-primary w-25 mt-3'>検索</button>
                                    </div>
                           
                        </form>
                    </div>
        </div>
    </div>
    <div class="col-md-8">
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
                                    <p class="card-text">{{ $product['amount'] }}円</p>
                                </div>
                        </div>
                    
                </div>
            </div>
        </div> 
        @endforeach
        
    </div>
    </div>
   
            
                


                
            
        
    
</div>

@endsection