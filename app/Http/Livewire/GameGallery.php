<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Game;
use App\Models\Category;


class GameGallery extends Component
{
    public $class;
    public $perPage = 10;
    public $search = [];

    public $categories = [];


    public function __construct($id = null){
        parent::__construct($id);
        $this->categories = Category::all();
    }

    public function render()
    {

        if($this->search){
            $data = Game::searchTitle($this->search['name']);
        } else {
            $data = Game::index();
        }

        return view("livewire.game-gallery")->with([
            'data' => $data->paginate($this->perPage)
        ]);
    }

    
}
