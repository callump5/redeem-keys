<?php

namespace App\Http\Controllers\Adminarea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScraperController extends Controller
{

    public $pageTitle = "CD Keys Scraping";

    public function setDriver($driver){
        $this->driver = $driver;
    }
    //

    public function index(Request $request, $driver)
    {   
        $this->setDriver($driver);


        $args = [
            'pageTitle' => $this->pageTitle,
        ];

        return view('pages.adminarea.scraper.index', $args);
    }



    public function productWizard(Request $request)
    {
        $args = [
            'pageTitle' => $this->pageTitle
        ];

        return view('pages.adminarea.scraper.wizard', $args);
    }
}
