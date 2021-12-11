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
    public function create(){
        return view("members.regist");
    }


    /**
     * 会員登録確認画面を表示する
     * @return view
     */
    public function confirm(ConfirmMemberRequest $request){
        $mode = "confirm";

        $member = $request->all();
        //セッションに値を保存する
        $request->session()->put("form_input", $member);
        $member =  $request->session()->get("form_input");

        return view("members.regist", compact("mode", "member"));
    }
    

    /**
     * 会員情報を保存する
     * @param $request
     * @return view
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
        $mode = "done";  //完了画面モード
        $request->session()->forget("form_input");  //セッションを空にする

        return view("member.regist", compact("mode"));
    }
}
