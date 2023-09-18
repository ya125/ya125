@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">

                <h3>マイページ</h3>
                <!-- 画面遷移はbutton -->

                <form action="{{ route('users.create') }}" method="get">
                    <button type="submit" class="btn btn-primary">
                        {{ __('ユーザー設定') }}
                    </button>
                </form>
                <form action="{{ route('carts.create') }}" method="get">
                    <button type="submit" class="btn btn-primary">
                        {{ __('購入履歴') }}
                    </button>
                </form>
                <form action="{{ route('products.good') }}" method="get">
                    <button type="submit" class="btn btn-primary">
                        {{ __('お気に入り') }}
                    </button>
                </form>
                
 
            </div>
        </div>
    </div>
</div>

@endsection