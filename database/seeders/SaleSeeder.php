<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sale1 = \App\Models\Sale::create(['member_id' => 1, 'total_amount' => 35000, 'sale_date' => now()]);
        \App\Models\SaleItem::create(['sale_id' => $sale1->id, 'product_id' => 1, 'quantity' => 1, 'price' => 15000]);
        \App\Models\SaleItem::create(['sale_id' => $sale1->id, 'product_id' => 3, 'quantity' => 2, 'price' => 5000]);

        $sale2 = \App\Models\Sale::create(['member_id' => 2, 'total_amount' => 20000, 'sale_date' => now()]);
        \App\Models\SaleItem::create(['sale_id' => $sale2->id, 'product_id' => 2, 'quantity' => 1, 'price' => 20000]);

        $sale3 = \App\Models\Sale::create(['member_id' => null, 'total_amount' => 13000, 'sale_date' => now()]);
        \App\Models\SaleItem::create(['sale_id' => $sale3->id, 'product_id' => 5, 'quantity' => 1, 'price' => 8000]);
        \App\Models\SaleItem::create(['sale_id' => $sale3->id, 'product_id' => 6, 'quantity' => 1, 'price' => 10000]);
    }
}
