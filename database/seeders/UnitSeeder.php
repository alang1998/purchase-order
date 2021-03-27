<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            ['name' => 'LT'],
            ['name' => 'KG'],
            ['name' => 'GALON'],
            ['name' => 'PAIL'],
        ]);
    }
}
