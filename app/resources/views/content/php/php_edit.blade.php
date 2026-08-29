
@extends('base')
@section('head')
<title>{{ config('app.name', 'PHPスキル更新画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">PHPスキル更新画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">PHPスキルを更新してください</p>
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
            <form action="{{ route('php_up', ['php' => $result['id'] ]) }}" method="post">
                @csrf
                <label for='php_if' class='mt-2'>if文を理解しているか</label>
                <select name='php_if' class='form-control'>
                    @if(empty(old('php_if')) and ($result['php_if'] == 3)) or (old('php_if') == 3)                       
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_if')) and ($result['php_if'] == 2)) or (old('php_if') == 2)  
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif
                    @if(empty(old('php_if')) and ($result['php_if'] == 1)) or (old('php_if') == 1)  
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_array' class='mt-2'>配列を理解しているか</label>
                <select name='php_array' class='form-control'>
                    @if(empty(old('php_array')) and ($result['php_array'] == 3)) or (old('php_array') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_array')) and ($result['php_array'] == 2)) or (old('php_array') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_array')) and ($result['php_array'] == 1)) or (old('php_array') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_for' class='mt-2'>ループ処理を理解しているか</label>
                <select name='php_for' class='form-control'>
                    @if(empty(old('php_for')) and ($result['php_for'] == 3)) or (old('php_for') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_for')) and ($result['php_for'] == 2)) or (old('php_for') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_for')) and ($result['php_for'] == 1)) or (old('php_for') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_object' class='mt-2'>オブジェクト指向を理解しているか</label>
                <select name='php_object' class='form-control'>
                    @if(empty(old('php_object')) and ($result['php_object'] == 3)) or (old('php_object') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_object')) and ($result['php_object'] == 2)) or (old('php_object') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_object')) and ($result['php_object'] == 1)) or (old('php_object') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_error' class='mt-2'>エラーの読み方を理解しているか</label>
                <select name='php_error' class='form-control'>
                    @if(empty(old('php_error')) and ($result['php_error'] == 3)) or (old('php_error') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_error')) and ($result['php_error'] == 2)) or (old('php_error') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_error')) and ($result['php_error'] == 1)) or (old('php_error') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_get' class='mt-2'>GETを理解しているか</label>
                <select name='php_get' class='form-control'>
                     @if(empty(old('php_get')) and ($result['php_get'] == 3)) or (old('php_get') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_get')) and ($result['php_get'] == 2)) or (old('php_get') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_get')) and ($result['php_get'] == 1)) or (old('php_get') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_post' class='mt-2'>POSTを理解しているか</label>
                <select name='php_post' class='form-control'>
                    @if(empty(old('php_post')) and ($result['php_post'] == 3)) or (old('php_post') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_post')) and ($result['php_post'] == 2)) or (old('php_post') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_post')) and ($result['php_post'] == 1)) or (old('php_post') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_session' class='mt-2'>SESSIONを理解しているか</label>
                <select name='php_session' class='form-control'>
                    @if(empty(old('php_session')) and ($result['php_session'] == 3)) or (old('php_session') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_session')) and ($result['php_session'] == 2)) or (old('php_session') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_session')) and ($result['php_session'] == 1)) or (old('php_session') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_xss' class='mt-2'>XSS対策を理解しているか</label>
                <select name='php_xss' class='form-control'>
                    @if(empty(old('php_xss')) and ($result['php_xss'] == 3)) or (old('php_xss') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_xss')) and ($result['php_xss'] == 2)) or (old('php_xss') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_xss')) and ($result['php_xss'] == 1)) or (old('php_xss') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='php_validation' class='mt-2'>バリデーションを理解しているか</label>
                <select name='php_validation' class='form-control'>
                    @if(empty(old('php_validation')) and ($result['php_validation'] == 3)) or (old('php_validation') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('php_validation')) and ($result['php_validation'] == 2)) or (old('php_validation') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('php_validation')) and ($result['php_validation'] == 1)) or (old('php_validation') == 1) 
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
            <a  class="col-md-1 w-100" href="{{ route('php_list') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>       
    </main>
@endsection