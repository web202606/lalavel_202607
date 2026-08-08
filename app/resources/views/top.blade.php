<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '家計簿') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">webスキル</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">HTML</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">CSS</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Javascripts</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">JQuery</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">PHP</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">DB</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Laravel</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">総合</a></li>
                    </ul>
                </div>
        </div>
    </nav>
            <!-- Header-->
    <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">ようこそwebスキル確認アプリへ</h1>
                            <p class="lead text-white-50 mb-4">
                                ここではあなたの現在のWEBスキルの状況の表示、登録が行えます。<br>
                                登録済みのスキル状況の更新、削除は表示画面から行えます。<br>
                                スキル項目については全8項目となっています。(HTML,CSS,JavaScript,Jquery,PHP,DB,Lalavel,総合)<br>
                                下記のリンクから各ページにアクセスして確認、登録を実施してください。

                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </header>
    
        <!-- Header-->
        <!-- Features section-->
    <main>
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">HTMLスキル</h2>
                        <p><a class="text-decoration-none" href="#!">・HTMLスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        <p><a class="text-decoration-none" href="#!">・HTMLスキル新規登録<i class="bi bi-arrow-right"></i></a></p>                       
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">CSSスキル</h2>
                        <p><a class="text-decoration-none" href="#!">・CSSスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        <p><a class="text-decoration-none" href="#!">・CSSスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Javascriptスキル</h2>
                        <p><a class="text-decoration-none" href="#!">・Javascriptスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        <p><a class="text-decoration-none" href="#!">・Javascriptスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                    </div>
                   <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">JQueryスキル</h2>
                        <p><a class="text-decoration-none" href="#!">・JQueryスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        <p><a class="text-decoration-none" href="#!">・JQueryスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                    </div>
                   <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">PHPスキル</h2>
                        <p><a class="text-decoration-none" href="#!">・PHPスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        <p><a class="text-decoration-none" href="#!">・PHPスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                    </div>
                   <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">DBスキル</h2>
                        <p><a class="text-decoration-none" href="#!">・DBスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        <p><a class="text-decoration-none" href="#!">・DBスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                    </div>
                   <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Laravelスキル</h2>
                        <p><a class="text-decoration-none" href="#!">・Laravelスキル表示<i class="bi bi-arrow-right"></i></a></p>
                        <p><a class="text-decoration-none" href="#!">・Laravelスキル新規登録<i class="bi bi-arrow-right"></i></a></p> 
                    </div>
                   <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">総合スキル</h2>
                        <p><a class="text-decoration-none" href="#!">・総合スキルシート作成<i class="bi bi-arrow-right"></i></a></p>
                        <p><a class="text-decoration-none" href="#!">・総合スキルシート作成履歴表示<i class="bi bi-arrow-right"></i></a></p> 
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>