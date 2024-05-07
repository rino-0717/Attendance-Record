<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendancesController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date ?? Carbon::today()->format('Y-m-d');
        $attendances = Attendance::whereDate('created_at', $date)->paginate(5);

        $attendanceData = [];
        foreach ($attendances as $attendance) {
            $workStartTime = $attendance->work_start_time;
            $workEndTime = $attendance->work_end_time;
            $breakStartTime = $attendance->break_start_time;
            $breakEndTime = $attendance->break_end_time;
            $totalWorkHours = $workStartTime->diffInHours($workEndTime) - $breakStartTime->diffInHours($breakEndTime);

            $attendanceData[] = [
                'work_start_time' => $workStartTime,
                'work_end_time' => $workEndTime,
                'break_start_time' => $breakStartTime,
                'break_end_time' => $breakEndTime,
                'total_work_hours' => $totalWorkHours,
            ];
        }

    return view('attendances', [
        'attendances' => $attendanceData,
        'pages' => $attendances->lastPage(),
        ]);
    }
}