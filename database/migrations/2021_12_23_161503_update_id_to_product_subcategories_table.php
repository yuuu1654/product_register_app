<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIdToProductSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_subcategories', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->unsignedInteger("product_category_id")->comment("カテゴリID")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_subcategories', function (Blueprint $table) {
            //
        });
    }
}
