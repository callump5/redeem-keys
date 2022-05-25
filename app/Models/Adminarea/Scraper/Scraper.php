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
    public $driver;

    private $drivers = [
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

    public function setDriver($text) {
        $this->driver = $text;
    }

    public function getDriver() {
        return new $this->drivers[$this->driver]();
    }

    public function scrape() {
        $this->getDriver()->scrape($this->curlSession);
    }



}
