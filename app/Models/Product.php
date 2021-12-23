<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ["member_id",
                            "product_category_id", 
                            "product_subcategory_id", 
                            "name", 
                            "image_1", 
                            "image_2",
                            "image_3",
                            "image_4",
                            "product_content"]; //保存したいカラム名が複数の場合
    const UPDATED_AT = NULL;
}
