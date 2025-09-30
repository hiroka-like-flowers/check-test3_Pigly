@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}">
@endsection

@section('content')
<div class="goal-form">
    <h2 class="goal-form__heading">目標体重設定</h2>
    <div class="goal-form__inner">
        <form class="goal-form__form" action="/weight_logs/goal_setting" method="POST">
            @method('PATCH')
            @csrf
            <div class="goal-form__group">
                <input class="goal-form__input" type="text" name="weight" value="{{ $items['weight'] }}">kg
                <input type="hidden" name="id" value="{{ $items['id'] }}">
                <p class="goal-form__error-message">
                    @error('weight')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="goal-button">
                <input class="goal-form__back-button" type="submit" value="戻る" name="back">
                <input class="goal-form__send-button" type="submit" value="更新" name="send">
            </div>
        </form>
    </div>
</div>
@endsection