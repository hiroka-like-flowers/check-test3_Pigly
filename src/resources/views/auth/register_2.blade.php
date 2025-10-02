@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register_2.css') }}">
@endsection

@section('content')
<div class="register-form">
    <h2 class="register-form__heading">新規会員登録</h2>
    <p class="register-form__tag">STEP2 体重データの入力</p>
    <div class="register-form__inner">
        <form class="register-form__form" action="{{ route('register') }}" method="POST">
            @csrf

            <input type="hidden" name="name" value="{{ session('register.name') }}">
            <input type="hidden" name="email" value="{{ session('register.email') }}">
            <input type="hidden" name="password" value="{{ session('register.password') }}">

            <div class="register-form__group">
                <label class="register-form__label" for="weight">現在の体重</label>
                <input class="register-form__input" type="text" name="weight" id="weight" placeholder="現在の体重を入力" value="{{ old('weight') }}" />kg
                <p class="register-form__error-message">
                    @error('weight')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <label class="register-form__label" for="target_weight">目標の体重</label>
                <input class="register-form__input" type="text" name="target_weight" id="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}" />kg
                <p class="register-form__error-message">
                    @error('target_weight')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <input type="hidden" name="register">
        </form>
        <form action="/login" method="GET">
            <input class="register-form__button" type="submit" value="アカウント作成">
        </form>
    </div>
</div>
@endsection