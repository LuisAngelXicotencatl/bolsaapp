<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Date;
use App\Models\Empresa;
use App\Models\Event;
use App\Models\EventDate;
use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CursoSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(DateSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(EventDateSeeder::class);
        $this->call(EventImageSeeder::class);
        /*Curso::factory(50)->create();*/
        User::factory(10)->create();
    }
}
