<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        // Validate locale
        if (!in_array($locale, ['en', 'id'])) {
            abort(404);
        }

        // Store locale in session
        Session::put('locale', $locale);
        
        // Set locale for current request
        App::setLocale($locale);

        return Redirect::back();
    }
}
