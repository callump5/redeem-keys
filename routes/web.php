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


use App\Http\Controllers\Adminarea\ScraperController;

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

        Route::get('/scraper/{driver}', [ScraperController::class, 'index']);
        
        Route::get('/scraper/{driver}/wizard/product', [ScraperController::class, 'productWizard']);
        Route::get('/scraper/{driver}/wizard/category', [ScraperController::class, 'categoryWizard']);
        
        
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

    // Init Scraper and pass CurlSession as Dependency
    $scraper = new Scraper($curlSession);

    // Set the interface for the scraper
    $scraper->setInterface('cdkeys');
//    $scraper->setInterface('g2a');

    // Scrape Product
    $scraper->scrapeProduct('https://www.cdkeys.com/pc/sniper-elite-5-pc-ww-steam');
//    $scraper->scrapeProduct('https://www.g2a.com/search/api/v3/suggestions?include[]=categories&itemsPerPage=4&phrase=Sniper Elite 5&currency=GBP');


});
