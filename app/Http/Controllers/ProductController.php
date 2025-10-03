<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Models\FinalProductChoice;

class ProductController extends Controller
{
    public function storeFinalProduct(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|in:onephone,neuphone,xarelphone,zenophone',
        ]);

        $respondentId = session('respondent_id');

        if (!$respondentId) {
            return response()->json([
                'success' => false,
                'message' => 'Please complete your profile first.'
            ], 403);
        }

        // Make sure all products are rated before allowing final selection
        $ratedCount = ProductRating::where('respondent_id', $respondentId)->count();
        if ($ratedCount < 4) {
            return response()->json([
                'success' => false,
                'message' => 'Please rate all products first.'
            ], 400);
        }

        // Store final product choice
        $finalChoice = FinalProductChoice::updateOrCreate(
            [
                'respondent_id' => $respondentId
            ],
            [
                'product_name' => $validated['product_name'],
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Final product choice saved successfully!',
            'final_product' => $validated['product_name']
        ]);
    }

    public function getFinalProduct(Request $request)
    {
        $respondentId = session('respondent_id');

        if (!$respondentId) {
            return response()->json([
                'success' => false,
                'message' => 'Please complete your profile first.'
            ], 403);
        }

        $finalChoice = FinalProductChoice::where('respondent_id', $respondentId)->first();

        return response()->json([
            'success' => true,
            'final_product' => $finalChoice ? $finalChoice->product_name : null
        ]);
    }
}
