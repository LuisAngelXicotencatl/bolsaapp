<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['date_id' => 5, 'event_id' => 16],
            ['date_id' => 2, 'event_id' => 16],
            ['date_id' => 3, 'event_id' => 16],
            ['date_id' => 4, 'event_id' => 16],

            ['date_id' => 6, 'event_id' => 14],
            ['date_id' => 7, 'event_id' => 14],
            ['date_id' => 8, 'event_id' => 14],
            ['date_id' => 9, 'event_id' => 14],
            ['date_id' => 10, 'event_id' => 14],

            ['date_id' => 11, 'event_id' => 13],
            ['date_id' => 12, 'event_id' => 13],
            ['date_id' => 13, 'event_id' => 13],
            ['date_id' => 14, 'event_id' => 13],
            ['date_id' => 15, 'event_id' => 13],

            ['date_id' => 16, 'event_id' => 11],
            ['date_id' => 17, 'event_id' => 11],
            ['date_id' => 18, 'event_id' => 11],
            ['date_id' => 19, 'event_id' => 11],
            ['date_id' => 20, 'event_id' => 11],
        ];

        foreach ($data as $item) {
            DB::table('event_dates')->insert([
                'date_id' => $item['date_id'],
                'event_id' => $item['event_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
