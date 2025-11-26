<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;

class RecommendationService
{
    public function getRecommendations($userId, $context = null)
    {
        $user = auth()->user(); // Assuming member

        // Rule-based: Top selling products
        $topSelling = SaleItem::selectRaw('product_id, SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->pluck('product_id');

        // Similar category: From user's last purchase
        $similarCategory = collect();
        if ($user) {
            $lastSale = Sale::where('member_id', $user->id)->latest()->first();
            if ($lastSale) {
                $lastProductIds = $lastSale->saleItems->pluck('product_id');
                $categories = Product::whereIn('id', $lastProductIds)->pluck('category_id')->unique();
                $similarCategory = Product::whereIn('category_id', $categories)->whereNotIn('id', $lastProductIds)->limit(5)->pluck('id');
            }
        }

        // Frequently bought together: Simple co-occurrence
        $frequentPairs = collect();
        // For simplicity, recommend products from top selling not purchased by user

        $candidates = $topSelling->merge($similarCategory)->unique()->take(10);

        $products = Product::whereIn('id', $candidates)->get()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'score' => rand(50, 100), // Dummy score
                'reason' => 'Based on popularity and category',
            ];
        });

        // Optional AI reranking: Placeholder
        if (env('AI_API_KEY')) {
            // Call external AI for reranking
            // For now, just sort by score
            $products = $products->sortByDesc('score');
        }

        return $products->values();
    }
}
