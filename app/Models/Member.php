<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ["name_sei", 
                            "name_mei", 
                            "nickname", 
                            "gender", 
                            "password", 
                            "email"]; //保存したいカラム名が複数の場合
    const UPDATED_AT = NULL;
}
