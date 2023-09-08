@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">

                <h1>管理者ページ</h1>
                <!-- 画面遷移はbutton -->

                <form action="{{ route('user.list') }}" method="get">
                <button type="button" class="btn btn-primary">
                    {{ __('ユーザー検索') }}
                </button>
                </form>


                <form action="{{ route('products.index') }}" method="get">
                    <button type="submit" class="btn btn-primary">
                        {{ __('商品管理') }}
                    </button>
                </form>
 
            </div>
        </div>
    </div>
</div>

@endsection