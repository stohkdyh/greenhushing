<?php

namespace App\Http\Controllers;

use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|in:onephone,xarelphone,neuphone,zenophone',
            'rating' => 'required|integer|between:1,10',
        ]);

        $respondentId = session('respondent_id');

        if (!$respondentId) {
            return response()->json([
                'success' => false,
                'message' => __('Please complete your profile first.')
            ], 401);
        }

        // Check if rating already exists for this product
        $existingRating = ProductRating::where('respondent_id', $respondentId)
                                     ->where('product_name', $validated['product_name'])
                                     ->first();

        if ($existingRating) {
            // Update existing rating
            $existingRating->update(['rating' => $validated['rating']]);
            $message = __('Your rating has been updated successfully!');
        } else {
            // Create new rating
            ProductRating::create([
                'respondent_id' => $respondentId,
                'product_name' => $validated['product_name'],
                'rating' => $validated['rating'],
            ]);
            $message = __('Thank you for your rating!');
        }

        // Check if all products are rated
        $allRated = $this->checkAllProductsRated($respondentId);

        return response()->json([
            'success' => true,
            'message' => $message,
            'all_products_rated' => $allRated,
            'redirect_url' => $allRated ? route('posttest.show') : route('market')
        ]);
    }

    public function getRating(Request $request)
    {
        $respondentId = session('respondent_id');
        $productName = $request->query('product');

        if (!$respondentId || !$productName) {
            return response()->json(['rating' => null]);
        }

        $rating = ProductRating::where('respondent_id', $respondentId)
                              ->where('product_name', $productName)
                              ->first();

        return response()->json(['rating' => $rating ? $rating->rating : null]);
    }

    public function getRatedProducts(Request $request)
    {
        $respondentId = session('respondent_id');

        if (!$respondentId) {
            return response()->json(['rated_products' => []]);
        }

        $ratedProducts = ProductRating::where('respondent_id', $respondentId)
                                    ->pluck('product_name')
                                    ->toArray();

        $allRated = $this->checkAllProductsRated($respondentId);

        return response()->json([
            'rated_products' => $ratedProducts,
            'all_products_rated' => $allRated
        ]);
    }

    private function checkAllProductsRated($respondentId)
    {
        $allProducts = ['onephone', 'xarelphone', 'neuphone', 'zenophone'];
        $ratedCount = ProductRating::where('respondent_id', $respondentId)
                                 ->whereIn('product_name', $allProducts)
                                 ->count();

        return $ratedCount >= count($allProducts);
    }
}
