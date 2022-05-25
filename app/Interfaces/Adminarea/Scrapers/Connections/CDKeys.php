<?php

namespace App\Models\Adminarea\Scrapers\Connections;

use App\Models\Adminarea\Scrapers\Platform;
use App\Models\Adminarea\Scrapers\Scraper;
use App\Models\Adminarea\Scrapers\Storage;
use App\Models\Adminarea\Scrapers\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CDKeys extends Scraper
{
    use HasFactory;

    public function getData($key, $classes)
    {
        $this->productData[$key] = $this->crawler->filter($classes)->each(function ($node) use($key) {
            if($key == "description"){
                return $node->html();
            }
            return $node->text();
        });
    }

    // Get an image
    public function getImage($key, $classes)
    {
        $this->productData[$key] = $this->crawler->filter($classes)->each(function ($node) {
            return $node->attr('src');
        });
    }

    // Get a Link
    public function getLinks($key, $classes)
    {
        return $this->crawler->filter($classes)->each(function ($node) {
            return $node->attr('href');
        });
    }

    // Download an image and add to product data
    public function downloadImage($url, $name)
    {
        $image = file_get_contents($url, false, $this->userAgent);
        $ext = explode(".", $url)[3];
        $imagePath = "catalog/product-imgs/" . Str::slug($name[0], "-") . "." . $ext;
        if(Storage::put('public/'. $imagePath, $image)){
            $this->productData['thumbnail_name'] = $imagePath;
        };
    }

    // Get the price
    public function getPrice(){
        return floatval(explode("£", $this->productData['price'][1])[1]) ?? 0.00;
    }

    public function getParentPlatform(){
        $platforms = [
            'pc' => 'PC',
            'xbox' => 'Xbox',
            'xbox-live' => 'Xbox',
            'playstation' => 'Playstation',
            'nintendo' => 'Nintendo'
        ];

        foreach ($platforms as $key => $item) {

            $category = explode("/", $this->page)[3];


            if(isset($category) && strpos($category, $key) !== false){

                $platform = Platform::firstOrCreate(
                    ['name' => trim($item)]
                );
                return $platform->id;
            };
        }
    }
}
