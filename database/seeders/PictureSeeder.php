<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictures')->insert([
            'facility_id' => '2',
            'picture_url' => '/assets/images/ukratko.jpg'
        ]);
        DB::table('pictures')->insert([
            'facility_id' => '2',
            'picture_url' => '/assets/images/meze.jpg'
        ]);
        DB::table('pictures')->insert([
            'facility_id' => '2',
            'picture_url' => '/assets/images/06711-nis-restoran-zelja-pro.jpg'
        ]);
        DB::table('pictures')->insert([
            'facility_id' => '2',
            'picture_url' => '/assets/images/bla_bla.jpg'
        ]);
    }
}
