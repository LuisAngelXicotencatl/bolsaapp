<?php

namespace Database\Seeders;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$curso = new Curso();
        $curso->name = "laravel";
        $curso->descripcion = "Framework de PHP";
        $curso->avatar = "imagen";
        $curso->save();

        $curso2 = new Curso();
        $curso2->name = "laravel";
        $curso2->descripcion = "Framework de PHP";
        $curso2->avatar = "imagen";
        $curso2->save();

        $curso3 = new Curso();
        $curso3->name = "laravel";
        $curso3->descripcion = "Framework de PHP";
        $curso3->avatar = "imagen";
        $curso3->save();*/

        Curso::factory(50)->create();
    }
}
