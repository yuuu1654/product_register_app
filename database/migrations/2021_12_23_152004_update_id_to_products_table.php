<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIdToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->unsignedInteger("member_id")->comment("会員ID")->change();
            $table->unsignedInteger("product_category_id")->comment("カテゴリID")->change();
            $table->unsignedInteger("product_subcategory_id")->comment("サブカテゴリID")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer("member_id")->comment("会員ID")->change();
            $table->integer("product_category_id")->comment("カテゴリID")->change();
            $table->integer("product_subcategory_id")->comment("サブカテゴリID")->change();
        });
    }
}
