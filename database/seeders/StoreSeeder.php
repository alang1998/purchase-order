<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'name'              => 'Citra Warna 1',
                'address'           => 'Jl. Imam Bonjol No. 51B',
                'phone'             => '081234567890',
                'person_in_charge'  => 'Ginik Susanti',
                'created_at'        => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'        => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'              => 'Citra Warna 2',
                'address'           => 'Jl. Imam Bonjol No. 343',
                'phone'             => '081239731201',
                'person_in_charge'  => 'Komang Sudiartawan',
                'created_at'        => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'        => Carbon::now()->format("Y-m-d H:i:s")
            ],
        ]);
    }
}
