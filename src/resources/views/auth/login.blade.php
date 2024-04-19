@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@section('css')

@section('content')
<div class="register-form">
    <h2 class="register-form__heading content__heading">ログイン</h2>
        <div class="register-form__inner">
            <!-- ログイン成功時のメッセージ -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form class="register-form__form" action="{{ route('login') }}" method="post">
            @csrf

            <div class="register-form__group">
                <input class="register-form__input" type="mail" name="email" id="email" placeholder="メールアドレス">
                <p class="register-form__error-message">
                @error('email')
                {{ $message }}
                @enderror
                </p>
        </div>
        <div class="register-form__group">
            <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワード">
            <p class="register-form__error-message">
            @error('password')
            {{ $message }}
            @enderror
            </p>
        </div>
        <div class="form-group">
            <button type="submit">ログイン</button>
        </div>
        <div class="login-prompt">アカウントをお持ちでない方はこちら
            <br><a href="/register">会員登録</a></br>
        </div>
    </form>
</div>
@endsection