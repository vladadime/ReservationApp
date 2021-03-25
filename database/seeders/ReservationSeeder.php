<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'user_id' => '2',
            'facility_id' => '2',
            'num_of_seats' => 3,
            'reservation_day' => '02.02.2021.',
        ]);
    }
}
