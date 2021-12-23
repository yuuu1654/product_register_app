<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("スレッドID");
            $table->integer("member_id")->comment("会員ID");
            $table->integer("product_category_id")->comment("カテゴリID");
            $table->integer("product_subcategory_id")->comment("サブカテゴリID");
            $table->string("name", 255)->comment("商品名");
            $table->string("image_1", 255)->comment("写真１")->nullable($value = true)->default(null);
            $table->string("image_2", 255)->comment("写真２")->nullable($value = true)->default(null);
            $table->string("image_3", 255)->comment("写真３")->nullable($value = true)->default(null);
            $table->string("image_4", 255)->comment("写真４")->nullable($value = true)->default(null);
            $table->text("product_content")->comment("商品説明");
            $table->dateTime('created_at', 0)->comment("登録日時")->nullable($value = true)->default(null);
            $table->dateTime('updated_at', 0)->comment("編集日時")->nullable($value = true)->default(null);
            $table->softDeletes(0)->comment("削除日時")->nullable($value = true)->default(null);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
