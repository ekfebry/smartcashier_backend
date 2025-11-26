<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class WebDashboardController extends Controller
{
    public function index()
    {
        $token = session('api_token');
        if (!$token) {
            return redirect('/login');
        }

        // Call dashboard stats logic directly
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $todaySales = Sale::whereDate('sale_date', today())->sum('total_amount');
        $todaySalesCount = Sale::whereDate('sale_date', today())->count();

        $stats = [
            'total_categories' => $totalCategories,
            'total_products' => $totalProducts,
            'sales_today' => $todaySalesCount,
            'revenue_today' => $todaySales,
        ];

        return view('dashboard', compact('stats'));
    }
}
