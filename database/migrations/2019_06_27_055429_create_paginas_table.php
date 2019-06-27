<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->char('Padre',10);
            $table->integer('ModuloID');
            $table->string('Descripcion');
            $table->string('Ruta');
            $table->string('Slug');
            $table->integer('Estado');
            $table->integer('Visible');
            $table->integer('Orden');
            $table->dateTime('FechaIngreso');
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
        Schema::dropIfExists('paginas');
    }
}
