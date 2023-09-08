
@extends('layouts.app')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>レビュー投稿</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            
                            <div class="row">
                                <div class="m-2">
                                    <div class="col-md-8">
                                            
                                            <div class="card" style="width: 18rem;">
                                            
                                                <img class="img-fluid" src="{{ asset( $carts->product['image'] ) }}">
                                                
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $carts->product['name'] }}</h5>
                                                        <p class="card-text">{{ $carts->product['amount'] }}円</p>
                                                    </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div> 
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title'/>
                            <label for='text' class='mt-2'>コメント</label>
                                <input type='text' class='form-control' name='text'/>
                                <input type='hidden' class='form-control' name='product_id' value="{{$carts['product_id']}}">
                                    <div class='row justify-content-center'>
                                        <button type='submit' class='btn btn-primary w-25 mt-3'>投稿する</button>
                                    </div>
                                
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection