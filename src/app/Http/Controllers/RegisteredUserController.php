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
    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('/login')->with('success', 'アカウントが正常に作成されました。');
    }
}
