<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Punch;
use App\Models\Attendance;
use Carbon\Carbon;

class StampedController extends Controller
{
    // 打刻ページの表示
    public function create()
    {
        return view('/stamp'); // 打刻ページのビューを表示
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:attendance,break', // 勤怠または休憩を示す'type'フィールド
        ]);

        // Stampモデルのインスタンスを作成し、データベースに保存
        $punch = new Punch();
        $punch->type = $request->type;
        $punch->user_id = auth()->user()->id; // 認証済みユーザーのIDを使用
        $punch->punched_at = now();
        $punch->save();
        // 保存後、適切なリダイレクト先やメッセージを返す
        return redirect()->route('/stamp')->with('status', '打刻が完了しました。');
    }

    // 日を跨いだ時点で翌日の出勤操作に切り替える
    public function punchIn()
    {
        $now = Carbon::now();
        // 勤務日を決定する基準時刻（例：午前0時）
        $cutoffHour = 0;

        // 現在時刻が基準時刻より前なら前日の日付で打刻、そうでなければ今日の日付で打刻
        $workDay = $now->hour < $cutoffHour ? $now->copy()->subDay()->toDateString() : $now->toDateString();

        // 出勤打刻処理（仮）
        $attendance = Attendance::updateOrCreate(
            ['work_day' => $workDay, 'user_id' => auth()->id()], // work_dayとuser_idでレコードを検索
            ['punched_in_at' => $now] // 該当するレコードがなければ作成、あれば更新
        );
        return response()->json($attendance);
    }

        // 勤務開始
    public function startWork(Request $request)
    {
        $attendance = new Attendance();
        $attendance->user_id = auth()->user()->id; // 認証済みユーザーのID
        $attendance->start_time = now();
        $attendance->save();
        return redirect()->back()->with('message', '勤務開始を記録しました。');
    }

    // 勤務終了
    public function endWork(Request $request)
    {
        $attendance = new Attendance();
        $attendance->user_id = auth()->user()->id; // 認証済みユーザーのID
        $attendance->start_time = now();
        $attendance->save();
        return redirect()->back()->with('message', '勤務終了を記録しました。');
    }

    // 休憩開始
    public function startBreak(Request $request)
    {
        $attendance = new Attendance();
        $attendance->user_id = auth()->user()->id; // 認証済みユーザーのID
        $attendance->start_time = now();
        $attendance->save();
        return redirect()->back()->with('message', '休憩開始を記録しました。');
    }

    // 休憩終了
    public function endBreak(Request $request)
    {
        $attendance = new Attendance();
        $attendance->user_id = auth()->user()->id; // 認証済みユーザーのID
        $attendance->start_time = now();
        $attendance->save();
        return redirect()->back()->with('message', '休憩終了を記録しました。');
    }
}
