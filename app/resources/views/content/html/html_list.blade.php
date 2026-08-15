@extends('base')
@section('head')
<title>{{ config('app.name', 'HTMLスキル登録履歴画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">HTMLスキル登録履歴</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">下記からスキル詳細を指定してください</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row justify-content-around mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class='text-center'>登録履歴リスト</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead class='bg-success'>
                                    <tr>
                                        <th scope='col'>ID</th>
                                        <th scope='col'>日付</th>
                                        <th scope='col'>スキル詳細</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ここに収入を表示する -->
                                        @foreach($htmls as $html)
                                        <tr>
                                            <th scope='col'>{{$html['id']}}</th>
                                            <th scope='col'>{{$html['date']}}</th>
                                            <th scope='col'>
                                                <a href="{{ route('html_skill', ['html' => $html['id']]) }}">スキル</a>
                                            </th>                                                  
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
@endsection