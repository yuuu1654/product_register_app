<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  //Authファサードを使用
use App\Models\Member;  //Memberテーブル

class AuthController extends Controller
{
    /**
     * ログインフォーム画面を表示する
     * @return view
     */
    public function login_form(){
        session()->forget("form_input");  //セッションを空にする
        return view("members.login");
    }


    /**
     * ログイン処理
     * ①emailをキーにしてDBにメンバーが保存されているか検索して取得
     * ②取得したメンバーのpasswordと入力されたpasswordを比較する
     * ③パスワードが一致してたらログイン成功
     * attempt() : SessionGuard, l:353 
     * 
     * @param App\Http\Requests\LoginFormRequest $request
     */
    public function login(LoginFormRequest $request){
        $credentials = $request->only("email", "password");
        //dd($credentials);
        $email = $request->only("email");
        //セッションに値を保存
        $request->session()->put("form_input", $email);

        //ログインの判定
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //ログイン成功したらトップ画面に遷移する
            $request->session()->forget("form_input");  //セッションを空にする
            return redirect()->route('top')->with("login_success", "ログイン成功しました！");
        }
        //ログインに失敗したらエラーメッセージと共に元のページに返す
        return back()->withErrors([
            "login_error" => "IDかパスワードが間違っています",
        ])->withInput($email);
    }


    /**
     * ログアウト処理
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();  //セッションを全て破棄
        $request->session()->regenerateToken();  //二重送信防止
        return redirect()->route('/')->with('logout_success', 'ログアウトしました！');
    } 
}
