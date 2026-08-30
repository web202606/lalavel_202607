<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- title-->
    <!-- favicon-->
    @yield('head')
</head>
<body>
    <header class="bg-dark py-1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-1">
                @if(Auth::check())
                    <a class="navbar-brand" href="#!">総合スキル</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                @endif
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if(Auth::check())
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item"><a class="nav-link" href="{{ route('htmls.create') }}">HTML</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">CSS</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Javascripts</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">JQuery</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">PHP</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">DB</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Laravel</a></li>
                    </ul>                     
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">                    
                        <li class="nav-item">
                            <a href="#" id="logout">ログアウト</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                @csrf
                            </form>
                        </li>
                        <script>
                            document.getElementById('logout').addEventListener('click', function(event){
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                            });
                        </script>
                    @else
                        <li class="nav-item list-unstyled"><a class="nav-link" href="{{ route('login') }}">ログイン</a></li>
                        <li class="nav-item list-unstyled"><a class="nav-link" href="{{ route('register') }}">ユーザ登録</a></li>
                     @endif
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <!-- main-->
    @yield('main')
    <!-- main-->
</body>
</html>