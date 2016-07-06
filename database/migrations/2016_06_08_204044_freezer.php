<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Freezer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('freezers', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('name')->unique();
            $table->string('address');
            $table->integer('WareHouse_id')->unsigned();
            $table->string('status_delete');
            $table->timestamps();

            $table->foreign('WareHouse_id')->references('id')->on('WareHouses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('freezers');
    }
}
