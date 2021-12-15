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
})->name("/");



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
    //ログインフォームの表示
    //Route::get("login", "MemberController@login_form")->name("members.login");
    Route::get("login", "Auth\AuthController@login_form")->name("members.login");

    //ログイン処理
    Route::post("login", "Auth\AuthController@login")->name("members.login");

    //パスワード再設定フォームの表示
    Route::get("password_reset", "MemberController@password_reset_form")->name("members.password_reset");   
});

Route::group(["prefix" => "password_resets"], function(){
    //メール送信画面の表示
    Route::get("/", "PasswordResetController@new")->name("password_resets");  
    //メールを送信する
    Route::post("send", "PasswordResetController@send_email")->name("password_resets.send");
    //完了画面の表示
    Route::get("done", "PasswordResetController@send_done")->name("password_resets.done"); 
    //パスワード再設定フォームの表示
    Route::get("password_reset", "PasswordResetController@password_reset_form")->name("password_resets.password_reset");   
    //パスワード再設定
    Route::post("password_reset", "PasswordResetController@password_reset")->name("password_resets.password_reset");
});

Route::get('top', 'MemberController@index')
->name('top');