<?php

namespace App\Http\Controllers;

use App\Models\PostTest;
use Illuminate\Http\Request;

class PostTestController extends Controller
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
        ];

        return view('post-test', compact('questions'));
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
        ]);

        // Get respondent ID from session
        $respondentId = session('respondent_id');

        if (!$respondentId) {
            return redirect()->route('welcome')->with('error', __('Please complete your profile first.'));
        }

        // Check if user already completed post-test
        $existingPostTest = PostTest::where('respondent_id', $respondentId)->first();
        
        if ($existingPostTest) {
            return redirect()->route('market')->with('info', __('You have already completed the post-test.'));
        }

        // Add respondent_id to validated data
        $validated['respondent_id'] = $respondentId;

        // Create post-test record
        PostTest::create($validated);

        // Store completion in session
        session(['posttest_completed' => true]);

        // Redirect to thank you page instead of market
        return redirect()->route('end')->with('success', __('Post-test completed successfully! Thank you for your participation.'));
    }

    public function show()
    {
        // Check if user has completed pre-test first
        $respondentId = session('respondent_id');
        
        if (!$respondentId) {
            return redirect()->route('welcome')->with('error', __('Please complete your profile first.'));
        }

        // Check if user has completed pre-test (optional requirement)
        if (!session('pretest_completed')) {
            return redirect()->route('pretest.show')->with('error', __('Please complete the pre-test first.'));
        }

        // Check if user already completed post-test
        $existingPostTest = PostTest::where('respondent_id', $respondentId)->first();
        
        if ($existingPostTest) {
            return redirect()->route('market')->with('info', __('You have already completed the post-test.'));
        }

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
        ];

        return view('post-test', compact('questions'));
    }
}
