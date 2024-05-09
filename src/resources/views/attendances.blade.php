@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="date-picker">
    <button class="arrow-btn" id="prev-btn">&lt;</button>
    <h2 class="date">{{ now()->format('Y-m-d') }}</h2>
    <button class="arrow-btn" id="next-btn">&gt;</button>
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
                    <th>{{ $record->user->name }}</th>
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
        @for ($i = 1; $i <= $pages; $i++)
        <li class="{{ request()->page == $i ? 'is-active' : '' }}"><a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a></li>
        @endfor
    </ul>
    <a href="" class="pagination__next">
        <span class="visuallyhidden">Next Page</span>
    </a>
</nav>
@endsection