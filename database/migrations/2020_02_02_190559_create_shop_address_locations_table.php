<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAddressLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_address_locations', function (Blueprint $table) {
            $table->bigIncrements('shopAddressLocationId');
            $table->integer('shopId');
            $table->integer('countryId');
            $table->integer('divisionId');
            $table->integer('districtId');
            $table->integer('thanaId');
            $table->integer('unionId');
            $table->integer('worldId');
            $table->longText('address1');
            $table->longText('address2');
            $table->longText('shopFront');
            $table->longText('shopBook');
            $table->longText('shopLeft');
            $table->longText('shopRight');
            $table->string('shopSizeBySqft');
            $table->longText('marketName');
            $table->string('shopNo');
            $table->string('websiteUrl');
            $table->string('facebookUrl');
            $table->string('youtubeUrl');
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
        Schema::dropIfExists('shop_address_locations');
    }
}
