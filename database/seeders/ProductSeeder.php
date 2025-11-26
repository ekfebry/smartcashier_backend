<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create(['name' => 'Nasi Goreng', 'description' => 'Fried rice', 'price' => 15000, 'stock' => 50, 'category_id' => 1, 'supplier_id' => 1]);
        \App\Models\Product::create(['name' => 'Ayam Bakar', 'description' => 'Grilled chicken', 'price' => 20000, 'stock' => 30, 'category_id' => 1, 'supplier_id' => 1]);
        \App\Models\Product::create(['name' => 'Coca Cola', 'description' => 'Soft drink', 'price' => 5000, 'stock' => 100, 'category_id' => 2, 'supplier_id' => 2]);
        \App\Models\Product::create(['name' => 'Sprite', 'description' => 'Lemon soda', 'price' => 5000, 'stock' => 100, 'category_id' => 2, 'supplier_id' => 2]);
        \App\Models\Product::create(['name' => 'Chips', 'description' => 'Potato chips', 'price' => 8000, 'stock' => 80, 'category_id' => 3, 'supplier_id' => 3]);
        \App\Models\Product::create(['name' => 'Chocolate', 'description' => 'Milk chocolate', 'price' => 10000, 'stock' => 60, 'category_id' => 3, 'supplier_id' => 3]);
    }
}
