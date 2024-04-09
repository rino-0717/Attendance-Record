<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // ログインページ表示
    public function create()
    {
        return view('auth.login');
    }

    // ユーザーログイン処理
    public function store(Request $request)
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

    public function destroy(Request $request)
    {
        Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // ログアウト後のリダイレクト先
    }
}
