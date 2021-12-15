<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePasswordResetRequest;  //リクエストクラスの読み込み
use Illuminate\Support\Facades\Hash;  //パスワードのハッシュ化

//保存する為にモデルを呼び出す
use App\Models\Member;

class PasswordResetController extends Controller
{
    /**
     * パスワード再設定フォーム画面を表示する
     * @return view
     */
    public function new(){
        $mode = "input";  //完了画面モード
        return view("password_resets.password_reset", compact("mode"));
    }



    /**
     * フォームに入力されたメールアドレスにメールを送信する
     * @param $request
     */
    public function send_email(StorePasswordResetRequest $request){

        //$email = $request->input('email');
        $email = $request->email;



        //セッションに値を保存する
        $request->session()->put("form_input", $email);
        



        //メールを送信する処理
        $message  = "パスワード再発行 \r\n"
                    . "以下のURLをクリックして \r\n"
                    . "パスワードを再発行して下さい \r\n"
                    . "https://os3-382-24072.vs.sakura.ne.jp/password_resets/password_reset \r\n";
                    
        mb_language("ja");
        mb_internal_encoding("UTF-8");
        mb_send_mail($email,'パスワード再設定',$message);
        //mail('uemura@hogehoge.com','お問い合わせありがとうございます',$message);
        return redirect("password_resets/done");
    }



    /**
     * メール送信完了画面を表示する
     * @return view
     */
    public function send_done(){
        $mode = "done";  //完了画面モード
        return view("password_resets.password_reset", compact("mode"));
    }



    /**
     * パスワード再設定フォーム画面を表示する
     * @return view
     */
    public function password_reset_form(){
        $mode = "reset";  //パスワード再設定フォーム画面モード
        return view("password_resets.password_reset", compact("mode"));
    }



    /**
     * パスワードを再設定する
     * パスワードを再設定してログイン状態にしてトップ画面に遷移させる
     * @param $request
     */
    public function password_reset(StorePasswordResetRequest $request){
        //フォームから入力されたパスワード
        $new_password =  $request->password;
        //セッションから会員のデータを取得
        $email =  $request->session()->get("form_input");
        $member = Member::where("email", $email);

        if (Hash::check($new_password, $member->password)) {
            // 一致したときの処理
            \DB::beginTransaction();
            try {
                //パスワードのみ更新(リセット)
                $member->fill([
                    "password"=> Hash::make($new_password),
                ]);
                $member->save();
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                abort(500);
            }
            $request->session()->forget("form_input");  //セッションを空にする
            return redirect("/");
        } else {
            // 一致しなかったときの処理

        }
    }
}
