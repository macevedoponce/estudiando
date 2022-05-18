<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dethorarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        /*
        Schema::create('dethorarios', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->text('horario');
            $table->bigInteger('curId')->unsigned();
            $table->timestamps();

            $table->foreign('curId')->references('id')->on('cursos')->onDelete("cascade");
        });*/
        Schema::create('dethorarios', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->integer('dia');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->bigInteger('curId')->unsigned();
            $table->timestamps();

            $table->foreign('curId')->references('id')->on('cursos')->onDelete("cascade");
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
