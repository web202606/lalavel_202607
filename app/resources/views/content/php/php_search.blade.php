@extends('base')
@section('head')
<title>{{ config('app.name', 'PHPスキル検索画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">PHPスキル検索画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">下記から対象日時を指定してください</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row justify-content-around mt-3 pb-1">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class='text-center'>日付検索</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form class="date_option" action="{{ route('php_list') }}" method="GET">
                                @csrf
                                <!--検索した内容をページ更新後にvalueで表示-->
                                <input type="date" name="from" placeholder="from_date" class="cursor date_border" @if(isset($from)) value="{{$from}}" @endif>
                                <span class="mx-1 text-grey">~</span>
                                <!-- 検索した内容をページ更新後にvalueで表示-->
                                <input type="date" name="until" placeholder="until_date" class="cursor date_border" @if(isset($until)) value="{{$until}}" @endif>
                                <button type="submit" class="btn btn-primary ml-3 search-btn">検索</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-bottom">
            <a  class="col-md-1 w-100" href="{{ route('top') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>
    </main>
@endsection