<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/*
    |--------------------------------------------------------------------------
    | Modificacion la propiedad de una columna de una tabla
    |--------------------------------------------------------------------------
    |   codigo de creacion
    |   php artisan make:migration add_newColum_to_NameTable_table
    | 
    |
*/



class CambiarPropiedadesToCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->string('portada', 150)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->string('portada', 255)->change();
        });
    }
}
