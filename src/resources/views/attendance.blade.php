@extends('layouts/app')

.section('css')
<link rel="stylesheet" href="{{asset('css/attendance.css')}}">
@endsection

@section('link')
<a href="/">ホーム</a>
<a href="/date-list">日付一覧</a>
<a href="/logout">ログアウト</a>
@endsection('link')

@section('content')
<div class="attendance">
    <input name="date" type="date" />
    <div class="attendance__inner">
        <form-class="attendance-form__form" action="/attendance" method="post">
            <table class="attendance__table">
                <tr class="attendance__row">
                <th class="attendance__label">名前</th>
                <th class="attendance__label">勤務開始</th>
                <th class="attendance__label">勤務終了</th>
                <th class="attendance__label">休憩時間</th>
                <th class="attendance__label">勤務時間</th>
                </tr>
                {{$contacts->links('vender.pagination.custom') }}
            </table>
        </form>
    </div>
</div>
@endsection

