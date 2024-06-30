<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/*
    |--------------------------------------------------------------------------
    | Modificacion de una tabla existente
    |--------------------------------------------------------------------------
    |   codigo de creacion
    |   php artisan make:migration add_newColum_to_NameTable_table
    | 
    |
*/

class AddPortadaToCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->string('portada')->nullable()->after('avatar');//se tiene que agregar el codigo nullable para que los registros existentes se llenen
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
            //
        });
    }
}
