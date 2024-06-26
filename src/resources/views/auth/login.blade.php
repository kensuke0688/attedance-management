@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<div class="login-form">
    <h2 class="login-form__heading content__heading">ログイン</h2>
    <div class="login-form__inner">
        <form class="login-form__form" action="/login" method="post">
            @csrf
            <div class="login-form__group">
                <label class="login-form__label" for="email"></label>
                <input class="login-form__input" type="email" name="email" id="email" placeholder="メールアドレス">
                <p class="login-form__error-message">
                    @error('email')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div class="login-form__group">
                <label class="login-form__label" for="password"></label>
                <input class="login-form__input" type="password" name="password" id="password" placeholder="パスワード">
                <p class="login-form__error-message">
                    @error('password')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <input class="login-form__btn btn" type="submit" value="ログイン">
            <div class="register-form__text">
                <h4>アカウントをお持ちでない方はこちら</h4>
            </div>
            <div class="register-form__links">
                <a href="/register">会員登録</a>
            </div>
        </form>
    </div>
</div>
@endsection
