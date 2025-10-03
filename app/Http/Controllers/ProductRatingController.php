<?php

namespace App\Http\Controllers;

use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string',
            'rating' => 'required|integer|between:1,10',
            'manipulation' => 'nullable|array',
            'referrer' => 'nullable|string',
        ]);

        $respondentId = session('respondent_id');

        if (!$respondentId) {
            return response()->json([
                'success' => false,
                'message' => __('Please complete your profile first.')
            ], 401);
        }

        // Handle product rating storage as before
        $existingRating = ProductRating::where('respondent_id', $respondentId)
            ->where('product_name', $validated['product_name'])
            ->first();

        if ($existingRating) {
            $existingRating->update([
                'rating' => $validated['rating'],
                'manipulation' => $validated['manipulation'] ?? $existingRating->manipulation,
            ]);
            $message = __('Your rating has been updated successfully!');
        } else {
            ProductRating::create([
                'respondent_id' => $respondentId,
                'product_name' => $validated['product_name'],
                'rating' => $validated['rating'],
                'manipulation' => $validated['manipulation'] ?? [],
            ]);
            $message = __('Thank you for your rating!');
        }

        // Check if all products are rated
        $allRated = $this->checkAllProductsRated($respondentId);
        
        // Check if final product already selected
        $finalProductSelected = false;
        if (class_exists('App\Models\FinalProductChoice')) {
            $finalChoice = \App\Models\FinalProductChoice::where('respondent_id', $respondentId)->first();
            $finalProductSelected = !is_null($finalChoice);
        }

        // Determine where to redirect
        $redirectUrl = route('market');
        
        // If rating from news or product page, always return to market
        $referrer = $validated['referrer'] ?? '';
        if (str_contains($referrer, '/news/') || 
            str_contains($referrer, '/onephone') ||
            str_contains($referrer, '/neuphone') ||
            str_contains($referrer, '/xarelphone') || 
            str_contains($referrer, '/zenophone')) {
            $redirectUrl = route('market');
        } 
        // If all rated but no final product selected, stay on market
        else if ($allRated && !$finalProductSelected) {
            $redirectUrl = route('market');
        }
        // If all rated and final product selected, go to post test
        else if ($allRated && $finalProductSelected) {
            $redirectUrl = route('posttest.show');
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'all_products_rated' => $allRated,
            'final_product_selected' => $finalProductSelected,
            'redirect_url' => $redirectUrl
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

    public function hasRated(Request $request)
    {
        $respondentId = session('respondent_id');
        $productName = $request->query('product');

        if (!$respondentId || !$productName) {
            return response()->json([
                'has_rated' => false
            ]);
        }

        $rating = ProductRating::where('respondent_id', $respondentId)
                             ->where('product_name', $productName)
                             ->first();

        return response()->json([
            'has_rated' => !is_null($rating),
            'rating' => $rating ? $rating->rating : null
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
