<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('maincategory_id');
            $table->bigInteger('subcategory_id');
            $table->string('productName');
            $table->bigInteger('yearsOfPurchase');
            $table->bigInteger('expSellPrice');
            $table->bigInteger('name');
            $table->bigInteger('mobile');
            $table->bigInteger('email');
            $table->bigInteger('state');
            $table->bigInteger('city');
            $table->string('photos');
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
        Schema::dropIfExists('advertisements');
    }
}
