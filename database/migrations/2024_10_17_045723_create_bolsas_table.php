<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBolsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolsas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');  // Título de la sección
            $table->text('descripcion');  // Descripción
            $table->string('logo')->nullable();  // Imagen del logo
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
        Schema::dropIfExists('bolsas');
    }
}
