@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}">
@endsection

@section('content')
<div class="admin-form">
    <section class="admin-form__header">
        <div class="weight">
            <label class="weight-label" for="goal">目標体重</label>
            <input class="weight-input" type="hidden" name="goal" value="{{ $targetWeight ?? 0 }}">kg
        </div>
        <div class="weight">
            <label class="weight-label" for="how">目標まで</label>
            <input class="weight-input" type="hidden" name="how" value="{{ ($targetWeight ?? 0) - ($latestWeight ?? 0) }}">kg
        </div>
        <div class="weight">
            <label class="weight-label" for="weight">最新体重</label>
            <input class="weight-input" type="hidden" name="now" value="{{ $latestWeight ?? 0 }}">kg
        </div>
    </section>
    <div class="admin-form__inner">
        <form class="admin-form__form" action="/weight_logs/search" method="POST"><!-- 体重検索 -->
            @csrf
            <div class="admin-form__group">
                <input class="admin-form__input" type="date" name="date" id="date" placeholder="年/月/日 min="2023-11-01" value="{{ request('min') }}" /> ~
                <input class="admin-form__input" type="date" name="date" id="date" placeholder="年/月/日 max="2023-11-30" value="{{ request('max') }}" />
            </div>
            <div class="admin-form__actions">
                <input class="search-button" type="submit" value="検索">
                @if(request()->has('date') && request('min') . request('max') !== '')
                    <input class="reset-button" type="submit" value="リセット" name="reset">
                @endif
            </div>
        </form>
        <a href="#modal" class="modal-trigger">データ追加</a>
        <div class="modal" id="modal">
            <a href="#" class="modal-overlay"></a>
            <div class="log-form">
                <h2 class="log-form__heading">Weight Log</h2>
                <div class="log-form__inner">
                    <form class="log-form__form" action="/weight_logs/create" method="POST">
                        @csrf
                        <div class="log-form__group">
                            <label class="log-form__label" for="date">日付
                                <span class="log-form__required">必須</span>
                            </label>
                            <input class="log-form__input" type="date" name="date" value="{{ request('date') }}" placeholder="2024年1月1日">
                            <p class="log-form__error-message">
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="log-form__group">
                            <label class="log-form__label" for="weight">体重
                                <span class="log-form__required">必須</span>
                            </label>
                            <input class="log-form__input" type="text" name="weight" id="weight" placeholder="50.0">kg
                            <p class="log-form__error-message">
                                @error('weight')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="log-form__group">
                            <label class="log-form__label" for="calories">摂取カロリー
                                <span class="log-form__required">必須</span>
                            </label>
                            <input class="log-form__input" type="text" name="calory" id="calory" placeholder="1200">cal
                            <p class="log-form__error-message">
                                @error('calory')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="log-form__group">
                            <label class="log-form__label" for="time">運動時間
                                <span class="log-form__required">必須</span>
                            </label>
                            <input class="log-form__input" type="text" name="exercise_time" id="time" placeholder="00:00">
                            <p class="log-form__error-message">
                                @error('time')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="log-form__group">
                            <label class="log-form__label" for="content">運動内容</label>
                            <textarea class="log-form__textarea" cols="30" rows="10" name="exercise_content" placeholder="運動内容を追加"></textarea>
                            <p class="log-form__error-message">
                                @error('content')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="log-button">
                            <input class="log-form__back-button" type="submit" value="戻る" name="back">
                            <input class="log-form__send-button" type="submit" value="登録" name="send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(isset($items))
        <p class="admin-form__result">{{ request('min') }}~{{ request('max') }}の検索結果{{$count ?? 0}}件</p>
        <table class="admin__table">
            <tr class="admin__row">
                <th class="admin__label">日付</th>
                <th class="admin__label">体重</th>
                <th class="admin__label">食事摂取カロリー</th>
                <th class="admin__label">運動時間</th>
                <th class="admin__label"></th>
            </tr>
            @foreach ($items as $item)
                <tr class="admin__row">
                    <td class="admin__data">{{$item->date}}</td>
                    <td class="admin__data">{{$item->weight}}</td>
                    <td class="admin__data">{{$item->calories}}</td>
                    <td class="admin__data">{{$item->exercise_time}}</td>
                    <td class="admin__data">
                        <a class="admin__detail-button" href="{{ route('weight_logs.show', ['weightLogId' => $item->id]) }}"></a>
                    </td><!-- 情報画面に遷移する -->
                </tr>
            @endforeach
        </table>
        @endif
    </div>
    {{ $items->links() }}
</div>
@endsection