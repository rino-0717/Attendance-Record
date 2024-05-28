@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="date-picker">
    <form id="date-form" method="GET" action="{{ route('attendance.index') }}">
        @csrf
        <button class="arrow-btn" id="prev-btn" type="submit">&lt;</button>
        <h2 class="date">{{ $date }}</h2>
        <button class="arrow-btn" id="next-btn" type="submit">&gt;</button>
    </form>
</div>
<div class="attendance_container">
    <table>
        <thead>
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($records as $record)
        <tr>
            <td>{{ $record->user->name }}</td>
            <td>{{ \Carbon\Carbon::parse($record->work_start_time)->format('H:i:s') }}</td>
            <td>{{ $record->work_end_time ? \Carbon\Carbon::parse($record->work_end_time)->format('H:i:s') : '00:00:00' }}</td>
            <td>{{ gmdate('H:i:s', $record->break_minutes * 60) }}</td>
            <td>{{ gmdate('H:i:s', $record->work_minutes * 60) }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<ol class="pagination-1">
    <li class="prev"><a href="/attendance"><</a></li>
        @foreach($records as $record)
            <p>{{ $record->name }}</p>
        @endforeach
        {{ $records->links() }}
    <li class="next"><a href="/attendance">></a></li>
</ol>
@endsection
