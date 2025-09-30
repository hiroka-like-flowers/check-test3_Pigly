@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register_2.css') }}">
@endsection

@section('content')
<div class="register-form">
    <h2 class="register-form__heading">新規会員登録</h2>
    <p class="register-form__tag">STEP2 体重データの入力</p>
    <div class="register-form__inner">
        <form class="register-form__form" action="/register/step2" method="POST">
            @csrf
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
                <label class="register-form__label" for="goal">目標の体重</label>
                <input class="register-form__input" type="text" name="goal" id="goal" placeholder="目標の体重を入力" value="{{ old('goal') }}" />kg
                <p class="register-form__error-message">
                    @error('goal')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <input class="register-form__button" type="submit" value="アカウント作成">
        </form>
    </div>
</div>
@endsection