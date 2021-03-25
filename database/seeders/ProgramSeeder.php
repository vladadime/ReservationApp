<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'name' => 'Tehno Party',
            'event_date' => '26.03.2021.',
            'description' => 'Veceras najludja zurka bla bla',
            'facility_id' => '6'
        ]);
        DB::table('programs')->insert([
            'name' => 'Tamburasi',
            'event_date' => '25.03.2021.',
            'description' => 'Veceras je tamburasko vece u kafani Orac',
            'facility_id' => '2'
        ]);
        DB::table('programs')->insert([
            'name' => 'Uzivo muzika',
            'event_date' => '26.03.2021.',
            'description' => 'Veceras je uzivo muzika u klubu 2',
            'facility_id' => '6'
        ]);
        DB::table('programs')->insert([
            'name' => 'Devedesete',
            'event_date' => '27.03.2021.',
            'description' => 'Veceras je vece devedesetih u klubu Procces',
            'facility_id' => '7'
        ]);
    }
}
