<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matriculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('matriculas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('aluId')->unsigned();
            $table->bigInteger('graId')->unsigned();
            $table->bigInteger('secId')->unsigned();
            $table->timestamps();

            $table->foreign('aluId')->references('id')->on('alumnos')->onDelete("cascade");
            $table->foreign('graId')->references('id')->on('grados')->onDelete("cascade");
            $table->foreign('secId')->references('id')->on('seccions')->onDelete("cascade");
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
    }
}
