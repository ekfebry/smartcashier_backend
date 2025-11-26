<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Supplier::create(['name' => 'Local Farm', 'contact' => '08123456789', 'address' => 'Jakarta']);
        \App\Models\Supplier::create(['name' => 'Beverage Co', 'contact' => '08198765432', 'address' => 'Bandung']);
        \App\Models\Supplier::create(['name' => 'Snack Supplier', 'contact' => '08111222333', 'address' => 'Surabaya']);
    }
}
