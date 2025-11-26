<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function reindex()
    {
        // Recompute frequent pairs, update stats, etc.
        // For now, just return success
        return response()->json(['message' => 'Reindexing completed']);
    }
}
