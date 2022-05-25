<?php

namespace App\Models\Adminarea\Scrapers;

interface ScraperInterface
{
    // Search the html with the passed classes
    public function getData() : string;

    // Search the html with the passed classes
    public function getTestPage() : void;
}
