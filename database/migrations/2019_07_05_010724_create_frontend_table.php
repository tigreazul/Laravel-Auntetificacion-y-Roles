<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('Titulo');
            $table->string('Slug');
            $table->integer('Categoria');
            $table->string('Tag');
            $table->string('Imagen_principal');
            $table->string('Contenido');
            $table->integer('Estado');
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
        Schema::dropIfExists('frontend');
    }
}
