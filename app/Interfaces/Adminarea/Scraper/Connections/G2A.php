<?php

namespace App\Interfaces\Adminarea\Scraper\Connections;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Interfaces\Adminarea\Scraper\ScraperInterface;

class G2A implements ScraperInterface
{

    public function setPageData($data): void
    {
        $this->pageData = $data;
    }

    public function getPageData() : string
    {
        return $this->pageData;
    }

    public function test(){
        return 'test';
    }

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
