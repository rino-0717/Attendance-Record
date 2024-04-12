<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

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
}
