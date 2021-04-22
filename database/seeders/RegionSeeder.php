<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            [
                'region_code' => 'PLM',
                'name'        => 'PALEMBANG',
                'created_at'  => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'  => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'region_code' => 'MLG',
                'name'        => 'MALANG',
                'created_at'  => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'  => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'region_code' => 'TGR',
                'name'        => 'TANGERANG',
                'created_at'  => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'  => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'region_code' => 'SLW',
                'name'        => 'SULAWESI',
                'created_at'  => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'  => Carbon::now()->format("Y-m-d H:i:s")
            ],
        ]);
    }
}
