
@extends('base')
@section('head')
<title>{{ config('app.name', 'Jqueryスキル更新画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">Jqueryスキル更新画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">Jqueryスキルを更新してください</p>
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
            <form action="{{ route('jquery_up', ['jquery' => $result['id'] ]) }}" method="post">
                @csrf
                <label for='jquery_plugin' class='mt-2'>プラグインを理解しているか</label>
                <select name='jquery_plugin' class='form-control'>
                    @if(empty(old('jquery_plugin')) and ($result['jquery_plugin'] == 3)) or (old('jquery_plugin') == 3)                       
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_plugin')) and ($result['jquery_plugin'] == 2)) or (old('jquery_plugin') == 2)  
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif
                    @if(empty(old('jquery_plugin')) and ($result['jquery_plugin'] == 1)) or (old('jquery_plugin') == 1)  
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_read' class='mt-2'>Jqueryの読み込み方法を理解しているか</label>
                <select name='jquery_read' class='form-control'>
                    @if(empty(old('jquery_read')) and ($result['jquery_read'] == 3)) or (old('jquery_read') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_read')) and ($result['jquery_read'] == 2)) or (old('jquery_read') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_read')) and ($result['jquery_read'] == 1)) or (old('jquery_read') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_structure' class='mt-2'>セレクタを理解しているか</label>
                <select name='jquery_structure' class='form-control'>
                    @if(empty(old('jquery_structure')) and ($result['jquery_structure'] == 3)) or (old('jquery_structure') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_structure')) and ($result['jquery_structure'] == 2)) or (old('jquery_structure') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_structure')) and ($result['jquery_structure'] == 1)) or (old('jquery_structure') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_method' class='mt-2'>メソッドを理解しているか</label>
                <select name='jquery_method' class='form-control'>
                    @if(empty(old('jquery_method')) and ($result['jquery_method'] == 3)) or (old('jquery_method') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_method')) and ($result['jquery_method'] == 2)) or (old('jquery_method') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_method')) and ($result['jquery_method'] == 1)) or (old('jquery_method') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_event' class='mt-2'>イベントを理解しているか</label>
                <select name='jquery_event' class='form-control'>
                    @if(empty(old('jquery_event')) and ($result['jquery_event'] == 3)) or (old('jquery_event') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_event')) and ($result['jquery_event'] == 2)) or (old('jquery_event') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_event')) and ($result['jquery_event'] == 1)) or (old('jquery_event') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_ajax' class='mt-2'>Ajax通信を理解しているか</label>
                <select name='jquery_ajax' class='form-control'>
                     @if(empty(old('jquery_ajax')) and ($result['jquery_ajax'] == 3)) or (old('jquery_ajax') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_ajax')) and ($result['jquery_ajax'] == 2)) or (old('jquery_ajax') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_ajax')) and ($result['jquery_ajax'] == 1)) or (old('jquery_ajax') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_alert' class='mt-2'>alertの出力方法を理解しているか</label>
                <select name='jquery_alert' class='form-control'>
                    @if(empty(old('jquery_alert')) and ($result['jquery_alert'] == 3)) or (old('jquery_alert') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_alert')) and ($result['jquery_alert'] == 2)) or (old('jquery_alert') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_alert')) and ($result['jquery_alert'] == 1)) or (old('jquery_alert') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_counter' class='mt-2'>カウンター作成方法を理解しているか</label>
                <select name='jquery_counter' class='form-control'>
                    @if(empty(old('jquery_counter')) and ($result['jquery_counter'] == 3)) or (old('jquery_counter') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_counter')) and ($result['jquery_counter'] == 2)) or (old('jquery_counter') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_counter')) and ($result['jquery_counter'] == 1)) or (old('jquery_counter') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_animation' class='mt-2'>アニメーションを理解しているか</label>
                <select name='jquery_animation' class='form-control'>
                    @if(empty(old('jquery_animation')) and ($result['jquery_animation'] == 3)) or (old('jquery_animation') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_animation')) and ($result['jquery_animation'] == 2)) or (old('jquery_animation') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_animation')) and ($result['jquery_animation'] == 1)) or (old('jquery_animation') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='jquery_fade' class='mt-2'>フェードイン・フェードアウトを理解しているか</label>
                <select name='jquery_fade' class='form-control'>
                    @if(empty(old('jquery_fade')) and ($result['jquery_fade'] == 3)) or (old('jquery_fade') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(empty(old('jquery_fade')) and ($result['jquery_fade'] == 2)) or (old('jquery_fade') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(empty(old('jquery_fade')) and ($result['jquery_fade'] == 1)) or (old('jquery_fade') == 1) 
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
            <a  class="col-md-1 w-100" href="{{ route('jquery_list') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>       
    </main>
@endsection