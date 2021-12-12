<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMemberRequest;  //リクエストクラスの読み込み
use App\Http\Requests\ConfirmMemberRequest;  //リクエストクラスの読み込み

//保存する為にモデルを呼び出す
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * 新規会員登録画面を表示する
     * @return view
     */
    public function new(Request $request){
        //新規会員登録画面用の変数
        $mode = "input";
        //セッションから会員のデータを取得
        $member =  $request->session()->get("form_input");
        return view("members.regist", compact("mode", "member"));
    }


    /**
     * バリデーションをかけてセッションに値を保存する
     * @param $request
     */
    public function confirm(ConfirmMemberRequest $request){
        $member = $request->all();
        //セッションに値を保存する
        $request->session()->put("form_input", $member);
        return redirect("members/create");
    }


    /**
     * 確認画面を表示する
     * @return view
     */
    public function create(Request $request){
        //確認画面用の変数
        $mode = "confirm";
        //セッションから会員のデータを取得
        $member =  $request->session()->get("form_input");
        return view("members.regist", compact("mode", "member"));
    }
    

    /**
     * 会員情報を保存する
     * @param $request
     */
    public function store(StoreMemberRequest $request){

        $member =  $request->session()->get("form_input");

        \DB::beginTransaction();
        try {
            //会員を登録
            Member::create($member);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        $request->session()->forget("form_input");  //セッションを空にする
        return redirect("members/done");
    }


    /**
     * 登録完了画面を表示する
     * @return view
     */
    public function regist_done(){
        $mode = "done";  //完了画面モード
        return view("members.regist", compact("mode"));
    }
}
