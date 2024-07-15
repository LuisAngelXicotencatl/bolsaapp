<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['image_id' => 1, 'event_id' => 1],
            ['image_id' => 2, 'event_id' => 2],
            ['image_id' => 3, 'event_id' => 3],
            ['image_id' => 4, 'event_id' => 4],
            ['image_id' => 5, 'event_id' => 5],
            ['image_id' => 6, 'event_id' => 6],
            ['image_id' => 7, 'event_id' => 7],
            ['image_id' => 8, 'event_id' => 8],
            ['image_id' => 9, 'event_id' => 9],
            ['image_id' => 10, 'event_id' => 10],
            ['image_id' => 11, 'event_id' => 11],
            ['image_id' => 12, 'event_id' => 12],
            ['image_id' => 13, 'event_id' => 13],
            ['image_id' => 14, 'event_id' => 14],
            ['image_id' => 15, 'event_id' => 15],
            ['image_id' => 16, 'event_id' => 16],
            ['image_id' => 14, 'event_id' => 14],
            ['image_id' => 17, 'event_id' => 17],
            ['image_id' => 18, 'event_id' => 18],
            ['image_id' => 19, 'event_id' => 19],
            ['image_id' => 20, 'event_id' => 20],
        ];

        foreach ($data as $item) {
            DB::table('event_image')->insert([
                'image_id' => $item['image_id'],
                'event_id' => $item['event_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
