<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Http\Request;

class RespondentController extends Controller
{

    public function index()
    {
        return view('respondents.index');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:Male,Female',
            'country' => 'required|in:IDN,JPN',
            'GPA' => 'required|numeric|between:0,4.0',
            'work_experience' => 'required|in:none,<1_year,1-2_years,2-3_years,>3_years',
            'last_education' => 'required|in:senior_high,diploma,bachelor,master,doctoral',
            'product_type' => 'in:Greenwashing,Greenhushing',
            'time_completion' => 'integer|min:1',
        ]);

        // Create the respondent
        $respondent = Respondent::create($validated);

        // Store respondent ID in session
        session(['respondent_id' => $respondent->id]);

        // Redirect to your main application (e.g., pre-test)
        return redirect()->route('pretest.create');
    }
}

