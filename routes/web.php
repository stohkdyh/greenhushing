<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\RespondentController;
use App\Http\Controllers\PreTestController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\TimeTrackingController;

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
Route::get('/post-test/{productName}', [PostTestController::class, 'show'])->name('posttest.show');
Route::post('/post-test/{productName}', [PostTestController::class, 'store'])->name('posttest.store');

// Market & End
// Route::get('/market', fn() => view('market'))->name('market');
Route::get('/market', function () {
    $allProducts = [
        'onephone' => [
            'name' => 'Onephone',
            'image' => 'market_one_edited.png',
            'price' => 252,
            'rating' => 4.73,
            'features' => 2,
            'sold' => '2,5',
        ],
        'neuphone' => [
            'name' => 'Neuphone',
            'image' => 'market_neu.png',
            'price' => 252,
            'rating' => 4.73,
            'features' => 2,
            'sold' => '2,5',
        ],
        'xarelphone' => [
            'name' => 'Xarelphone',
            'image' => 'market_xarel.png',
            'price' => 252,
            'rating' => 4.73,
            'features' => 2,
            'sold' => '2,5',
        ],
        'zenophone' => [
            'name' => 'Zenophone',
            'image' => 'market_zeno.png',
            'price' => 252,
            'rating' => 4.73,
            'features' => 2,
            'sold' => '2,5',
        ],
    ];

    // Get products to show from session, or use default if not set
    $productsToShow = session('products_to_show', null);
    
    // If productsToShow is set, filter the products
    if ($productsToShow) {
        $filteredProducts = [];
        foreach ($productsToShow as $productKey) {
            if (isset($allProducts[$productKey])) {
                $filteredProducts[$productKey] = $allProducts[$productKey];
            }
        }
        $products = collect($filteredProducts)->values()->shuffle()->toArray();
    } else {
        // Fallback to showing all products or redirecting if no products are set
        return redirect()->route('product.type.show')
            ->with('error', 'Please select your access code first.');
    }
    
    // Add product_type to view data
    $productType = session('product_type', 'Unknown');
    
    return view('market', compact('products', 'productType'));
})->name('market');

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

Route::post('/final-product', [ProductController::class, 'storeFinalProduct'])->name('final.product.store');
Route::get('/final-product', [ProductController::class, 'getFinalProduct'])->name('final.product.get');

// Reset session
Route::get('/reset', function () {
    session()->forget('respondent_id');
    return redirect()->route('welcome')->with('success', __('Session reset. Please complete your profile.'));
})->name('session.reset');

// Add this route
Route::get('/product/has-rated', [ProductRatingController::class, 'hasRated'])
    ->name('product.has.rated');

Route::get('/product-type', [ProductTypeController::class, 'show'])->name('product.type.show');
Route::post('/product-type', [ProductTypeController::class, 'store'])->name('product.type.store');

// Add this to your routes file
Route::get('/post-test/completed', [PostTestController::class, 'getCompletedPostTests'])->name('posttest.completed');
Route::post('/track-time', [TimeTrackingController::class, 'storeTime'])->name('track.time');

require __DIR__.'/auth.php';
