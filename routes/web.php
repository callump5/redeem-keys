<?php

use App\Http\Controllers\Adminarea\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Frontend\StoreController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlatformController;

use App\Models\Adminarea\Scraper\CurlSession;
use App\Models\Adminarea\Scraper\Scraper;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Store Views
Route::get('/', [StoreController::class, 'home']);

// Admin Views
Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::group(['middleware' => ['auth']], function () {

        Route::get('/dashboard', [DashboardController::class, 'home'])
            ->name('admin.dashboard');

        Route::resource('games', GameController::class);
        Route::resource('platforms', PlatformController::class);
        Route::resource('collections', CollectionController::class);
        Route::resource('categories', CategoryController::class);
    });

});

// Redirects
Route::redirect('/admin', '/admin/dashboard');



// TODO:: This is for testing and wil be removed
Route::get('/build-and-scrape', function() {
    $scraper = new Scraper();
    $scraper->buildList("https://www.cdkeys.com/pc?p=");
    $scraper->scrapeList();
    return redirect('/admin/games');
});

Route::get('/test', function() {

    // Init Curl Session
    $curlSession = new CurlSession();

    $curlSession->setPageUrl('https://www.cdkeys.com/xbox-live/3-month-xbox-game-pass-ultimate-xbox-one-pc');
//    $curlSession->setPageUrl('https://www.g2a.com/search/api/v3/suggestions');

    // Init Scraper and pass CurlSession as Dependency
    $scraper = new Scraper($curlSession);

    // Set the driver to read the data
    $scraper->setDriver('g2a');

    // Get the driver
    $driver = $scraper->getDriver();

    // Pass the scraped page to the driver
    $driver->setPageData($curlSession->getPage());

    // Return
    dd('123');

});
