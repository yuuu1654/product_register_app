<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    protected $fillable = ["name"]; //保存したいカラム名が複数の場合
    const UPDATED_AT = NULL;
}
