<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Game;
use App\Models\Category;
use App\Models\Platform;
use App\Models\Collection;


class GameGallery extends Component
{
    use WithPagination;

    public $class;
    public $perPage = 40;
    public $search = [];
    public $platform;
    public $category;
    public $collection;

    protected $listeners = ['setMinPriceFilter' => 'setMinPriceFilter', 'setMaxPriceFilter' => 'setMaxPriceFilter'];
    protected $paginationTheme = "bootstrap";

    public function __construct($id = null)
    {
       $this->categories = Category::has("games")->get();
       $this->platforms  = Platform::has("children")->get();
       $this->collections = Collection::all();

       parent::__construct($id);
    }

    public function resetSearch()
    {
        $this->resetPage();
        $this->search = [];
    }

    public function updatedSearch()
    {
        if(isset($this->search["category"]))
        {
            $this->category = Category::find($this->search["category"]);
        }

        if(isset($this->search["platform"]))
        {
            $this->platform = Platform::find($this->search["platform"]);
        }

        if(isset($this->search["collection"]))
        {
            $this->collection = Collection::find($this->search["collection"]);
        }
    }

    public function setMaxPriceFilter($value)
    {
        $this->search["price-max"] = $value;
    }

    public function setMinPriceFilter($value)
    {
        $this->search["price-min"] = $value;
    }

    public function render()
    {
        $category = $this->search["category"] ?? null;
        $platform = $this->search["platform"] ?? null;
        $collection = $this->search["collection"] ?? null;
        $name = $this->search["name"] ?? "";

        // Get all Games
        $data = Game::index();


        // If category has been selected filter the data
        if ($category)
        {
            $data = $data->whereHas("categories", function ($q) use ($category)
            {
                $q->whereIn("categories.id", [$category]);
            });
        }

        // if platform has been selected filter the data
        if ($platform)
        {
            $data = $data->whereHas("platforms", function ($q) use ($platform) {
                $q->whereIn("platforms.id", [$platform]);
            });
        }

        if ($collection)
        {
            $data = $data->whereHas("collections", function ($q) use ($collection)
            {
                $q->whereIn('collections.id', [$collection]);
            });
        }


        if(isset($this->search["price-min"]))
        {
            $data->where('price','>=', $this->search["price-min"]);
        }


        if(isset($this->search["price-max"]))
        {
            $data->where('price','<=', $this->search["price-max"]);
        }


        // Search the data for the name
        if($name)
        {
            $data->where("name", "LIKE", "%{$name}%");
        }


        // Return the view with pagination
        return view("livewire.game-gallery")->with([
            "data" => $data->paginate($this->perPage)
        ]);
    }


}
