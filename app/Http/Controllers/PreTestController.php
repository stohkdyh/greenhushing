<?php

namespace App\Http\Controllers; // Fixed: Changed from App\Controllers to App\Http\Controllers

use App\Models\PreTest;
use Illuminate\Http\Request;

class PreTestController extends Controller
{
    public function create()
    {
        $questions = [
            'q1' => __('q1'),
            'q2' => __('q2'),
            'q3' => __('q3'),
            'q4' => __('q4'),
            'q5' => __('q5'),
            'q6' => __('q6'),
            'q7' => __('q7'),
            'q8' => __('q8'),
            'q9' => __('q9'),
            'q10' => __('q10'),
            'q11' => __('q11'),
            'q12' => __('q12'),
            'q13' => __('q13'),
            'q14' => __('q14'),
            'q15' => __('q15'),
            'q16' => __('q16'),
            'q17' => __('q17'),
            'q18' => __('q18'),
            'q19' => __('q19'),
            'q20' => __('q20'),
            'q21' => __('q21'),
            'q22' => __('q22'),
            'q23' => __('q23'),
            'q24' => __('q24'),
            'q25' => __('q25'),
            'q26' => __('q26'),
            'q27' => __('q27'),
            'q28' => __('q28'),
            'q29' => __('q29'),
            'q30' => __('q30'),
            'q31' => __('q31'),
            'q32' => __('q32'),
            'q33' => __('q33'),
            'q34' => __('q34'),
            'q35' => __('q35'),
            'q36' => __('q36'),
            'q37' => __('q37'),
        ];

        return view('pre-test', compact('questions'));
    }


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
            'q8' => 'required|integer|between:1,7',
            'q9' => 'required|integer|between:1,7',
            'q10' => 'required|integer|between:1,7',
            'q11' => 'required|integer|between:1,7',
            'q12' => 'required|integer|between:1,7',
            'q13' => 'required|integer|between:1,7',
            'q14' => 'required|integer|between:1,7',
            'q15' => 'required|integer|between:1,7',
            'q16' => 'required|integer|between:1,7',
            'q17' => 'required|integer|between:1,7',
            'q18' => 'required|integer|between:1,7',
            'q19' => 'required|integer|between:1,7',
            'q20' => 'required|integer|between:1,7',
            'q21' => 'required|integer|between:1,7',
            'q22' => 'required|integer|between:1,7',
            'q23' => 'required|integer|between:1,7',
            'q24' => 'required|integer|between:1,7',
            'q25' => 'required|integer|between:1,7',
            'q26' => 'required|integer|between:1,7',
            'q27' => 'required|integer|between:1,7',
            'q28' => 'required|integer|between:1,7',
            'q29' => 'required|integer|between:1,7',
            'q30' => 'required|integer|between:1,7',
            'q31' => 'required|integer|between:1,7',
            'q32' => 'required|integer|between:1,7',
            'q33' => 'required|integer|between:1,7',
            'q34' => 'required|integer|between:1,7',
            'q35' => 'required|integer|between:1,7',
            'q36' => 'required|integer|between:1,7',
            'q37' => 'required|integer|between:1,7',
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

        // Add the questions array that was missing
        $questions = [
            'q1' => __('q1'),
            'q2' => __('q2'),
            'q3' => __('q3'),
            'q4' => __('q4'),
            'q5' => __('q5'),
            'q6' => __('q6'),
            'q7' => __('q7'),
            'q8' => __('q8'),
            'q9' => __('q9'),
            'q10' => __('q10'),
            'q11' => __('q11'),
            'q12' => __('q12'),
            'q13' => __('q13'),
            'q14' => __('q14'),
            'q15' => __('q15'),
            'q16' => __('q16'),
            'q17' => __('q17'),
            'q18' => __('q18'),
            'q19' => __('q19'),
            'q20' => __('q20'),
            'q21' => __('q21'),
            'q22' => __('q22'),
            'q23' => __('q23'),
            'q24' => __('q24'),
            'q25' => __('q25'),
            'q26' => __('q26'),
            'q27' => __('q27'),
            'q28' => __('q28'),
            'q29' => __('q29'),
            'q30' => __('q30'),
            'q31' => __('q31'),
            'q32' => __('q32'),
            'q33' => __('q33'),
            'q34' => __('q34'),
            'q35' => __('q35'),
            'q36' => __('q36'),
            'q37' => __('q37'),
        ];

        return view('pre-test', compact('questions'));
    }
}
