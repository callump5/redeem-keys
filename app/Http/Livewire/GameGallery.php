<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Game;
use App\Models\Category;
use App\Models\Platform;


class GameGallery extends Component
{
    public $class;
    public $perPage = 10;
    public $search = [];
 

    protected $paginationTheme = 'bootstrap';

    public function __construct($id = null)
    {
       $this->categories = Category::has("games")->get();
       $this->platforms  = Platform::has("games")->get();
       
       parent::__construct($id);
    }


    public function render()
    {
        $category = $this->search["category"] ??  null;
        $platform = $this->search["platform"] ?? null;
        $name     = $this->search["name"] ?? "";


        // Get all Games
        $data = Game::index();
       
        // If category has been selected filter the data
        if($category){
            $data = $data->whereHas('categories', function ($q) use ($category)
            {
                $q->whereIn('categories.id', [$category]);
            });
        }

        // if platform has been selected filter the data
        if($platform){
            $data = $data->whereHas('platforms', function ($q) use ($platform)
            {
                $q->whereIn('platforms.id', [$platform]);
            });
        }

        // Search the data for the name 
        if($name){
            $data->where("name", 'LIKE', "%{$name}%");
        }

        // Return the view with pagination
        return view("livewire.game-gallery")->with([
            'data' => $data->paginate($this->perPage)
        ]);
    }

    
}
