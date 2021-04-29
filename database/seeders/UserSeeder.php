<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'          => 'Administrator',
                'username'      => 'admin',
                'password'      => bcrypt('admin'),
                'role_id'       => '1',
                'status'        => '1',
                'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Hendri Acong',
                'username'      => 'hendri',
                'password'      => bcrypt('123456'),
                'role_id'       => '2',
                'status'        => '0',
                'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Kadek Dwi Supriawan',
                'username'      => 'wawan',
                'password'      => bcrypt('123456'),
                'role_id'       => '3',
                'status'        => '0',
                'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Michael Bondodi',
                'username'      => 'bondodi',
                'password'      => bcrypt('123456'),
                'role_id'       => '4',
                'status'        => '0',
                'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'          => 'I Made Sukari',
                'username'      => 'sukary',
                'password'      => bcrypt('123456'),
                'role_id'       => '5',
                'status'        => '0',
                'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Alang Pendo D',
                'username'      => 'pendo',
                'password'      => bcrypt('123456'),
                'role_id'       => '6',
                'status'        => '0',
                'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
            ],
        ]);
    }
}
