<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_category_id');
            $table->unsignedBigInteger('menu_subcategory_id');
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('price', 3, 2);
            $table->timestamps();
        });

        Schema::table('menu_item', function ($table) {
            $table->foreign('menu_category_id')->references('id')->on('menu_category');
        });

        Schema::table('menu_item', function ($table) {
            $table->foreign('menu_subcategory_id')->references('id')->on('menu_subcategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_item');
    }
}
