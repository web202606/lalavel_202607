
@extends('base')
@section('head')
<title>{{ config('app.name', 'CSSスキル登録画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">CSSスキル登録画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">CSSスキルを登録してください</p>
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
            <form action="{{ route('csses.store') }}" method="post">
                @csrf
                <label for='css_property' class='mt-2'>セレクタ、プロパティ、値を理解しているか</label>
                <select name='css_property' class='form-control'>
                    @if(empty(old('css_property'))) or (old('css_property') == 3)                       
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_property') == 2)  
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif
                    @if(old('css_property') == 1)  
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_element' class='mt-2'>要素の単位指定を理解しているか</label>
                <select name='css_element' class='form-control'>
                    @if(empty(old('css_element'))) or (old('css_element') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_element') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_element') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_box' class='mt-2'>ボックスモデルを理解しているか</label>
                <select name='css_box' class='form-control'>
                    @if(empty(old('css_box'))) or (old('css_box') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_box') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_box') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_Flexbox' class='mt-2'>Flexboxを理解しているか</label>
                <select name='css_Flexbox' class='form-control'>
                    @if(empty(old('css_Flexbox'))) or (old('css_Flexbox') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_Flexbox') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_Flexbox') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_responsive' class='mt-2'>レスポンシブデザインを理解しているか</label>
                <select name='css_responsive' class='form-control'>
                    @if(empty(old('css_responsive'))) or (old('css_responsive') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_responsive') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_responsive') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_position' class='mt-2'>positionを理解しているか</label>
                <select name='css_position' class='form-control'>
                     @if(empty(old('css_position'))) or (old('css_position') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_position') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_position') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_glid' class='mt-2'>グリッドレイアウトを理解しているか</label>
                <select name='css_glid' class='form-control'>
                    @if(empty(old('css_glid'))) or (old('css_glid') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_glid') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_glid') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_background' class='mt-2'>背景(back-ground)を理解しているか</label>
                <select name='css_background' class='form-control'>
                    @if(empty(old('css_background'))) or (old('css_background') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_background') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_background') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_display' class='mt-2'>Displayを理解しているか</label>
                <select name='css_display' class='form-control'>
                    @if(empty(old('css_display'))) or (old('css_display') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_display') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_display') == 1) 
                        <option value="1" selected>理解不足</option>
                    @else
                        <option value="1">理解不足</option>
                    @endif
                </select>
                <label for='css_coding' class='mt-2'>模写コーディングできるか</label>
                <select name='css_coding' class='form-control'>
                    @if(empty(old('css_coding'))) or (old('css_coding') == 3) 
                        <option value="3" selected>よく理解している</option>
                    @else
                        <option value="3">よく理解している</option>
                    @endif
                    @if(old('css_coding') == 2) 
                        <option value="2" selected>まずまず理解している</option>
                    @else
                        <option value="2">まずまず理解している</option>
                    @endif                        
                    @if(old('css_coding') == 1) 
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