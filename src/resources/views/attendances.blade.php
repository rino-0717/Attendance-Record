@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@end

@section('content')
<div class="date-picker">
    <button class="arrow-btn" id="prev-btn">&lt;</button>
    <h2 class="date">{{ request()->input('date', now()->format('Y-m-d')) }}</h2>
    <button class="arrow-btn" id="next-btn">&gt;</button>
</div>
<div class="attendance_container">
    <table>
        <thead> <!-- thead=ヘッダー部分としてグループ化するための要素 -->
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
            <td>{{ $record->work_start_time }}</td>
            <td>{{ $record->work_end_time }}</td>
            <td>{{ intdiv($record->break_minutes, 60) }}時間{{ $record->break_minutes % 60 }}分</td>
            <td>{{ intdiv($record->work_minutes, 60) }}時間{{ $record->work_minutes % 60 }}分</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<nav class="pagination">
    <a href="" class="pagination__prev">
        <span class="visuallyhidden">Previous Page</span>
    </a>
    <ul class="pagination__items">
        @for ($i = 1; $i <= ($pages ?? 1); $i++)
            <li class="{{ request()->page == $i ? 'is-active' : '' }}">
                <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a>
            </li>
        @endfor
    </ul>
    <a href="" class="pagination__next">
        <span class="visuallyhidden">Next Page</span>
    </a>
</nav>
@endsection