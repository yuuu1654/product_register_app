<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendEmailRequest;           //リクエストクラス
use App\Http\Requests\StorePasswordResetRequest;  //リクエストクラス
use Illuminate\Support\Facades\Auth;  //Authファサードを使用
use Illuminate\Support\Facades\Hash;  //パスワードのハッシュ化

use App\Mail\PasswordReset;  //Mailableクラス
use Illuminate\Support\Facades\Mail;  //Mailファサード

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
    public function send_email(SendEmailRequest $request){
        $email = $request->email;
        //セッションに値を保存する
        $request->session()->put("form_input", $email);
        //メールを送信する処理
        
        //パターン①
        // $text       = "パスワード再発行 \r\n"
        //             . "以下のURLをクリックして \r\n"
        //             . "パスワードを再発行して下さい \r\n"
        //             . "https://os3-382-24072.vs.sakura.ne.jp/password_resets/password_reset \r\n";
        // mb_language("ja");
        // mb_internal_encoding("UTF-8");
        // mb_send_mail($email,'パスワード再設定',$text);
        // mail($email,'パスワード再設定',$message);

        //パターン②
        // $text1 = "パスワード再発行";
        // $text2 = "以下のURLをクリックして";
        // $text3 = "パスワードを再発行して下さい";
        // $text4 = "https://os3-382-24072.vs.sakura.ne.jp/password_resets/password_reset";
        // Mail::to($email)->send(new PasswordReset($text1, $text2, $text3, $text4));

        //パターン③
        Mail::send('mails.password_reset', [
            "text1" => "パスワード再発行",
            "text2" => "以下のURLをクリックして",
            "text3" => "パスワードを再発行して下さい",
            "text4" => "https://os3-382-24072.vs.sakura.ne.jp/password_resets/password_reset"
        ], function($data) use ($email){
                $data   ->to($email)
                        ->subject('パスワード再設定');
        });


        //パターン④
        // Mail::to($email)->send('mails.password_reset', [
        //     "text1" => "パスワード再発行",
        //     "text2" => "以下のURLをクリックして",
        //     "text3" => "パスワードを再発行して下さい",
        //     "text4" => "https://os3-382-24072.vs.sakura.ne.jp/password_resets/password_reset"
        // ], function($data){
        //         $data   ->subject('パスワード再設定');
        // });


        //パターン⑤
        //動的にデータの値を変えたい時
        // $dataArray = $request->all();
        // # Mailファサード
        // Mail::send(array('text' => 'email.message'), $dataArray , function($message) use ($dataArray){
        //     $message->to($dataArray["email"])->subject($dataArray["title"]);
        // });

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
        $member = Member::where("email", $email)->first();
        //var_dump($member);

        if (!is_null($member)) {
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
        } else {
            // 一致しなかったときの処理
        }
        //ログインする
        $member = Member::where("email", $email)->first();
        $member["password"] = $new_password;
        
        $credentials = $member->only("email", "password");
        //dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //ログイン成功したらトップ画面に遷移する
            $request->session()->forget("form_input");  //セッションを空にする
            return redirect()->route('top')->with("login_success", "ログイン成功しました！");
        }
    }
}
