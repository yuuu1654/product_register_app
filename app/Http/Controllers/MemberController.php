<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    

    public function store(Request $request){
        // $member = new Member;

        // $member->name_sei = $request->input("name_sei");
        // $member->name_mei = $request->input("name_mei");
        // $member->nickname = $request->input("nickname");
        // $member->gender = $request->input("gender");
        // $member->password = $request->input("password");
        // $member->email = $request->input("email");

        // $member->save();
        $member = $request->all();
        Member::create($member);

        return redirect("/");
    }
}
