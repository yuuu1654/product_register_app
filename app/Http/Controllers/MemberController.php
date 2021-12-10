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
    public function new(){
        return view('member.regist');
    }

    public function index(){
        return view("top");
    }
}
