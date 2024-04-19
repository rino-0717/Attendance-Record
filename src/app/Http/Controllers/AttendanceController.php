<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::where('user_id', auth()->user()->id)->get(); // 打刻一覧
        $authors = User::simplePaginate(5);  // ページネーション
        $attendances = Attendance::all(); // 例としてすべての勤怠情報を取得
        return view('/attendances', compact('attendances')); // ビューに勤怠情報を渡して表示
    }
}