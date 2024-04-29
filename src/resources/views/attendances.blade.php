@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">
@section('css')

@section('content')
<div class="date-picker">
    <button class="arrow-btn" id="prev-btn">&lt;</button>
    <h2 class="date">{{ now()->format('Y-m-d') }}</h2>
    <button class="arrow-btn" id="next-btn">&gt;</button>
</div>
    <div class="attendance_container">
        <table>
            <thead>
                <tr>
                    <th>名前</th>
                    <th>勤務開始</th>
                    <th>勤務終了</th>
                    <th>休憩時間</th>
                    <th>勤務時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>テスト太郎</td>
                    <td>09:30:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>テスト次郎</td>
                    <td>10:00:10</td>
                    <td>09:29:50</td>
                    <td></td>
                    <td>00:30:20</td>
                </tr>
                <tr>
                    <td>テスト三郎</td>
                    <td>10:00:10</td>
                    <td>09:29:50</td>
                    <td></td>
                    <td>00:30:20</td>
                </tr>
                <tr>
                    <td>テスト四郎</td>
                    <td>10:00:20</td>
                    <td>09:29:40</td>
                    <td></td>
                    <td>00:30:40</td>
                </tr>
                <tr>
                    <td>テスト五郎</td>
                    <td>10:00:20</td>
                    <td>09:29:40</td>
                    <td></td>
                    <td>00:30:40</td>
                </tr>
            </tbody>
        </table>
    </div>
    <nav class="pagination">
        <a href="" class="pagination__prev">
        <span class="visuallyhidden">Previous Page</span>
        </a>
        <ul class="pagination__items">
            <li class="is-active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href="">6</a></li>
            <li><a href="">7</a></li>
            <li><a href="">8</a></li>
            <li><a href="">9</a></li>
            <li><a href="">10</a></li>
            <li><a href="">11</a></li>
            <li><a href="">12</a></li>
            <li><a href="">13</a></li>
            <li><a href="">14</a></li>
            <li><a href="">15</a></li>
            <li><a href="">16</a></li>
            <li><a href="">17</a></li>
            <li><a href="">18</a></li>
            <li><a href="">19</a></li>
            <li><a href="">20</a></li>
            <li><a href="">21</a></li>
        </ul>
    <a href="" class="pagination__arrow pagination__next">
    <span class="visuallyhidden">Next Page</span></a>
    </nav>
@endsection