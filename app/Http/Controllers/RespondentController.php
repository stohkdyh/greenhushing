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
            'work_experience' => 'required|in:none,<6_months,6-12_months,1-2_years,>2_years',
            'last_education' => 'required|in:senior_high,diploma,bachelor,master,doctoral',
        ]);

        $respondent = Respondent::create($validated);

        // Simpan ID ke session
        session(['respondent_id' => $respondent->id]);

        return redirect()->route('pretest.create');
    }
}
