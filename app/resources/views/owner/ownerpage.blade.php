@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">

                <h1>管理者ページ</h1>
                <!-- 画面遷移はbutton -->

            
                <form action="{{ route('products.index') }}" method="get">
                    <button type="submit" class="btn btn-primary">
                        {{ __('商品管理') }}
                    </button>
                </form>

                <h5>ユーザーリスト</h5>

                <table border="1">
                    <tr>
                    <th>ID</th>
                    <th>ユーザー名</th>
                    <th>メールアドレス</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection