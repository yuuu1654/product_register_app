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



Route::group(["prefix" => "members"], function(){
    Route::get("regist", "MemberController@create")->name("members.regist");
    Route::post("confirm", "MemberController@confirm")->name("members.confirm");
    Route::post("store", "MemberController@store")->name("members.store");
    //Route::get("done", "MemberController@done")->name("members.done");
});

Route::get('top', 'MemberController@index')
->name('top');