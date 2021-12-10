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
});

Route::get("/member/regist", "MemberController@new")->name("member.regist");
//Route::get('member/regist', 'MemberController@new')->name('member.regist');

Route::post("/member/store", "MemberController@store")->name("member.store");

Route::get('top', 'MemberController@index')
->name('top');