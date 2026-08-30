
@extends('base')
@section('head')
<title>{{ config('app.name', 'Jqueryスキル詳細画面') }}</title>
@endsection
@section('main')

@php
  $max = 30;
  $min = 10;
@endphp
    <main>
        <div class="bg-dark py-5">
            <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-3  text-nowrap">あなたのJqueryスキルの得点は{{ $point }}/30点です</h1>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
 
        <div class="row justify-content-around mt-5">
            <div class="col-md-4">
                <div class="card">
                    @if($point == $max)
                        <div class='text-center text-nowrap'>全項目完璧に理解できています</div>
                    @elseif($point == $min)
                        <div class='text-center text-nowrap'>全項目理解不足です</div>
                    @else
                        <div class="card-header bg-primary">
                            <div class='text-center'>下記項目を学習しましょう</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <tbody>
                                        @foreach($comments as $comment)
                                           <tr> <th scope='col'>{{ $comment}}</th></tr> 
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="fixed-bottom">
            <a  class="col-md-1 w-100" href="{{ route('jquery_list') }}"><button  type="button" class="btn btn-primary btn-lg" role="button">戻る</button></a>
        </div>
    </main>
@endsection