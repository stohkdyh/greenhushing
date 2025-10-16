<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TimeTrackingController extends Controller
{
    public function storeTime(Request $request)
    {
        try {
            $validated = $request->validate([
                'total_time_seconds' => 'required|integer|min:0'
            ]);

            $respondentId = session('respondent_id');
            if (!$respondentId) {
                Log::warning('No respondent ID found in session');
                return response()->json([
                    'success' => false,
                    'message' => 'No respondent found in session.'
                ], 404);
            }

            $respondent = Respondent::find($respondentId);
            if (!$respondent) {
                Log::warning('Respondent not found in database', ['respondent_id' => $respondentId]);
                return response()->json([
                    'success' => false,
                    'message' => 'Respondent not found in database.'
                ], 404);
            }

            // Tambahkan waktu baru (jika ingin akumulatif)
            $respondent->time_completion = ($respondent->time_completion ?? 0) + $validated['total_time_seconds'];
            $respondent->save();

            Log::info('Time tracked successfully', [
                'respondent_id' => $respondentId,
                'time_seconds' => $validated['total_time_seconds']
            ]);

            return response()->json([
                'success' => true,
                'time_tracked' => $validated['total_time_seconds'],
                'message' => 'Time tracked successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Exception during time tracking', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error tracking time: ' . $e->getMessage()
            ], 500);
        }
    }
}
