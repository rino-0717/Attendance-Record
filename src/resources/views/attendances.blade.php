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
    </div>
@endsection
