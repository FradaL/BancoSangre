<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Donor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('donors', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('first_lastname');
            $table->string('second_lastname');
            $table->string('phone', 8);
            $table->string('email');
            $table->enum('gender', ['Masculino', 'Femenino']);
            $table->bigInteger('dpi');
            $table->enum('Civil_Status',['Soltero', 'Divorciado', 'Viudo', 'Casado']);
            $table->integer('age');
            $table->integer('BloodType_id')->unsigned();
            $table->decimal('weight', 4,2);
            $table->enum('disease', ['SI', 'NO']);
            $table->enum('tattoo', ['SI', 'NO']);
            $table->enum('status_Check', ['Aprobado', 'Reprobado']);
            $table->enum('status_delete', ['Activo', 'Inactivo']);
            $table->timestamps();

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
        Schema::drop('Donors');
    }
}
