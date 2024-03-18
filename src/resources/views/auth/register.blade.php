@extends('layouts/app')

@section('link')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<div class="register-form">
    <h3 class="register-form__heading content__heading">会員登録</h3>
    <div class="register-form__inner">
        <form class="register-form__form" action="/register" method="post">
            @csrf
            <div class="register-form__group">
                <label class="register-form__label for="name"></label>
                <input class="register-form__input" type="text" name="name" id="name" placeholder="名前">
                <p class="register-form__error-message">
                    @error('name')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <label class="register-form__label for="email"></label>
                <input class="register-form__input" type="mail" name="email" id="email" placeholder="メールアドレス">
                <p class="register-form__error-message">
                    @error('email')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <label class="register-form__label" for="password"></label>
                <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワード">
                <p class="register-form__error-message">
                    @error('password')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <label class="register-form__label" for="name"></label>
                <input class="register-form__input" type="password" name="password_confirmation" id="password_confirmation" placeholder="確認用パスワード">
                <p class="register-form__error-message">
                    @error('password')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <input class="register-form__btn btn" type="submit" value="会員登録">
            <div class="register-form__text">
                <h4>アカウントをお持ちの方はこちらから</h4>
            </div>
            <div class="register-form__links">
                <a href="/login">ログイン</a>
            </div>
        </form>
    </div>
</div>
@endsection