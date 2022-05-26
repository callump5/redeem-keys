<?php

namespace App\Models\Adminarea\Scraper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Adminarea\Scraper\CurlSession;
use App\Interfaces\Adminarea\Scraper\ScraperInterface;

class Scraper extends Model
{
    use HasFactory;

    public $curlSession;
    public $interface;

    // Array of available interface
    private $interfaces = [
        "g2a" => \App\Interfaces\Adminarea\Scraper\Connections\G2A::class,
        "cdkeys" => \App\Interfaces\Adminarea\Scraper\Connections\CDKeys::class
    ];

    public function __construct
    (
        CurlSession $curlSession
    )
    {
        $this->curlSession = $curlSession;
    }

    // Set the interface to be used
    public function setInterface($text)
    {
        $this->interface = $text;
    }

    // Return the interface
    public function getInterface()
    {
        return new $this->interfaces[$this->interface]();
    }

    // Scrape product, the data will then be passed to another function to create/update
    public function scrapeProduct($link)
    {
        // Set the page URL
        $this->curlSession->setPageUrl($link);

        // Retrieve the page data
        $page = $this->curlSession->getPageData();

        // Init the interface
        $interface = $this->getInterface();

        // Pass the page data over the interface to clean
        $interface->cleanPageData($page);

        // Get the needed values
        $data = [
            'name' => $interface->getNameFromPage(),
            'price' => $link,
            'url' => $interface->getUrlFromPage(),
            'description' => $interface->getDescriptionFromPage(),
            'platform' => $interface->getPlatformFromPage()
        ];

        dd($data);
    }

}
