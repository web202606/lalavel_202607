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
            <div class="col-md-6">                    
                <div class="card-body">
                    <table class='table'>
                        <thead class='bg-success'>
                            <tr>
                                <th scope='col text-nowrap'>ID</th>
                                <th scope='col text-nowrap'>日付</th>
                                <th scope='col text-nowrap'>スキル詳細</th>
                                @can('user-higher')
                                <th scope='col text-nowrap'>更新</th>
                                @endcan
                                @can('admin-only')   
                                <th scope='col text-nowrap'>物理削除</th>  
                                @endcan 
                                @can('admin-only')
                                <th scope='col text-nowrap'>論理削除</th>  
                                @endcan                      
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
                                    @can('user-higher')
                                    <th scope='col'>
                                        <a href="{{ route('html_edit', ['html' => $html['id']]) }}">更新</a>
                                    </th>
                                    @endcan
                                    @can('admin-only')
                                    <th scope='col'>
                                        <a href="{{ route('html_del', ['html' => $html['id']]) }}">物理削除</a>
                                    </th> 
                                    @endcan
                                    @can('admin-only')
                                    <th scope='col'>
                                        <a href="{{ route('html_delflg', ['html' => $html['id']]) }}">論理削除</a>
                                    </th>   
                                    @endcan                                               
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="fixed-bottom">
            <a  class="col-md-1 w-100" href="{{ route('html_search') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>
    </main>
@endsection