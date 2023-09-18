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
                           
                            <img class="img-fluid" src="{{ asset($product->image) }}">
                           
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

    @if($like_model->like_exist(Auth::user()->id,$product->id))
        <p class="favorite-marke">
        <a class="js-like-toggle loved" href="" data-productid="{{ $product->id }}"><i class="fas fa-heart fa-2x heart"></i></a>
        <span class="likeCount">{{$product->like_count}}</span>
        </p>
        @else
        <p class="favorite-marke">
        <a class="js-like-toggle" href="" data-productid="{{ $product->id }}"><i class="fas fa-heart fa-2x heart"></i></a>
        <span class="likeCount">{{$product->like_count}}</span>
        </p>
    @endif
    

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('carts.show',['cart' => $product['id']]) }}" method="get">
                @csrf
                <input type="number" name='number' min='1' value='1'>
                  
                
                <button type="submit" class="btn btn-primary">
                    {{ __('カートに入れる') }}
                </button>
            </form>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script>
     $(function () {
    var like = $('.js-like-toggle');
    var likeProductId;
    
    like.on('click', function () {
        var $this = $(this);
        likeProductId = $this.data('productid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxlike',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'product_id': likeProductId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
    
    //.likesCountの次の要素のhtmlを「data.productLikesCount」の値に書き換える
                $this.next('.likeCount').html(data.productLikeCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });
 </script>