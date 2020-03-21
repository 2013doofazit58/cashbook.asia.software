<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_product_categories', function (Blueprint $table) {
            $table->bigIncrements('addProductCategoryId');
            $table->string('productCategoryName');
            $table->integer('productCategoryPosition');
            $table->integer('productCategoryPerId');
            $table->integer('productCategoryDownlineStatus');
            $table->string('productCategoryCreateByType');
            $table->string('productCreatedBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_product_categories');
    }
}
