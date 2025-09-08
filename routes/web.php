<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\RespondentController;
use App\Http\Controllers\PreTestController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\ProductRatingController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/respondents', [RespondentController::class, 'store'])
    ->name('respondents.store');

Route::post('/respondents', [RespondentController::class, 'store'])->name('respondents.store');

// Pre-test Routes
Route::get('/pretest', [PreTestController::class, 'show'])->name('pretest.show');
Route::get('/pretest/create', [PreTestController::class, 'create'])->name('pretest.create');
Route::post('/pretest', [PreTestController::class, 'store'])->name('pretest.store');

// Post-test Routes
Route::get('/post-test', [PostTestController::class, 'show'])->name('posttest.show');
Route::post('/post-test', [PostTestController::class, 'store'])->name('posttest.store');

// Market & End
Route::get('/market', fn() => view('market'))->name('market');
Route::get('/end', fn() => view('end'))->name('end');

// Static company pages
Route::view('/onephone', 'companies.onephone');
Route::view('/onephone-news', 'onephone.news');

Route::view('/zenophone', 'companies.zenophone');
Route::view('/zenophone-news', 'zenophone.news');

Route::view('/xarelphone', 'companies.xarelphone');
Route::view('/xarelphone-news', 'xarelphone.news');

Route::view('/neuphone', 'companies.neuphone');
Route::view('/neuphone-news', 'neuphone.news');

// Language switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
        Session::flash('locale_changed', "Language changed to " . ($locale === 'en' ? 'English' : 'Indonesian'));
    }
    return Redirect::back();
})->name('lang.switch');

// Product Rating Routes
Route::prefix('product')->name('product.')->group(function () {
    Route::post('/rating', [ProductRatingController::class, 'store'])->name('rating.store');
    Route::get('/rating', [ProductRatingController::class, 'getRating'])->name('rating.get');
    Route::get('/ratings', [ProductRatingController::class, 'getRatedProducts'])->name('ratings.get');
});
Route::get('/product-ratings', [ProductRatingController::class, 'getRatedProducts'])->name('product.ratings.get');

// Reset session
Route::get('/reset', function () {
    session()->forget('respondent_id');
    return redirect()->route('welcome')->with('success', __('Session reset. Please complete your profile.'));
})->name('session.reset');

require __DIR__.'/auth.php';
