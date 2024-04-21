@extends('layouts.app2')
@section('css')
<link href="{{ asset('css/stamp.css') }}" rel="stylesheet">
@section('css')
@section('content')
<div class="container">
    <h2>打刻画面</h2>
    <form action="{{ route('record.store') }}" method="POST">
        @csrf
            <div class="button-container">
                <input type="hidden" name="work_start_time" value="work_start">
                <button class="button_work_start_time">勤務開始</button>
                <input type="hidden" name="work_end_time" value="work_start">
                <button class="button_work_end_time">勤務終了</button>
                <input type="hidden" name="break_start_time" value="work_start">
                <button class="button_break_start_time">休憩開始</button>
                <input type="hidden" name="break_end_time" value="work_start">
                <button class="button_break_end_time">休憩終了</button>
            </div>
    </form>
</div>
@endsection