<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Game;

class GameGallery extends Component
{
    public $class;
    public $perPage = 10;

    public function render()
    {
        $data = Game::index();

        
        return view("livewire.game-gallery")->with([
            'data' => $data->paginate($this->perPage)
        ]);
    }

    
}
