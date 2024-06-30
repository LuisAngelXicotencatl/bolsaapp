<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds 16 14 13 11.
     *
     * @return void
     */
    public function run()
    {
        Image::factory(20)->create();
    }
}
