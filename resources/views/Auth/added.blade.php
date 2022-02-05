@extends('layouts.logout.common')
@section('title','ユーザー登録完了')
@include('layouts.logout.header')
@section('contents')

<a href="{{ route('login') }}">ログイン画面へ</a>
<p>登録が完了しました！</p>
@endsection
@include('layouts.logout.footer')
