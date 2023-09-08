
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
                        <form action="{{ route('users.update',['user' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <label for='name'>ユーザー名</label>
                                <input type='text' class='form-control' name='name' value="{{Auth::user()->name}}"/>
                            <label for='email' class='mt-2'>メールアドレス</label>
                                <input type='email' class='form-control' name='email' value="{{Auth::user()->email}}"/>
                                    <div class='row justify-content-center'>
                                        <button type='submit' class='btn btn-primary w-25 mt-3'>編集する</button>
                                    </div>
                                    <form action="{{ route('users.destroy',['user' => Auth::user()->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                        <div class='row justify-content-center'>
                                            <button type='submit' class='btn btn-primary w-25 mt-3'>削除する</button>
                                        </div>
                                    </form>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection