<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Member::updateOrCreate(
            ['email' => 'john@example.com'],
            ['name' => 'John Doe', 'password' => bcrypt('password'), 'phone' => '08123456789', 'address' => 'Jakarta']
        );
        \App\Models\Member::updateOrCreate(
            ['email' => 'jane@example.com'],
            ['name' => 'Jane Smith', 'password' => bcrypt('password'), 'phone' => '08198765432', 'address' => 'Bandung']
        );
        \App\Models\Member::updateOrCreate(
            ['email' => 'bob@example.com'],
            ['name' => 'Bob Johnson', 'password' => bcrypt('password'), 'phone' => '08111222333', 'address' => 'Surabaya']
        );
    }
}
