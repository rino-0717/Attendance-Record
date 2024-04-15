@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">
@section('css')

@section('content')
    <div class="main">
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
    </div>

@endsection
