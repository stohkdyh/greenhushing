<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Http\Request;

class RespondentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:Male,Female',
            'country' => 'required|in:IDN,JPN',
            'last_education' => 'required|in:senior_high,diploma,bachelor,master,doctoral',
        ]);

        // Simpan ke database
        Respondent::create($validated);

        // Redirect ke halaman /market
        return redirect()->route('market')
                         ->with('success', 'Data berhasil disimpan!');
    }
}

