<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Record;
use App\Models\Attendance;

class AttendanceController extends Controller
{
        // ログインページ表示
    public function create()
    {
        $user_id = 1; // 仮の値
        $attendances = Attendance::where('user_id', $user_id)->get();
        return view('attendances', ['attendances' => $attendances]);
    }
}