@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="attendance">
    <div class="attendance__inner">
        <form class="attendance-form__form" action="{{ route('attendance.index') }}" method="post">
            @csrf
            <table class="attendance__table">
                <tr class="attendance__row">
                    <th class="attendance__label">名前</th>
                    <th class="attendance__label">勤務開始</th>
                    <th class="attendance__label">勤務終了</th>
                    <th class="attendance__label">休憩時間</th>
                    <th class="attendance__label">勤務時間</th>
                </tr>
                @foreach ($attendance as $record)
                <tr class="attendance__row">
                    <td class="attendance__data">{{ $record->user->name }}</td>
                    <td class="attendance__data">{{ \Carbon\Carbon::parse($record['work_start_time'])->format('H:i') }}</td>
                    <td class="attendance__data">{{ \Carbon\Carbon::parse($record['work_end_time'])->format('H:i') }}</td>
                    <td class="attendance__data">{{ \Carbon\Carbon::parse($record['break_start_time'])->diff(\Carbon\Carbon::parse($record['break_end_time']))->format('%H:%I') }}</td>
                    <td class="attendance__data">{{ \Carbon\Carbon::parse($record['work_hours'])->format('H:i') }}</td>
                </tr>
                @endforeach
            </table>
        </form>
        {{ $attendance->links() }}
    </div>
</div>
@endsection
