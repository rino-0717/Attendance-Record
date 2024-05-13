<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\User;
use App\Http\Requests\StampRequest;
use Carbon\Carbon;

class StampedController extends Controller
{
    // 打刻ページの表示
    public function create()
    {
        return view('/stamp'); // 打刻ページのビューを表示
    }

    // 日を跨いだ時点で翌日の出勤操作に切り替える
    public function punchIn()
    {
        $now = Carbon::now();
        $cutoffHour = 0; // 勤務日を決定する基準時刻（例：午前0時）
    }

        // 勤務開始
    public function store(StampRequest $request)
    {
        $record = new Record();
        $record->user_id = auth()->user()->id; // 認証済みユーザーのID
        $record->work_start_time = now(); // 現在の時刻を保存
        $record->type = 'work_start'; // 勤務開始のタイプを設定
        $record->save(); // データベースに保存
        return back()->with('status', '勤務開始が記録されました。');
    }

    // 勤務終了
    public function endWork(StampRequest $request)
    {
        $record = new Record();
        $record->user_id = auth()->user()->id; // 認証済みユーザーのID
        $record->work_end_time = now();
        $record->type = 'work_end';
        $record->save();
        return back()->with('status', '勤務終了が記録されました。');
    }

    // 休憩開始
    public function startBreak(StampRequest $request)
    {
        $record = new Record();
        $record->user_id = auth()->user()->id; // 認証済みユーザーのID
        $record->break_start_time = now();
        $record->type = 'break_start';
        $record->save();
        return back()->with('status', '休憩開始が記録されました。');
    }

    // 休憩終了
    public function endBreak(StampRequest $request)
    {
        $record = new Record();
        $record->user_id = auth()->user()->id; // 認証済みユーザーのID
        $record->break_end_time = now();
        $record->type = 'break_end';
        $record->save();
        return back()->with('status', '休憩終了が記録されました。');
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->input('work_start_time')) {
                $validator->errors()->add('work_start_time', '勤務開始ボタンを押してください。');
                }

            if ($this->input('work_end_time') && $this->input('work_start_time')) {
                $validator->errors()->add('work_end_time', '勤務終了後は再度勤務開始できません。');
                }

            if ($this->input('break_start_time') && !$this->input('work_start_time')) {
                $validator->errors()->add('break_start_time', '勤務開始後に休憩を開始してください。');
                }

            if ($this->input('break_end_time') && !$this->input('break_start_time')) {
                $validator->errors()->add('break_end_time', '休憩開始後に休憩を終了してください。');
                }

            if ($this->input('break_end_time') && !$this->input('work_end_time')) {
                $validator->errors()->add('break_end_time', '休憩終了後に勤務を終了してください。');
                }
        });
    }
}