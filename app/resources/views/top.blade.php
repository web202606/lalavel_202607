@extends('base')
@section('head')
<title>{{ config('app.name', 'TOP画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">ようこそwebスキル確認アプリへ</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">ここではあなたの現在のWEBスキルの状況の表示、登録が行えます。</p>
                                <p class="lead text-white-50 mb-1 text-nowrap">登録済みのスキル状況の更新、削除は表示画面から行えます。</p>
                                <p class="lead text-white-50 mb-1 text-nowrap">スキル項目については全8項目となっています。</p>
                                <p class="lead text-white-50 mb-1 text-nowrap">(HTML,CSS,JavaScript,Jquery,PHP,DB,Lalavel,総合)</p>
                                <p class="lead text-white-50 mb-1 text-nowrap">下記のリンクから各ページにアクセスして確認、登録を実施してください。</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="container px-5 my-5 d-flex justify-content-center" >
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">HTMLスキル</h2>
                        <p class="mb-1"><a class="text-decoration-none" href="{{ route('html_search') }}">・HTMLスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        @can('user-higher')
                        <p><a class="text-decoration-none" href="{{ route('htmls.create') }}">・HTMLスキル新規登録<i class="bi bi-arrow-right"></i></a></p>                       
                        @endcan
                    </div>
                    <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">CSSスキル</h2>
                        <p class="mb-1"><a class="text-decoration-none" href="{{ route('css_search') }}">・CSSスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        @can('user-higher')
                        <p><a class="text-decoration-none" href="{{ route('csses.create') }}">・CSSスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                        @endcan
                    </div>
                    <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Javascriptスキル</h2>
                        <p class="mb-1"><a class="text-decoration-none" href="{{ route('javascript_search') }}">・Javascriptスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        @can('user-higher')
                        <p><a class="text-decoration-none" href="{{ route('javascripts.create') }}">・Javascriptスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                        @endcan
                    </div>
                   <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">JQueryスキル</h2>
                        <p class="mb-1"><a class="text-decoration-none" href="{{ route('jquery_search') }}">・JQueryスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        @can('user-higher')
                        <p><a class="text-decoration-none" href="{{ route('jquerys.create') }}">・JQueryスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                        @endcan
                    </div>
                   <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">PHPスキル</h2>
                        <p class="mb-1"><a class="text-decoration-none" href="{{ route('php_search') }}">・PHPスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        @can('user-higher')
                        <p><a class="text-decoration-none" href="{{ route('phps.create') }}">・PHPスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                        @endcan
                    </div>
                   <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">DBスキル</h2>
                        <p class="mb-1"><a class="text-decoration-none" href="{{ route('database_search') }}">・DBスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        @can('user-higher')
                        <p><a class="text-decoration-none" href="{{ route('databases.create') }}">・DBスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                        @endcan
                    </div>
                   <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Laravelスキル</h2>
                        <p class="mb-1"><a class="text-decoration-none" href="{{ route('laraveltbl_search') }}">・Laravelスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        @can('user-higher')
                        <p><a class="text-decoration-none" href="{{ route('laraveltbls.create') }}">・Laravelスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                        @endcan
                    </div>
                   <div class="col-lg-3">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">総合スキル</h2>
                        @can('user-higher')
                        <p class="mb-1"><a class="text-decoration-none" href="{{ route('skills.create') }}">・総合スキルシート作成<i class="bi bi-arrow-right"></i></a></p>
                        @endcan
                        <p><a class="text-decoration-none" href="{{ route('skill_search') }}">・総合スキルシート作成履歴表示<i class="bi bi-arrow-right"></i></a></p> 
                    </div>
                </div>
        </div>  
    </main>
@endsection