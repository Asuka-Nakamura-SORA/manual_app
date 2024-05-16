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

    //送信先
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

    public function profile()
    {
        return view('profile');
    }
}
