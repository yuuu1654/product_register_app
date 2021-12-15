<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  //Authファサードを使用

class AuthController extends Controller
{
    /**
     * ログインフォーム画面を表示する
     * @return view
     */
    public function login_form(){
        return view("members.login");
    }


    /**
     * ログイン処理を行う
     * @param App\Http\Requests\LoginFormRequest $request
     */
    public function login(LoginFormRequest $request){
        $credentials = $request->only("email, password");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/");
        }

        return back()->withErrors([
            "login_error" => "IDかパスワードが間違っています",
        ]);
    }
}
