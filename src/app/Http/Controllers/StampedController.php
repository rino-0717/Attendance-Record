<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use Carbon\Carbon;

class StampedController extends Controller
{
    // 打刻ページの表示
    public function create()
    {
        return view('stamp'); // 打刻ページのビューを表示
    }

    // 勤務開始の処理
    public function punchIn(Request $request)
    {
        $now = Carbon::now();
        $userId = $request->user()->id;

        // 勤務開始のレコードを作成
        Record::create([
            'user_id' => $userId,
            'work_start_time' => $now,
            'type' => 'work_start', // 勤務開始のタイプを設定
        ]);
        return response()->json(['message' => '勤務開始が登録されました。']);
    }

    // 勤務終了の処理
    public function punchOut(Request $request)
    {
        $now = Carbon::now();
        $userId = $request->user()->id;

        // 勤務終了のレコードを作成
        Record::create([
            'user_id' => $userId,
            'work_end_time' => $now,
            'type' => 'work_end', // 勤務終了のタイプを設定
        ]);
        return response()->json(['message' => '勤務終了が登録されました。']);
    }

    // 休憩開始の処理
    public function startBreak(Request $request)
    {
        $record = new Record();
        $record->user_id = auth()->user()->id; // 認証済みユーザーのID
        $record->break_start_time = now();
        $record->type = 'break_start';
        $record->save();
        return back()->with('status', '休憩開始が記録されました。');
    }

    // 休憩終了の処理
    public function endBreak(Request $request)
    {
        $record = new Record();
        $record->user_id = auth()->user()->id; // 認証済みユーザーのID
        $record->break_end_time = now();
        $record->type = 'break_end';
        $record->save();
        return back()->with('status', '休憩終了が記録されました。');
    }

    // 勤務開始の処理 (store method)
    public function store(Request $request)
    {
        $record = new Record();
        $record->user_id = auth()->user()->id; // 認証済みユーザーのID
        $record->work_start_time = now(); // 現在の時刻を保存
        $record->type = 'work_start'; // 勤務開始のタイプを設定
        $record->save(); // データベースに保存
        return back()->with('status', '勤務開始が記録されました。');
    }
}