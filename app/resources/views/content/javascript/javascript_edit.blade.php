
@extends('base')
@section('head')
<title>{{ config('app.name', 'Javascriptスキル更新画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">Javascriptスキル更新画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">Javascriptスキルを更新してください</p>
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
            <form action="{{ route('javascript_up', ['javascript' => $result['id'] ]) }}" method="post">
                @csrf
                <label for='javascript_read' class='mt-2'>JavaScriptファイルの読み込み方法を理解しているか</label>
                <select name='javascript_read' class='form-control'>
                    @if(empty(old('javascript_read')) and ($result['javascript_read'] == 3)) or (old('javascript_read') == 3)                       
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_read')) and ($result['javascript_read'] == 2)) or (old('javascript_read') == 2)  
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif
                    @if(empty(old('javascript_read')) and ($result['javascript_read'] == 1)) or (old('javascript_read') == 1)  
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_file' class='mt-2'>ファイルの出力方法を理解しているか</label>
                <select name='javascript_file' class='form-control'>
                    @if(empty(old('javascript_file')) and ($result['javascript_file'] == 3)) or (old('javascript_file') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_file')) and ($result['javascript_file'] == 2)) or (old('javascript_file') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_file')) and ($result['javascript_file'] == 1)) or (old('javascript_file') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_grammar' class='mt-2'>オブジェクト、パラメータを理解しているか</label>
                <select name='javascript_grammar' class='form-control'>
                    @if(empty(old('javascript_grammar')) and ($result['javascript_grammar'] == 3)) or (old('javascript_grammar') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_grammar')) and ($result['javascript_grammar'] == 2)) or (old('javascript_grammar') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_grammar')) and ($result['javascript_grammar'] == 1)) or (old('javascript_grammar') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_variable' class='mt-2'>変数を理解しているか</label>
                <select name='javascript_variable' class='form-control'>
                    @if(empty(old('javascript_variable')) and ($result['javascript_variable'] == 3)) or (old('javascript_variable') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_variable')) and ($result['javascript_variable'] == 2)) or (old('javascript_variable') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_variable')) and ($result['javascript_variable'] == 1)) or (old('javascript_variable') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_data' class='mt-2'>データ型を理解しているか</label>
                <select name='javascript_data' class='form-control'>
                    @if(empty(old('javascript_data')) and ($result['javascript_data'] == 3)) or (old('javascript_data') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_data')) and ($result['javascript_data'] == 2)) or (old('javascript_data') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_data')) and ($result['javascript_data'] == 1)) or (old('javascript_data') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_comparison' class='mt-2'>比較演算子を理解しているか</label>
                <select name='javascript_comparison' class='form-control'>
                     @if(empty(old('javascript_comparison')) and ($result['javascript_comparison'] == 3)) or (old('javascript_comparison') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_comparison')) and ($result['javascript_comparison'] == 2)) or (old('javascript_comparison') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_comparison')) and ($result['javascript_comparison'] == 1)) or (old('javascript_comparison') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_logical' class='mt-2'>論理演算子を理解しているか</label>
                <select name='javascript_logical' class='form-control'>
                    @if(empty(old('javascript_logical')) and ($result['javascript_logical'] == 3)) or (old('javascript_logical') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_logical')) and ($result['javascript_logical'] == 2)) or (old('javascript_logical') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_logical')) and ($result['javascript_logical'] == 1)) or (old('javascript_logical') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_dom' class='mt-2'>DOM操作を理解しているか</label>
                <select name='javascript_dom' class='form-control'>
                    @if(empty(old('javascript_dom')) and ($result['javascript_dom'] == 3)) or (old('javascript_dom') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_dom')) and ($result['javascript_dom'] == 2)) or (old('javascript_dom') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_dom')) and ($result['javascript_dom'] == 1)) or (old('javascript_dom') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_structure' class='mt-2'>プログラムの構造を理解しているか</label>
                <select name='javascript_structure' class='form-control'>
                    @if(empty(old('javascript_structure')) and ($result['javascript_structure'] == 3)) or (old('javascript_structure') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_structure')) and ($result['javascript_structure'] == 2)) or (old('javascript_structure') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_structure')) and ($result['javascript_structure'] == 1)) or (old('javascript_structure') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='javascript_method' class='mt-2'>メソッドを理解しているか</label>
                <select name='javascript_method' class='form-control'>
                    @if(empty(old('javascript_method')) and ($result['javascript_method'] == 3)) or (old('javascript_method') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('javascript_method')) and ($result['javascript_method'] == 2)) or (old('javascript_method') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('javascript_method')) and ($result['javascript_method'] == 1)) or (old('javascript_method') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='comment' class='mt-2'>備考</label>
                    @if(empty(old('comment')))
                        <textarea class='form-control' name='comment'>{{ $result['comment'] }}</textarea>
                    @else
                        <textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
                    @endif
                <div class='row justify-content-center'>
                    <button type='submit' class='btn btn-primary w-25 mt-3'>更新</button>
                </div> 
            </form>
        </div>    
        <div class="fixed-bottom">
            <a  class="col-md-1 w-100" href="{{ route('javascript_list') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>       
    </main>
@endsection