@extends('base')
@section('head')
<title>{{ config('app.name', 'ログイン画面') }}</title>
@endsection
@section('main')
  <main>
    <div class="bg-dark py-5">
      <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-md-8">
                <div class="text-center my-5">
                    <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">ログイン画面</h1>
                    <p class="lead text-white-50 mb-1 text-nowrap">メールアドレス、パスワードを入力してください</p>
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
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
          </div>
          <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" />
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">送信</button>
          </div>
        </form>
    </div>        
  </main>
@endsection