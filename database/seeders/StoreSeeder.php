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
                'name'              => 'CITRA WARNA IMAM BONJOL 1',
                'address'           => 'Jalan Imam Bonjol No. 257ab',
                'phone'             => '081234567890',
                'person_in_charge'  => 'Ginik Susanti',
                'created_at'        => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'        => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'              => 'CITRA WARNA IMAM BONJOL 2',
                'address'           => 'Jl. Imam Bonjol 350',
                'phone'             => '081239731201',
                'person_in_charge'  => 'Komang Sudiartawan',
                'created_at'        => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'        => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'              => 'CITRA WARNA BULUH INDAH',
                'address'           => 'Jl. Buluh Indah 22 Ab',
                'phone'             => '085100104115',
                'person_in_charge'  => 'Awaludin',
                'created_at'        => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'        => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'              => 'CITRA WARNA CANGGU',
                'address'           => 'Jl. Raya Canggu, Ruko Anyar Kencana No 9',
                'phone'             => '085101284515',
                'person_in_charge'  => 'I Ketut Tonico Anggara',
                'created_at'        => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'        => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'              => 'CITRA WARNA TEUKU UMAR BARAT',
                'address'           => 'Jl. Teuku Umar Barat 343',
                'phone'             => '081353212611',
                'person_in_charge'  => 'Riska Eviyanti',
                'created_at'        => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at'        => Carbon::now()->format("Y-m-d H:i:s")
            ],
        ]);
    }
}
