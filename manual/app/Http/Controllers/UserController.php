<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    //register.blade.phpに返す
    public function showRegister()
    {
        return view('register');
    }

    //送信先を設定
    public function register(UserRequest $request)
    {
         // ユーザーを作成し、パスワードをハッシュ化して保存
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        //createしたユーザーでログインする
        Auth::login($user);

        //profileにリダイレクト
        return redirect()->route('profile');
    }

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

    public function login(UserRequest $request)
    {

    // ユーザー認証
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        return redirect()->intended('profile');
    }


        // ユーザー認証が失敗した場合は、ログインページに戻り、エラーメッセージを表示
        return back()->withErrors([
            'email' => 'メールアドレスもしくはパスワードが間違っています'
        ]);
    }
}
