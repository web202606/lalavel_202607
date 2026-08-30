
@extends('base')
@section('head')
<title>{{ config('app.name', '登録完了画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-md-8">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">更新完了画面</h1>
                            <p class="lead text-white-50 mb-1 text-nowrap">更新しました</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              
        <div class="row justify-content-around mt-5">
            <a  class="col-md-4 w-100" href="{{ route('top') }}"><button  type="button" class="btn btn-primary btn-lg w-100" role="button">TOPへ戻る</button></a>
        </div> 
        <div class="fixed-bottom">
            <a  class="col-md-1 w-100" href="{{ url()->previous() }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>
    </main>
@endsection