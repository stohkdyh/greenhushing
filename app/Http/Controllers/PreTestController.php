<?php

namespace App\Http\Controllers; // Fixed: Changed from App\Controllers to App\Http\Controllers

use App\Models\PreTest;
use Illuminate\Http\Request;

class PreTestController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'q1' => 'required|integer|between:1,7',
            'q2' => 'required|integer|between:1,7',
            'q3' => 'required|integer|between:1,7',
            'q4' => 'required|integer|between:1,7',
            'q5' => 'required|integer|between:1,7',
            'q6' => 'required|integer|between:1,7',
            'q7' => 'required|integer|between:1,7',
        ]);

        // Get respondent ID from session
        $respondentId = session('respondent_id');

        if (!$respondentId) {
            return redirect()->route('welcome')->with('error', __('Please complete your profile first.'));
        }

        // Check if user already completed pre-test
        $existingPreTest = PreTest::where('respondent_id', $respondentId)->first();
        
        if ($existingPreTest) {
            return redirect()->route('market')->with('info', __('You have already completed the pre-test.'));
        }

        // Add respondent_id to validated data
        $validated['respondent_id'] = $respondentId;

        // Create pre-test record
        PreTest::create($validated);

        // Store completion in session
        session(['pretest_completed' => true]);

        return redirect()->route('market')->with('success', __('Pre-test completed successfully!'));
    }

    public function show()
    {
        // Double-check respondent session exists
        $respondentId = session('respondent_id');
        
        if (!$respondentId) {
            return redirect()->route('welcome')->with('error', __('Please complete your profile first.'));
        }
        
        // Check if user already completed pre-test
        $existingPreTest = PreTest::where('respondent_id', $respondentId)->first();
        
        if ($existingPreTest) {
            return redirect()->route('market')->with('info', __('You have already completed the pre-test.'));
        }

        return view('pre-test');
    }
}
