<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $table = 'members';

    protected $fillable = ["name_sei", 
                            "name_mei", 
                            "nickname", 
                            "gender", 
                            "password", 
                            "email"]; //保存したいカラム名が複数の場合
    const UPDATED_AT = NULL;
}
