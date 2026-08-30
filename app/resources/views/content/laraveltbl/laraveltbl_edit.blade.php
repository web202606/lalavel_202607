
@extends('base')
@section('head')
<title>{{ config('app.name', 'laravelスキル更新画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">laravelスキル更新画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">laravelスキルを更新してください</p>
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
            <form action="{{ route('laraveltbl_up', ['laraveltbl' => $result['id'] ]) }}" method="post">
                @csrf
                <label for='laraveltbl_mvs' class='mt-2'>MVCモデルを理解しているか</label>
                <select name='laraveltbl_mvs' class='form-control'>
                    @if(empty(old('laraveltbl_mvs')) and ($result['laraveltbl_mvs'] == 3)) or (old('laraveltbl_mvs') == 3)                       
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_mvs')) and ($result['laraveltbl_mvs'] == 2)) or (old('laraveltbl_mvs') == 2)  
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_mvs')) and ($result['laraveltbl_mvs'] == 1)) or (old('laraveltbl_mvs') == 1)  
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_route' class='mt-2'>ルーティングを理解しているか</label>
                <select name='laraveltbl_route' class='form-control'>
                    @if(empty(old('laraveltbl_route')) and ($result['laraveltbl_route'] == 3)) or (old('laraveltbl_route') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_route')) and ($result['laraveltbl_route'] == 2)) or (old('laraveltbl_route') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_route')) and ($result['laraveltbl_route'] == 1)) or (old('laraveltbl_route') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_controller' class='mt-2'>コントローラーを理解しているか</label>
                <select name='laraveltbl_controller' class='form-control'>
                    @if(empty(old('laraveltbl_controller')) and ($result['laraveltbl_controller'] == 3)) or (old('laraveltbl_controller') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_controller')) and ($result['laraveltbl_controller'] == 2)) or (old('laraveltbl_controller') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_controller')) and ($result['laraveltbl_controller'] == 1)) or (old('laraveltbl_controller') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_model' class='mt-2'>モデルを理解しているか</label>
                <select name='laraveltbl_model' class='form-control'>
                    @if(empty(old('laraveltbl_model')) and ($result['laraveltbl_model'] == 3)) or (old('laraveltbl_model') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_model')) and ($result['laraveltbl_model'] == 2)) or (old('laraveltbl_model') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_model')) and ($result['laraveltbl_model'] == 1)) or (old('laraveltbl_model') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_view' class='mt-2'>VIEWを理解しているか</label>
                <select name='laraveltbl_view' class='form-control'>
                    @if(empty(old('laraveltbl_view')) and ($result['laraveltbl_view'] == 3)) or (old('laraveltbl_view') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_view')) and ($result['laraveltbl_view'] == 2)) or (old('laraveltbl_view') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_view')) and ($result['laraveltbl_view'] == 1)) or (old('laraveltbl_view') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_naming' class='mt-2'>命名規則を理解しているか</label>
                <select name='laraveltbl_naming' class='form-control'>
                     @if(empty(old('laraveltbl_naming')) and ($result['laraveltbl_naming'] == 3)) or (old('laraveltbl_naming') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_naming')) and ($result['laraveltbl_naming'] == 2)) or (old('laraveltbl_naming') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_naming')) and ($result['laraveltbl_naming'] == 1)) or (old('laraveltbl_naming') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_eloquent' class='mt-2'>Eloquent、クエリビルダを理解しているか</label>
                <select name='laraveltbl_eloquent' class='form-control'>
                    @if(empty(old('laraveltbl_eloquent')) and ($result['laraveltbl_eloquent'] == 3)) or (old('laraveltbl_eloquent') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_eloquent')) and ($result['laraveltbl_eloquent'] == 2)) or (old('laraveltbl_eloquent') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_eloquent')) and ($result['laraveltbl_eloquent'] == 1)) or (old('laraveltbl_eloquent') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_join' class='mt-2'>テーブル結合を理解しているか</label>
                <select name='laraveltbl_join' class='form-control'>
                    @if(empty(old('laraveltbl_join')) and ($result['laraveltbl_join'] == 3)) or (old('laraveltbl_join') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_join')) and ($result['laraveltbl_join'] == 2)) or (old('laraveltbl_join') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_join')) and ($result['laraveltbl_join'] == 1)) or (old('laraveltbl_join') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_templete' class='mt-2'>テンプレートエンジンを理解しているか</label>
                <select name='laraveltbl_templete' class='form-control'>
                    @if(empty(old('laraveltbl_templete')) and ($result['laraveltbl_templete'] == 3)) or (old('laraveltbl_templete') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_templete')) and ($result['laraveltbl_templete'] == 2)) or (old('laraveltbl_templete') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_templete')) and ($result['laraveltbl_templete'] == 1)) or (old('laraveltbl_templete') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='laraveltbl_web' class='mt-2'>自分でWEBサイトを作れるか</label>
                <select name='laraveltbl_web' class='form-control'>
                    @if(empty(old('laraveltbl_web')) and ($result['laraveltbl_web'] == 3)) or (old('laraveltbl_web') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('laraveltbl_web')) and ($result['laraveltbl_web'] == 2)) or (old('laraveltbl_web') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('laraveltbl_web')) and ($result['laraveltbl_web'] == 1)) or (old('laraveltbl_web') == 1) 
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
            <a  class="col-md-1 w-100" href="{{ route('laraveltbl_list') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>       
    </main>
@endsection