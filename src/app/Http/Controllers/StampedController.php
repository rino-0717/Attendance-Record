<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Attendance; // 勤怠管理用のモデル（例）
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
        $stamp = new Record();
        $stamp->type = $request->type;
        $stamp->user_id = auth()->user()->id; // 認証済みユーザーのIDを使用
        $stamp->save();

        // 保存後、適切なリダイレクト先やメッセージを返す
        return redirect()->route('/stamp')->with('success', '打刻が完了しました。');
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
}
