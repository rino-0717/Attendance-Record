<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendancedController extends Controller
{
    public function index()
    {
        // 勤怠情報を取得
        $attendances = Attendance::all(); // 例としてすべての勤怠情報を取得

        // ビューに勤怠情報を渡して表示
        return view('/attendances', compact('attendances'));
    }
}
