<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisteredUserController extends Controller
{
    // ユーザー新規登録ページ表示
    public function create()
    {
        return view('auth.register');
    }

    //ユーザー新規登録処理
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login')->with('success', 'User registered successfully');
    }

    //バリデーション
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login')->with('success', 'ユーザー情報ログイン。');
    }
}
