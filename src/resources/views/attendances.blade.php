@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">
@section('css')

@section('content')
    <div class="main">
        <table>
            <tr>
                <th>Data</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>
                    {{$user->getDetail()}}
                </td>
            </tr>
            @endforeach
        </table>
        {{ $users->links() }}
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        @if(session('message'))
            <div>{{ session('message') }}</div>
        @endif

        <form action="{{ route('attendances.startWork') }}" method="POST">
            @csrf
            <button type="submit">勤務開始</button>
        </form>
        <form action="{{ route('attendances.endWork') }}" method="POST">
            @csrf
            <button type="submit">勤務終了</button>
        </form>
        <form action="{{ route('attendances.startBreak') }}" method="POST">
            @csrf
            <button type="submit">休憩開始</button>
        </form>
        <form action="{{ route('attendances.endBreak') }}" method="POST">
            @csrf
            <button type="submit">休憩終了</button>
        </form>
        {{-- 打刻データの一覧表示 --}}
        @foreach($attendances as $attendance)
            <div>{{ $attendance->user_id }} - {{ $attendance->start_time }} - {{ $attendance->end_time }} - {{ $attendance->break_start }} - {{ $attendance->break_end }}</div>
        @endforeach
    </div>
@endsection
