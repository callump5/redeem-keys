<?php

namespace App\Models\Adminarea\Scrapers\Connections;

use App\Models\Adminarea\Scrapers\Scraper;
use App\Models\Adminarea\Scrapers\ScraperInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function dd;

class G2A implements ScraperInterface
{

    public function getData() : string
    {
        return '';
    }

    public function getTestPage(): void
    {
        $this->setPage("https://www.cdkeys.com/pc/vampire-the-masquerade-swansong-pc-epic");
        $this->getPage();
        dd($this->pageContents->getBody()->getContents());
    }
}
