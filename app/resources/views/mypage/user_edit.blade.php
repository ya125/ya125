
@extends('layouts.app')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>アカウント情報編集</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                         @if($errors->any())
                        <div class='alert alert-danger'>
                            <ul>
                                @foreach($errors->all() as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('users.update',['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <label for='name'>ユーザー名</label>
                                <input type='text' class='form-control' name='name' value="{{Auth::user()->name}}"/>
                            <label for='email' class='mt-2'>メールアドレス</label>
                                <input type='email' class='form-control' name='email' value="{{Auth::user()->email}}"/>
                                    <div class='row justify-content-center'>
                                    <input type="submit" value="編集"  class="btn btn-primary">
                                    </div>
                        </form>
                        <form action="{{ route('users.destroy',['user' => Auth::user()->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                        <div class='row justify-content-center'>
                                        <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？")' class="btn btn-primary">
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection