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

    <div class="main">
        <table class="table">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>勤務開始</th>
                    <th>勤務終了</th>
                    <th>休憩時間</th>
                    <th>勤務時間</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="footer">
        <p>Atte, inc.</p>
    </div>
</body>

@endsection
