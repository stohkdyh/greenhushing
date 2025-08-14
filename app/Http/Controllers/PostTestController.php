<?php

namespace App\Http\Controllers;

use App\Models\PostTest;
use Illuminate\Http\Request;

class PostTestController extends Controller
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

        return view('post-test');
    }
}
