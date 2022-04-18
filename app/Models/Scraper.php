<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Goutte\Client;
use Storage;
use Illuminate\Support\Str;
use App\Models\Game;

class Scraper extends Model
{
    use HasFactory;

    public $page = "";
    public $crawler = "";
    public $links = [];
    public $productData = [];

    public function __construct()
    {
        $this->client = new Client();
        $this->userAgent = stream_context_create(
            [
                "http" => [
                    "method" => "GET",
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko)  Chrome/50.0.2661.102 Safari/537.36\r\n" . "accept: text/html,application/xhtml+xml,application/xml;q=0.9, image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\r\n" . "accept-language: es-ES,es;q=0.9,en;q=0.8,it;q=0.7\r\n" .  "accept-encoding: gzip, deflate, br\r\n"
               ]
            ]
        );
    }

    // Set the page to be scraped
    public function setPage($page)
    {
        $this->page = $page;
    }

    // Retrieve the page
    public function getPage()
    {
        $this->crawler = $this->client->request('GET', $this->page);
    }

    // Search the html with the passed classes
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

    // Create the product
    public function createProduct($page)
    {
        $product = new Game();

        $price = $this->getPrice();

        $this->downloadImage($this->productData['thumbnail'][0], $this->productData["name"]);

        $platformArray = [];
        $cateArray = [];

        if(isset($this->productData['genres'][0])){
            $categories = explode(",", $this->productData['genres'][0]);
            foreach($categories as $item){
                $cateArray[] = Category::firstOrCreate(
                    ['name' => trim($item)]
                );
            }
        }

        if(isset($this->productData['platform'][0])) {

            $platforms = explode(",", $this->productData['platform'][0]);

            foreach($platforms as $item){
                 $platform = Platform::firstOrNew(
                    [
                        'name' =>  trim($item),
                        'parent_id' => $this->getParentPlatform()
                    ]
                 );



                 if(!$platform->parent_id){
                     $platform->parent_id = $this->getParentPlatform();
                     $platform->save();
                 }

                $platformArray[] = $platform;
                $platformArray[] = Platform::find($this->getParentPlatform());
            }
        }

        $product->name = $this->productData["name"][0];
        $product->price = $price;
        $product->description = $this->productData["description"][0];
        $product->img_path = $this->productData["thumbnail_name"];
        $product->cdkeys_link = $page;
        $product->save();

        $product->categories()->saveMany($cateArray);
        $product->platforms()->saveMany($platformArray);

    }

    public function buildList($url)
    {

        for ($i=1; $i < 2; $i++) {
            $url = $url . $i;
            $this->setPage($url);
            $this->getPage();
            $this->links[$i] = $this->getLinks("links", ".product-item-photo");
        }

//        dd($this->links);
    }

    public function scrapeProduct($page)
    {
        $this->setPage($page);
        $this->getPage();
        $this->getProductData();
        if(count(Game::where('cdkeys_link', $page)->get()) === 0){
            $this->createProduct($page);
        }
    }

    public function scrapeList()
    {
        foreach($this->links as $pages){
            foreach($pages as $page){
                $this->scrapeProduct($page);
            }
        }
    }

    public function getProductData()
    {
        $this->getData("name", "h1.page-title");
        $this->getData("price", ".product-info-addto .price-final_price");
        $this->getData("platform", ".product.attribute.platforms .value");
        $this->getData("region", ".product-attributes.primary .product.attribute.region .value");
        $this->getData("genres", ".product-attributes.secondary .product.attribute.genres .value");
        $this->getData("description", "#description");
        $this->getImage("thumbnail", ".product-content-top  img.gallery-placeholder__image");
    }
}
