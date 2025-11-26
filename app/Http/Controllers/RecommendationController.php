<?php

namespace App\Http\Controllers;

use App\Services\RecommendationService;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    protected $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function index(Request $request)
    {
        $userId = $request->user_id ?? auth()->id();
        $context = $request->context;

        $recommendations = $this->recommendationService->getRecommendations($userId, $context);

        return response()->json($recommendations);
    }
}
