<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subcategories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("サブカテゴリID");
            $table->integer("product_category_id")->comment("カテゴリID");
            $table->string("name", 255)->comment("サブカテゴリ名");
            $table->dateTime('created_at', 0)->comment("登録日時")->nullable($value = true)->default(null);
            $table->dateTime('updated_at', 0)->comment("編集日時")->nullable($value = true)->default(null);
            $table->softDeletes("deleted_at", 0)->comment("削除日時")->nullable($value = true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_subcategories');
    }
}
