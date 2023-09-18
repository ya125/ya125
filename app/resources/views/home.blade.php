@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ route('home') }}" method="get">
                    <button type="submit" class="btn btn-primary">
                        {{ __('ログインせずに閲覧') }}
                    </button>
                </form>
        </div>
    </div>
</div>
@endsection
