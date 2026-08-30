
@extends('base')
@section('head')
<title>{{ config('app.name', '総合スキル登録画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">総合スキル登録画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">他項目の最新スキルから現在の総合スキルを作成します</p>
                                <p class="lead text-white-50 mb-1 text-nowrap">登録ボタンで登録してください</p>                         
                                <p class="lead text-white-50 mb-1 text-nowrap">(備考は100文字まで入力可能)</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="panel-body d-flex justify-content-center mt-3">
            @if($errors->any())
            <div class='alert alert-danger d-flex justify-content-center w-50'>
                <ul>
                    @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="card-body d-flex justify-content-center">
            <form action="{{ route('skills.store') }}" method="post">
                @csrf
                <label for='comment' class='mt-2'>備考</label>
                    @if(empty(old('comment')))
                        <textarea class='form-control' name='comment'></textarea>
                    @else
                        <textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
                    @endif
                <div class='row justify-content-center'>
                    <button type='submit' class='btn btn-primary w-50 mt-3'>登録</button>
                </div> 
            </form>
        </div>  
        <div class="fixed-bottom">
            <a  class="col-md-1 w-100" href="{{ route('top') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>        
    </main>
@endsection