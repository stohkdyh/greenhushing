<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRespondentSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access to welcome page, respondent store route, and language switch WITHOUT session check
        if ($request->routeIs('welcome') || 
            $request->routeIs('respondents.store') || 
            $request->routeIs('lang.switch')) {
            return $next($request);
        }

        // Check if respondent_id exists in session for ALL other routes (including pre-test and post-test)
        if (!session('respondent_id')) {
            return redirect()->route('welcome')->with('error', __('Please complete your profile first.'));
        }

        return $next($request);
    }
}
