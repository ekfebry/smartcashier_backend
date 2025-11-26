<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $todaySales = Sale::whereDate('sale_date', today())->sum('total_amount');
        $todaySalesCount = Sale::whereDate('sale_date', today())->count();

        return response()->json([
            'total_categories' => $totalCategories,
            'total_products' => $totalProducts,
            'sales_today' => $todaySalesCount,
            'revenue_today' => $todaySales,
        ]);
    }
}
