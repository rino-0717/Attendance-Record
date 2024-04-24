<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Record;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Record::where('user_id', auth()->user()->id)->get(); // 打刻一覧
        $users = User::simplePaginate(5);  // ページネーション
        $user = auth()->user();  // ログインユーザー
        return view('/attendances', compact('attendances', 'users', 'user')); // ビューにデータを渡して表示
    }
}