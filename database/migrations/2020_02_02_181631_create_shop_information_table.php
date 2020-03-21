<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_information', function (Blueprint $table) {
            $table->bigIncrements('shopInfoId');
            $table->string('shopName');
            $table->integer('shopSerialId');
            $table->string('shopUserName');
            $table->string('password');
            $table->string('lastLoginIp');
            $table->integer('referType');
            $table->integer('referUserId');
            $table->integer('shopTypeId');
            $table->boolean('shopStatus');
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
        Schema::dropIfExists('shop_information');
    }
}
