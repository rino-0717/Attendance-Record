<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;


class AttendancesController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today()->toDateString();

        $records = Record::select(
            'user_id',
            DB::raw('DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time)) as date'),
            DB::raw('MIN(work_start_time) as work_start_time'),
            DB::raw('MAX(work_end_time) as work_end_time'),
            DB::raw('MIN(break_start_time) as break_start_time'),
            DB::raw('MAX(break_end_time) as break_end_time'),
            DB::raw('TIMESTAMPDIFF(MINUTE,MIN(work_start_time),MAX(work_end_time))-TIMESTAMPDIFF(MINUTE,MIN(break_start_time),MAX(break_end_time))'),
            DB::raw('TIMESTAMPDIFF(MINUTE,MIN(break_start_time),MAX(break_end_time)) as break_minute'),
        )
        ->whereRaw("DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time)) = ?", [$today])
        ->groupBy('user_id', DB::raw('DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time))'))
        ->paginate(5);
        dd($records);
        return view("attendances", [
            'records' => $records,
            'pages' => $records -> lastPage()
        ]);
    }
    // dd($records); ddのアイテムを付ける必要
}