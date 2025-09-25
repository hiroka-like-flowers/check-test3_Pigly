@extends('layouts.auth')
<!-- ユーザー認証入れる必要あり。ユーザー認証について学ぼう参照 -->
@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register_1.css') }}">
@endsection

@section('content')
<div class="register-form">
    <h2 class="register-form__heading">新規会員登録</h2>
    <p class="register-form__tag">STEP1 アカウント情報の登録</p>
    <div class="register-form__inner">
        <form class="register-form__form" action="" method=""><!-- あとで入れる -->
            <div class="register-form__group">
                <label class="register-form__label" for="name">お名前</label>
                <input class="register-form__input" type="text" name="name" id="name" placeholder="名前を入力">
                <p class="register-form__error-message">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <label class="register-form__label" for="email">メールアドレス</label>
                <input class="register-form__input" type="mail" name="email" id="email" placeholder="メールアドレスを入力">
                <p class="register-form__error-message">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <label class="register-form__label" for="password">パスワード</label>
                <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
                <p class="register-form__error-message">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <input class="register-form__button" type="submit" value="次に進む">
        </form>
    </div>
    <a class="login__link" href="">ログインはこちら</a>
</div>
@endsection