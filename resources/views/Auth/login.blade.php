@extends('layouts.logout.common')
@section('title', 'ログインページ')
@include('layouts.logout.header')
@section('contents')

@if(session('login_erro'))
  <span class="text_danger">
    {{ session('login_erro') }}
  </span>
@endif

<form action="{{ route('login') }}" method="post">
  @csrf
  <label for="">メールアドレス</label>
  <input type="email" name="email">
  <label for="">パスワード</label>
  <input type="password" name="password">
  <button type="submit">ログイン</button>
</form>

<p>
  新規ユーザーは
  <span><a href="{{ route('register.form') }}">こちら</a></span>
</p>
@endsection
@include('layouts.logout.footer')
