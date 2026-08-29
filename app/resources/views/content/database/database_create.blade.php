
@extends('base')
@section('head')
<title>{{ config('app.name', 'DBスキル登録画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">DBスキル登録画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">DBスキルを登録してください</p>
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
            <form action="{{ route('databases.store') }}" method="post">
                @csrf
                <label for='database_crud' class='mt-2'>CRUD処理を理解しているか</label>
                <select name='database_crud' class='form-control'>
                    @if(empty(old('database_crud'))) or (old('database_crud') == 3)                       
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_crud') == 2)  
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif
                    @if(old('database_crud') == 1)  
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_rule' class='mt-2'>型・制約を理解しているか</label>
                <select name='database_rule' class='form-control'>
                    @if(empty(old('database_rule'))) or (old('database_rule') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_rule') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_rule') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_query' class='mt-2'>サブクエリ(副問い合わせ)を理解しているか</label>
                <select name='database_query' class='form-control'>
                    @if(empty(old('database_query'))) or (old('database_query') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_query') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_query') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_join' class='mt-2'>JOIN (INNER JOIN / OUTER JOIN)を理解しているか</label>
                <select name='database_join' class='form-control'>
                    @if(empty(old('database_join'))) or (old('database_join') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_join') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_join') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_groupby' class='mt-2'>GROUP BYを理解しているか</label>
                <select name='database_groupby' class='form-control'>
                    @if(empty(old('database_groupby'))) or (old('database_groupby') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_groupby') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_groupby') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_transaction' class='mt-2'>トランザクションを理解しているか</label>
                <select name='database_transaction' class='form-control'>
                     @if(empty(old('database_transaction'))) or (old('database_transaction') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_transaction') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_transaction') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_Injection' class='mt-2'>SQLインジェクションを理解しているか</label>
                <select name='database_Injection' class='form-control'>
                    @if(empty(old('database_Injection'))) or (old('database_Injection') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_Injection') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_Injection') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_placeholder' class='mt-2'>ブレースホルダーを理解しているか</label>
                <select name='database_placeholder' class='form-control'>
                    @if(empty(old('database_placeholder'))) or (old('database_placeholder') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_placeholder') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_placeholder') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_connect' class='mt-2'>WEBページとDBの接続方法を使いこなせるか</label>
                <select name='database_connect' class='form-control'>
                    @if(empty(old('database_connect'))) or (old('database_connect') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_connect') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_connect') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='database_sql' class='mt-2'>SQL操作を理解しているか</label>
                <select name='database_sql' class='form-control'>
                    @if(empty(old('database_sql'))) or (old('database_sql') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('database_sql') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('database_sql') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='comment' class='mt-2'>備考</label>
                    @if(empty(old('comment')))
                        <textarea class='form-control' name='comment'></textarea>
                    @else
                        <textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
                    @endif
                <div class='row justify-content-center'>
                    <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                </div> 
            </form>
        </div>  
        <div class="fixed-bottom">
            <a  class="col-md-1 w-100" href="{{ route('top') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>        
    </main>
@endsection