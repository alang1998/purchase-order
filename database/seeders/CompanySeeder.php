<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name'              => 'PT. CITRA WARNA JAYA ABADI',
                'address'           => 'JL. TEUKU UMAR BARAT NO. 343, KEROBOKAN, BADUNG',
                'phone'             => '(0361) 735115',
                'fax'               => '-',
                'email'             => 'admin@cwabali.com',
                'person_in_charge'  => 'Hendri',
                'logo'              => null,
                'stamp'             => null
            ],
        ]);
    }
}
