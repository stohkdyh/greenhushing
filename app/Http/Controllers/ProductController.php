<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Models\Respondent;

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

        // Get the products that should be shown for this user
        $productsToShow = session('products_to_show', ['onephone', 'neuphone', 'xarelphone', 'zenophone']);
        
        // Count how many of the displayed products have been rated
        $ratedCount = ProductRating::where('respondent_id', $respondentId)
            ->whereIn('product_name', $productsToShow)
            ->count();
        
        // Make sure all displayed products are rated before allowing final selection
        if ($ratedCount < count($productsToShow)) {
            return response()->json([
                'success' => false,
                'message' => 'Please rate all displayed products first.'
            ], 400);
        }

        // Find respondent and update final_product
        $respondent = Respondent::find($respondentId);
        
        if (!$respondent) {
            return response()->json([
                'success' => false,
                'message' => 'Respondent not found.'
            ], 404);
        }
        
        // Update the final product choice
        $respondent->final_product = $validated['product_name'];
        $respondent->save();

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

        $respondent = Respondent::find($respondentId);
        
        if (!$respondent) {
            return response()->json([
                'success' => false,
                'message' => 'Respondent not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'final_product' => $respondent->final_product
        ]);
    }
}
