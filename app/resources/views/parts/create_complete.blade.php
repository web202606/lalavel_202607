
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
                            <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">登録完了画面</h1>
                            <p class="lead text-white-50 mb-1 text-nowrap">登録しました</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              
        <div class="row justify-content-around mt-5">
            <div class="col-md-4">
                <div class="card">
                    <button a href="{{ route('top') }}" class="btn btn-primary btn-lg" role="button">TOPへ戻る</button>
                </div>
            </div>
        </div> 
    </main>
</body>
</html>
@endsection