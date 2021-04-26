<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
              "supplier_code"       => "RH-P",
              "name"                => "T - PT RAJAWALI HYOTO PALEMBANG",
              "address"             => "JL SUKABANGUN 1 NO.1390-A",
              "phone"               => "085267111090",
              "email"               => "",
              "person_in_charge"    => "Bp. Jumardiansyah",
              "region_id"           => 1,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "INDANA-S",
              "name"                => "PT. INTI DAYA GUNA ANEKA WARNA MAKASAR",
              "address"             => "Pergudangan patene 88 blok AH-3",
              "phone"               => "0811301646",
              "email"               => "depomakassar@indana.co.id",
              "person_in_charge"    => "Bp. Setiawan",
              "region_id"           => 4,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "RJ-R",
              "name"                => "RUDI JAYA",
              "address"             => "Jln. Suka Bangun No. 2, Sukajaya",
              "phone"               => "0812-7833-214",
              "email"               => "",
              "person_in_charge"    => "Bp. Sonny",
              "region_id"           => 1,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "HA-P",
              "name"                => "HOKI ABADI",
              "address"             => "PALEMBANG",
              "phone"               => "08127835727",
              "email"               => "",
              "person_in_charge"    => "BP ERY",
              "region_id"           => 1,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "KMS-P",
              "name"                => "NT-KMS VARIASI MOTOR",
              "address"             => "JL. S PRAWIRO NO. 3393",
              "phone"               => "082186198998",
              "email"               => "teddyalexanderkesuma@gmail.com",
              "person_in_charge"    => "Bp. Teddy / Ibu Willy",
              "region_id"           => 1,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "CWA-P",
              "name"                => "PT. CITRA WARNA ABADI PALEMBANG",
              "address"             => "PALEMBANG",
              "phone"               => "",
              "email"               => "",
              "person_in_charge"    => "Mbak Eka",
              "region_id"           => 1,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "TDS",
              "name"                => "PT Tritunggal Delta Sejahtera",
              "address"             => "Pergudangan 99 Blok CA CC \nJalan Salembaran Raya  Dadap Kosambi  Tanggerang",
              "phone"               => "02155930144",
              "email"               => "tritunggaldeltasejatera@yahoo.co.id",
              "person_in_charge"    => "Ibu Susi",
              "region_id"           => 4,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "STBA-S",
              "name"                => "T - SELARAS TIGA BUMI ARTHA SULAWESI",
              "address"             => "JL RY TENARU PERGUDANGAN WIRA 9 D6 DRIYOREJO-SBY",
              "phone"               => "0811347001",
              "email"               => "selaras3bumi@gmail.com",
              "person_in_charge"    => "Bp. Ali",
              "region_id"           => 4,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "WA-P",
              "name"                => "T-PT. WARNA AGUNG",
              "address"             => "PALEMBANG",
              "phone"               => "",
              "email"               => "",
              "person_in_charge"    => "SANTO",
              "region_id"           => 1,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "DT-S",
              "name"                => "DUTA BANGUNAN MAKASSAR",
              "address"             => "Veteran Selatan 18, Maricaya, Makassar",
              "phone"               => "082348007878",
              "email"               => "",
              "person_in_charge"    => "Bp. Ali",
              "region_id"           => 4,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "NT-JAP",
              "name"                => "CV JAYA AGUNG PRATAMA",
              "address"             => "RUKO CBD PALM PARADISE BLOCK 27 TAMAN SURYA 5 PEGADUNGAN - KALIDERES",
              "phone"               => "082123021989",
              "email"               => "ergenelube@gmail.com",
              "person_in_charge"    => "IBU YANTI",
              "region_id"           => 1,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "NSI",
              "name"                => "PT. NUSA SARANA INDONESIA PALEMBANG",
              "address"             => "Jl. Kol. KH. Brlian 292A Palembang 30153",
              "phone"               => "0711415086",
              "email"               => "johny.lumintang@yahoo.co.id",
              "person_in_charge"    => "Bp. Jhony",
              "region_id"           => 1,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
              "supplier_code"       => "ES-S",
              "name"                => "CV. ELKONSTAR SULAWESI",
              "address"             => "JL SANGIR NO.98 SULAWESI SELATAN KEC MAMAJANG",
              "phone"               => "081928718718",
              "email"               => "samuraimks@gmail.com",
              "person_in_charge"    => "Bp. Andi",
              "region_id"           => 4,
              "created_at"          => Carbon::now()->format("Y-m-d H:i:s"),
              "updated_at"          => Carbon::now()->format("Y-m-d H:i:s")
            ]
          ]);
    }
}
