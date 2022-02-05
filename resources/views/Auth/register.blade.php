@extends('layouts.logout.common')
@section('title','ユーザー登録ページ')
@include('layouts.logout.header')
@section('contents')

<a href="{{ route('login') }}">戻る</a>

<form action="{{ route('register') }}" method="post">
  @csrf
    <label>ユーザー名</label>
    <input type="text" name="username" value="{{ old('username') }}">
    @if($errors->has('username'))
    <span class="text-danger">{{ $errors->first('username') }}</span>
    @endif
    <label>メールアドレス</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @if($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
    <label>パスワード</label>
    <input type="password" name="password">
    @if($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
    <label>パスワード確認</label>
    <input type="password" name="password_confirmed">
    <button type="submit">登録</button>
</form>

@endsection
@include('layouts.logout.footer')
