@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css')}}">
@endsection

@section('link')
<a class="header__link" href="/stamp">stamp</a>
@endsection

@section('content')

<div class="register-form">
    <h2>会員登録</h2>
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
</div>
</html>

@endsection
