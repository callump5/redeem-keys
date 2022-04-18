<?php

use Illuminate\Support\Facades\Route;

use App\Models\Scraper;

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

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/test', function() {
    $scraper = new Scraper();


    $scraper->buildList("https://www.cdkeys.com/pc?p=");
//    $scraper->setPage("https://www.cdkeys.com/pc/elden-ring-pc-steam");
//    $scraper->getPage();
//    $scraper->getParentPlatform();
    $scraper->scrapeList();

    // $pages = [
    //     "https://www.cdkeys.com/pc/no-mans-sky-pc-steam-cd-key",
    //     "https://www.cdkeys.com/pc/games/the-sims-4-get-to-work-pc-cd-key-origin",
    //     "https://www.cdkeys.com/pc/assassins-creed-valhalla-ultimate-edition-pc-eu",
    //     "https://www.cdkeys.com/pc/football-manager-2022-pc-ww-steam",
    //     "https://www.cdkeys.com/pc/the-elder-scrolls-online-high-isle-collectors-edition-pc"

    // ];

    // foreach($pages as $page){
    //     $scraper->setPage($page);
    //     $scraper->getPage();
    //     $scraper->getProductData();
    // }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
