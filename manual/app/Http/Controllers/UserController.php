<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //register.blade.phpに返す
    public function showRegister()
    {
        return view('register');
    }

    //送信先を設定
    public function register(Request $request)
    {

        // リクエストデータのバリデーション
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

        // ユーザーを作成し、パスワードをハッシュ化して保存
        $user = User::query()->create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password'])
        ]);

        //createしたユーザーでログインする
        Auth::login($user);

        //profileにリダイレクト
        return redirect()->route('profile');
    }

    //profileに飛ばす
    public function profile()
    {
        return view('profile');
    }

    //ログアウト機能
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    //ログイン機能
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //ユーザー認証
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('profile');
        }

        return back();
    }
}
