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
                            <h1 class="display-5 fw-bolder text-white mb-2">HTMLスキル登録画面</h1>
                            <p class="lead text-white-50 mb-4">
                                あなたの現在のHTMLスキルを登録してください<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </header>
    
        <!-- Header-->
        <!-- Features section-->
    <main>
        <div class="card-body">
            <form action="{{ route('htmls.store') }}" method="post">
                            @csrf
                            <label for='html_structure' class='mt-2'>Webサイトの仕組みを理解しているか</label>
                            <select name='html_structure' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_property' class='mt-2'>HTMLの属性を理解しているか</label>
                            <select name='html_property' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_posision' class='mt-2'>要素の配置ルールを理解しているか</label>
                            <select name='html_posision' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_link' class='mt-2'>リンクを理解しているか</label>
                            <select name='html_link' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_form' class='mt-2'>フォームを理解しているか</label>
                            <select name='html_form' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_table' class='mt-2'>テーブルを理解しているか</label>
                            <select name='html_table' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_path' class='mt-2'>絶対パスと相対パスを理解しているか</label>
                            <select name='html_path' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_element' class='mt-2'>ブロック要素とインライン要素を理解しているか</label>
                            <select name='html_element' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_tool' class='mt-2'>検証ツールを使いこなせるか</label>
                            <select name='html_tool' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='html_web' class='mt-2'>自分でWEBページを作れるか</label>
                            <select name='html_web' class='form-control'>
                                <option value="3">よく理解している</option>
                                <option value="2">まずまず理解している</option>
                                <option value="1">理解不足</option>
                            </select>
                            <label for='comment' class='mt-2'>備考</label>
                                <textarea class='form-control' name='comment'></textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
            </form>
        </div>            
    </main>
</body>
</html>