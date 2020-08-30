<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPriceQuantityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_price_quantity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id');
            $table->integer('quantity');
            $table->decimal('price', 3, 2);
            $table->timestamps();
        });

        Schema::table('menu_price_quantity', function ($table) {
            $table->foreign('menu_item_id')->references('id')->on('menu_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_price_quantity');
    }
}
