@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')
<div class="stamp-form">
    <p class="content__title">{{ Auth::user()->name }}さんお疲れ様です!</p>
    <div class="stamp-form__inner">
        <form class="stamp-form__form" action="/stamp" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? null }}">
            <div class="wrap">
                <div class="item">
                    <button type="submit" name="action" value="work_start" class="content__inner-item">勤務開始</button>
                </div>
                <div class="item">
                    <button type="submit" name="action" value="work_end" class="content__inner-item">勤務終了</button>
                </div>
                <div class="item">
                    <button type="submit" name="action" value="break_start" class="content__inner-item">休憩開始</button>
                </div>
                <div class="item">
                    <button type="submit" name="action" value="break_end" class="content__inner-item">休憩終了</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
