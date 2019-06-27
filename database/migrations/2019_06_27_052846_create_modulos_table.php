<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('Titulo',200);
            $table->string('Descripcion',500);
            $table->integer('Estado');
            $table->integer('Orden');
            $table->string('Icono',100);
            $table->string('Link',100);
            $table->integer('LinkExterno');
            $table->string('Route',100);
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
        Schema::dropIfExists('modulos');
    }
}
