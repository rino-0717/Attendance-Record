@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">
@endsection

@section('link')
<a class="header__link" href="/register">attendance</a>
@endsection

@section('content')
<body>
    <div class="header">
        <a href="home.html">ホーム</a>
        <a href="date_list.html">日付一覧</a>
        <a href="logout.html">ログアウト</a>
    </div>
    <div class="attendance-container">
        <h2>勤怠管理</h2>
        <button id="work_start_time">勤務開始</button>
        <button id="work_end_time">勤務終了</button>
        <button id="break_start_time">休憩開始</button>
        <button id="break_end_time">休憩終了</button>
    </div>
</body>
</html>

@endsection
