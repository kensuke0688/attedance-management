@extends('layouts/app')


@section('link')
<link rel="stylesheet" href="{{ asset('css/stamp.css')}}">
@endsection

@section('content')
<div class="stamp-form">
    <div class="stamp-form__inner">
        <form-class="stamp-form__form" action="/stamp" method="post">
            @csrf
            <div class="wrap">
                <div class="item">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? null }}">
                    <button type="submit" name="work_start_time" class="content__inner-item">勤務開始</button>
                </div>
                <div class="item">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? null }}">
                    <button type="submit" name="work_end_time" class="content__inner-item">勤務終了</button>
                </div>
                <div class="item">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? null }}">
                    <button type="submit" name="break_start_time" class="content__inner-item">休憩開始</button>
                </div>
                <div class="item">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? null }}">
                    <button type="submit" name="break_end_time" class="content__inner-item">休憩終了</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection('content')