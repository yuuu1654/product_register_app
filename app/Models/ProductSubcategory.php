<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    protected $table = 'product_subcategories';

    protected $fillable = [
        "product_category_id", 
        "name"
    ]; 
    const UPDATED_AT = NULL;
}
