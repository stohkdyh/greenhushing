<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respondent;

class ProductTypeController extends Controller
{
    /**
     * Show the product type selection page
     */
    public function show()
    {
        // Check if the user has already created a profile
        $respondentId = session('respondent_id');
        if (!$respondentId) {
            return redirect()->route('welcome')->with('error', 'Please complete your profile first.');
        }

        return view('product-type-selection');
    }

    /**
     * Handle the product type selection based on access code
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'access_code' => 'required|string',
        ]);

        $respondentId = session('respondent_id');
        
        if (!$respondentId) {
            return redirect()->route('welcome')->with('error', 'Please complete your profile first.');
        }

        // Define the valid codes and their corresponding product types and products to show
        $validCodes = [
            'ABCD' => [
                'type' => 'Greenwashing',
                'products' => ['onephone', 'zenophone']
            ],
            'TUVW' => [
                'type' => 'Greenhushing',
                'products' => ['onephone', 'neuphone']
            ],
        ];

        // Check if the provided code is valid
        $accessCode = strtoupper($validated['access_code']);
        if (!array_key_exists($accessCode, $validCodes)) {
            return back()->withInput()->with('error', 'Invalid access code. Please try again or contact the researcher.');
        }

        $productTypeData = $validCodes[$accessCode];
        $productType = $productTypeData['type'];
        $productsToShow = $productTypeData['products'];

        // Update the respondent's product type
        $respondent = Respondent::findOrFail($respondentId);
        $respondent->product_type = $productType;
        $respondent->save();

        // Store product type and products to show in session for easy access throughout the app
        session([
            'product_type' => $productType,
            'products_to_show' => $productsToShow,
            'timer_start' => now(), // <--- Mulai timer di sini
        ]);

        // Redirect to the pre-test or next step
        return redirect()->route('pretest.show');
    }
}
