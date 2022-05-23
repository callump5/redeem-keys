<?php

namespace App\Models\Adminarea\Scrapers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Adminarea\Scrapers\Scraper;

class G2A extends Scraper
{
    use HasFactory;

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
