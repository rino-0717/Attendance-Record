<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    // ログインページ表示
    public function create()
    {
        return view('auth.login');
    }

    // ユーザーログイン処理
    public function store(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // ログイン成功時のリダイレクト先
        }
        return back()->withErrors([
            'email' => '登録されたメールアドレスと一致しません。',
        ])->onlyInput('email');
    }

    // ログアウト処理
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
