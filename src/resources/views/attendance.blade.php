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
        <input type="hidden" name="date" id="date-input" value="{{ $date }}">
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
    <li class="prev"><a href="#"><</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">6</a></li>
    <li><a href="#">7</a></li>
    <li><a href="#">8</a></li>
    <li><a href="#">9</a></li>
    <li><a href="#">10</a></li>
    <li class="next"><a href="#">></a></li>
</ol>
@endsection

@section('scripts')
<script>
    document.getElementById('prev-btn').addEventListener('click', function() {
        let currentDate = new Date(document.getElementById('date-input').value);
        currentDate.setDate(currentDate.getDate() - 1);
        document.getElementById('date-input').value = currentDate.toISOString().split('T')[0];
        document.getElementById('date-form').submit();
    });

    document.getElementById('next-btn').addEventListener('click', function() {
        let currentDate = new Date(document.getElementById('date-input').value);
        currentDate.setDate(currentDate.getDate() + 1);
        document.getElementById('date-input').value = currentDate.toISOString().split('T')[0];
        document.getElementById('date-form').submit();
    });
</script>
@endsection