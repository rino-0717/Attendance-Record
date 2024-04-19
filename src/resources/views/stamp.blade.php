@extends('layouts.app2')

@section('css')
<link href="{{ asset('css/stamp.css') }}" rel="stylesheet">
@section('css')

@section('content')
<div class="container">
    <h2>打刻画面</h2>
        <div class="form-group">
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
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
</div>
@endsection