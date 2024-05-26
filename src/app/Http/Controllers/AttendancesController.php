<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use Carbon\Carbon;

class AttendancesController extends Controller
{
    public function index(Request $request)
    {
        // 現在の日付を取得し、リクエストから日付を取得
        $date = $request->input('date', Carbon::today()->toDateString());

        // 勤怠記録を取得
        $records = Record::select(
            'user_id',
            DB::raw('DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time)) as date'), // 日付部分を抽出
            DB::raw('MIN(work_start_time) as work_start_time'), // 勤務開始時間の最小値を取得
            DB::raw('MAX(work_end_time) as work_end_time'), // 勤務終了時間の最大値を取得
            DB::raw('MIN(break_start_time) as break_start_time'), // 休憩開始時間の最小値を取得
            DB::raw('MAX(break_end_time) as break_end_time'), // 休憩終了時間の最大値を取得
            DB::raw('TIMESTAMPDIFF(MINUTE, MIN(break_start_time), MAX(break_end_time)) as break_minutes'), // 勤務時間（休憩時間を除いた時間）を計算
            DB::raw('TIMESTAMPDIFF(MINUTE, MIN(work_start_time), MAX(work_end_time)) - IFNULL(TIMESTAMPDIFF(MINUTE, MIN(break_start_time), MAX(break_end_time)), 0) as work_minutes') // 休憩時間の差分を計算
        )
        ->whereRaw("DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time)) = ?", [$date])
        ->groupBy('user_id', DB::raw('DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time))'))
        ->paginate(5);

        return view('attendance', compact('records', 'date'));
    }

    public function handleNextDay(Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());
        $nextDate = Carbon::parse($date)->addDay()->toDateString();

        return redirect()->route('attendance.index', ['date' => $nextDate]);
    }

    public function handlePreviousDay(Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());
        $previousDate = Carbon::parse($date)->subDay()->toDateString();

        return redirect()->route('attendance.index', ['date' => $previousDate]);
    }
}