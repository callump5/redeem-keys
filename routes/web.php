<?php

use App\Models\Scraper;
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

Auth::routes();

// TODO:: Add this to a controller
Route::get('/', function () {
    return view('pages/frontend/home');
});

// TODO:: This is for testing and wil be removed
Route::get('/build-and-scrape', function() {
    $scraper = new Scraper();
    $scraper->buildList("https://www.cdkeys.com/pc?p=");
    $scraper->scrapeList();
});


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Adminarea\DashboardController::class, 'index'])
        ->name('admin.dashboard');
});

//Route::resource(‘gfg’, ‘GeeksforGeeksController’);

