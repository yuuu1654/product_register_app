<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('logout');
})->name("logout");



Route::group(["prefix" => "members"], function(){
    //新規登録画面の表示
    Route::get("regist", "MemberController@new")->name("members.regist");  
    //バリデーションをかけてセッションに値を保存する
    Route::post("confirm", "MemberController@confirm")->name("members.confirm");

    //確認画面の表示
    Route::get("create", "MemberController@create")->name("members.create");  
    //会員情報をDBに登録
    Route::post("store", "MemberController@store")->name("members.store");
    //完了画面の表示
    Route::get("done", "MemberController@regist_done")->name("members.done"); 
});

Route::get('top', 'MemberController@index')
->name('top');