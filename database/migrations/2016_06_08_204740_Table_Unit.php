<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Units', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->integer('BloodType_id')->unsigned();
            $table->integer('freezer_id')->unsigned();
            $table->integer('donor_id')->unsigned()->nullable();
            $table->integer('quantity');
            $table->decimal('price',5,2);
            $table->enum('type', ['Salida', 'Entrada']);
            $table->enum('type_transc', ['Donacion', 'Venta'])->nullable();
            $table->timestamps();

            $table->foreign('donor_id')->references('id')->on('donors');
            $table->foreign('freezer_id')->references('id')->on('freezers');
            $table->foreign('BloodType_id')->references('id')->on('BloodTypes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('Units');
    }
}
