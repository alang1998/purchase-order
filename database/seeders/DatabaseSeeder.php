<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(CompanySeeder::class);
    }
}
