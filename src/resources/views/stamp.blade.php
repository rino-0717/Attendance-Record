@extends('layouts.app2')

@section('css')
<link href="{{ asset('css/stamp.css') }}" rel="stylesheet">
@section('css')

@section('content')
<div class="container">
    <h2>打刻画面</h2>
        <div class="button-container">
            <button class="button">勤務開始</button>
            <button class="button">勤務終了</button>
        </div>
        <div class="button-container">
            <button class="button">休憩開始</button>
            <button class="button">休憩終了</button>
        </div>
</div>
@endsection
