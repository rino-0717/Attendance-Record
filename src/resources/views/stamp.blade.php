@extends('layouts.app2')
@section('css')
<link href="{{ asset('css/stamp.css') }}" rel="stylesheet">
@section('css')
@section('content')
<div class="container">
    <h2>打刻画面</h2>
    <div class="button-container">
        <form action="{{ route('stamp.store') }}" method="POST">
            @csrf
            <input type="hidden" name="work_start_time" value="work_start">
            <button type="submit" class="button_work_start_time">勤務開始</button>
        </form>
        <form action="{{ route('stamp.endWork') }}" method="POST">
            @csrf
            <input type="hidden" name="work_end_time" value="work_end">
            <button type="submit" class="button_work_end_time">勤務終了</button>
        </form>
    </div>
    <div class="button-container_break">
        <form action="{{ route('stamp.startBreak') }}" method="POST">
            @csrf
            <input type="hidden" name="break_start_time" value="break_start">
            <button type="submit" class="button_break_start_time">休憩開始</button>
        </form>
        <form action="{{ route('stamp.endBreak') }}" method="POST">
            @csrf
            <input type="hidden" name="break_end_time" value="break_end">
            <button type="submit" class="button_break_end_time">休憩終了</button>
        </form>
    </div>
</div>
@endsection