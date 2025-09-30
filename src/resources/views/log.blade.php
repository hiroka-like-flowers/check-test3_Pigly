@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/log.css') }}">
@endsection

@section('content')
<div class="log-form">
    <h2 class="log-form__heading">Weight Log</h2>
    <div class="log-form__inner">
        <form class="log-form__form" action="/weight_logs/{:weightLogId}/update" method="POST">
            @method('PATCH')
            @csrf
            <div class="log-form__group">
                <label class="log-form__label" for="date">日付</label>
                <input class="log-form__input" type="date" name="date" value="{{ $items('date') }}">
                <input type="hidden" name="id" value="{{ $items['id'] }}">
                <p class="log-form__error-message">
                    @error('date')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-form__group">
                <label class="log-form__label" for="weight">体重</label>
                <input class="log-form__input" type="text" name="weight" value="{{ $items('weight') }}">kg
                <input type="hidden" name="id" value="{{ $items['id'] }}">
                <p class="log-form__error-message">
                    @error('weight')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-form__group">
                <label class="log-form__label" for="calory">摂取カロリー</label>
                <input class="log-form__input" type="text" name="calory" value="{{ $items('calories') }}">cal
                <input type="hidden" name="id" value="{{ $items['id'] }}">
                <p class="log-form__error-message">
                    @error('calory')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-form__group">
                <label class="log-form__label" for="time">運動時間</label>
                <input class="log-form__input" type="text" name="time" value="{{ $items('exercise_time') }}">
                <input type="hidden" name="id" value="{{ $items['id'] }}">
                <p class="log-form__error-message">
                    @error('time')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="log-form__group">
                <label class="log-form__label" for="content">運動内容</label>
                <textarea class="log-form__textarea"  name="content" value="{{ $items('exercise_content') }}"></textarea>
                <input type="hidden" name="id" value="{{ $items['id'] }}">
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
        <form class="log-form_delete" action="/weight_logs/{:weightLogId}/delete" method="POST">
            @method('DELETE')
            @csrf
            <input type="hidden" name="id" value="{{ $items['id'] }}">
            <input class="delete-button" type="submit" value="削除">
        </form>
    </div>
</div>
@endsection