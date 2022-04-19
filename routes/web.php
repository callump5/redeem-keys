<?php

use App\Models\Scraper;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\StoreController;
use App\Http\Controllers\Adminarea\DashboardController;

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
    });
});

// Redirects
Route::redirect('/admin', '/admin/dashboard');



// TODO:: This is for testing and wil be removed
Route::get('/build-and-scrape', function() {
    $scraper = new Scraper();
    $scraper->buildList("https://www.cdkeys.com/pc?p=");
    $scraper->scrapeList();
});

//Route::resource(‘gfg’, ‘GeeksforGeeksController’);
