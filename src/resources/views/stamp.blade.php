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
                    <button class="btn">勤務開始</button>
                </div>
                <div class="item">
                    <button class="btn">勤務終了</button>
                </div>
                <div class="item">
                    <button class="btn">休憩開始</button>
                </div>
                <div class="item">
                    <button class="btn">休憩終了</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection('content')