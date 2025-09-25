@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/log.css') }}">
@endsection

@section('content')
<div class="log-form">
    <h2 class="log-form__heading">Weight Log</h2>
    <div class="log-form__inner">
        <form class="log-form__form" action="" method=""><!-- あとで入れる -->
            <div class="log-form__group">
                <label class="log-form__label" for="date">日付</label>
                <input class="log-form__input" type="date" name="date" value="{{ request('date') }}" placeholder="2024年1月1日">
                <p class="log-form__error-message">
                    @error('date')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-form__group">
                <label class="log-form__label" for="weight">体重</label>
                <input class="log-form__input" type="text" name="weight" id="weight" placeholder="50.0">kg
                <p class="log-form__error-message">
                    @error('weight')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-form__group">
                <label class="log-form__label" for="calory">摂取カロリー</label>
                <input class="log-form__input" type="text" name="calory" id="calory" placeholder="1200">cal
                <p class="log-form__error-message">
                    @error('calory')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-form__group">
                <label class="log-form__label" for="time">運動時間</label>
                <input class="log-form__input" type="text" name="time" id="time" placeholder="00:00">
                <p class="log-form__error-message">
                    @error('time')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-form__group">
                <label class="log-form__label" for="content">運動内容</label>
                <input class="log-form__textarea" type="hidden" name="content" placeholder="運動内容を追加">
                <p class="log-form__error-message">
                    @error('content')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-button">
                <input class="log-form__back-button" type="submit" value="戻る" name="back">
                <input class="log-form__send-button" type="submit" value="更新" name="send">
            </div>
        </form>
        <form class="log-form_delete" action="" method=""><!-- あとで入力 -->
            <input class="delete-button" type="submit">
        </form>
    </div>
</div>
@endsection