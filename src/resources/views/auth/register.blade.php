@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('link')
<a class="header__link" href="/register">register</a>
@endsection

@section('content')

<div class="register-form">
    <h2 class="register-form__heading content__heading">会員登録</h2>
        <div class="register-form__inner">
            <form class="register-form__form" action="/register" method="post">
            @csrf

            <div class="register-form__group">
                <input class="register-form__input" type="text" name="name" id="name" placeholder="名前">
                <p class="register-form__error-message">
                @error('name')
                {{ $message }}
                @enderror
                </p>
            </div>
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
        <div class="register-form__group">
            <input class="register-form__input" type="password" name="password" id="password" placeholder="確認パスワード">
            <p class="register-form__error-message">
            @error('password')
            {{ $message }}
            @enderror
            </p>
        </div>
        <div class="form-group">
            <button type="submit">登録</button>
        </div>
        <div class="login-prompt">アカウントをお持ちの方はこちらから
            <br><a href="/login">ログイン</a></br>
        </div>
    </form>
</div>
@endsection('content')
