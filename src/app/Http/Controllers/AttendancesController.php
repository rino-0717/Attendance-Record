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
        // 現在の日付を$todayに格納
        $today = Carbon::today()->toDateString();

        $records = Record::select(
            'user_id',
            // その日付部分を抽出
            DB::raw('DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time)) as date'),
            // 勤務開始時間の最小値を取得
            DB::raw('MIN(work_start_time) as work_start_time'),
            // 勤務終了時間の最大値を取得
            DB::raw('MAX(work_end_time) as work_end_time'),
            // 休憩開始時間の最小値を取得
            DB::raw('MIN(break_start_time) as break_start_time'),
            // 休憩終了時間の最大値を取得
            DB::raw('MAX(break_end_time) as break_end_time'),
            // 勤務時間（休憩時間を除いた時間）を計算
            DB::raw('TIMESTAMPDIFF(MINUTE,MIN(work_start_time),MAX(work_end_time))-TIMESTAMPDIFF(MINUTE,MIN(break_start_time),MAX(break_end_time))'),
            // 休憩時間の差分を計算
            DB::raw('TIMESTAMPDIFF(MINUTE,MIN(break_start_time),MAX(break_end_time)) as break_minute'),
        )
        // 指定された$todayと等しいか確認
        ->whereRaw("DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time)) = ?", [$today])
        // 各ユーザーについて、特定の日に関するレコードをグループ化
        ->groupBy('user_id', DB::raw('DATE(COALESCE(work_start_time, work_end_time, break_start_time, break_end_time))'))
        ->paginate(5);
        // dd($records);

        return view("attendances", [
            'records' => $records,
            'pages' => $records -> lastPage()
        ]);
    }
}