<?php

namespace App\Interfaces\Adminarea\Scraper;

interface ScraperInterface
{

    // Set the page data
    public function setPageData($data) : void;

    // Get the page data
    public function getPageData() : string;

    // Search the html with the passed classes
    public function getData() : string;

    // Search the html with the passed classes
    public function getTestPage() : void;
}
