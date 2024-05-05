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
        $attendances = Attendance::whereDate('created_at', $date)->paginate(10);

        return view('attendances', [
            'attendances' => $attendances,
            'pages' => $attendances->lastPage(),
        ]);
    }
}