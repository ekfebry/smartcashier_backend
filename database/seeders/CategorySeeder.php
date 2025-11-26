<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create(['name' => 'Food', 'description' => 'Food items']);
        \App\Models\Category::create(['name' => 'Beverage', 'description' => 'Drinks and beverages']);
        \App\Models\Category::create(['name' => 'Snack', 'description' => 'Snacks and light meals']);
    }
}
