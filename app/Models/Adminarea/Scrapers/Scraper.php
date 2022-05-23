<?php

namespace App\Models\Adminarea\Scrapers;
use App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Storage;
use Illuminate\Support\Str;

abstract class Scraper extends Model
{
    use HasFactory;

    public $page = "";
    public $pageContents = "";
    public $links = [];
    public $productData = [];

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0",
                "Accept"     => "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
                "Accept-language" => "en-GB,en;q=0.5",
                "Accept-Encoding" => "gzip, deflate, br"
            ],
            'cookies' => true
        ]);
    }

    // Set the page to be scraped
    public function setPage($page)
    {
        $this->page = $page;
    }

    // Retrieve the page
    public function getPage()
    {
        $this->pageContents = $this->client->get($this->page);
    }

    // Search the html with the passed classes
    abstract public function getData() : string;

    // Search the html with the passed classes
    abstract public function getTestPage() : void;
}
