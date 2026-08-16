
@extends('base')
@section('head')
<title>{{ config('app.name', 'HTMLスキル登録画面') }}</title>
@endsection
@section('main')
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">HTMLスキル登録画面</h1>
                                <p class="lead text-white-50 mb-1 text-nowrap">HTMLスキルを登録してください</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card-body d-flex justify-content-center">
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
@endsection