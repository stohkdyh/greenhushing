<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

use App\Http\Controllers\RespondentController;

Route::post('/respondents', [RespondentController::class, 'store'])
    ->name('respondents.store');

Route::get('/market', function () {
    return view('market');
})->name('market');

Route::get('/pre-test', function () {
    return view('pre-test');
})->name('pre-test');


Route::view('/onephone-news', 'onephone.news');

Route::view('/zenophone', 'companies.zenophone');
Route::view('/zenophone-news', 'zenophone.news');

Route::view('/xarelphone', 'companies.xarelphone');
Route::view('/xarelphone-news', 'xarelphone.news');

Route::view('/neuphone', 'companies.neuphone');
Route::view('/neuphone-news', 'neuphone.news');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
        
        // Optional: Flash message to confirm the change
        Session::flash('locale_changed', "Language changed to " . ($locale === 'en' ? 'English' : 'Indonesian'));
    }
    return Redirect::back();
})->name('lang.switch');

Route::get('/reset-session', function () {
    session()->forget('respondent_id');
    return redirect()->route('welcome')->with('success', __('Session reset. Please complete your profile.'));
})->name('session.reset');

require __DIR__.'/auth.php';
