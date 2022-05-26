<?php

namespace App\Interfaces\Adminarea\Scraper\Connections;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Interfaces\Adminarea\Scraper\ScraperInterface;
use DOMDocument;
use DomXPath;

class CDKeys implements ScraperInterface
{
    private $_pageData;
    private $_dom;
    private $_finder;

    // Set Page Data
    public function setPageData($data): void
    {
        $this->_pageData = $data;
    }

    // Get the page data
    public function getPageData(): string
    {
        return $this->_pageData;
    }

    // Clean the page data
    public function cleanPageData($page): void
    {
        $this->_dom = new domDocument;
        libxml_use_internal_errors(true);
        $this->_dom->loadHTML($page, LIBXML_NOWARNING );
        $this->_finder = new DomXPath($this->_dom);
    }


    // -- Self explanatory functions --------------------------/

    public function getPriceFromPage(): float
    {
        $dirtyPrice = $this->_finder->query("//div[@class='product-info-main']//span[@data-price-type='finalPrice']//span[@class='price']/text()")[0];
        return floatval(str_replace("£", '', $dirtyPrice->data));
    }

    public function getNameFromPage(): string
    {
        $dirtyName = $this->_finder->query("//div[@class='product-info-main']//h1//span/text()")[0];
        return $dirtyName->data;
    }


    public function getDescriptionFromPage() : string
    {
        return '';
    }

    public function getUrlFromPage() : string
    {
        return '';
    }

    public function getCategoriesFromPage(): array
    {
        return [];
    }

    public function getPlatformFromPage(): string
    {
        return '';
    }

    public function getPlatformRequirementFromPage() : string
    {
        return '';
    }

    public function getImageFromPage() : string
    {
        return '';
    }
}
