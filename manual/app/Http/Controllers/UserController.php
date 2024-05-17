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
        $user = User::query()->create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            //パスワードをハッシュ化する
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
}
