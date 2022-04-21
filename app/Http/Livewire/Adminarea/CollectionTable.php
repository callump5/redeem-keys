<?php

namespace App\Http\Livewire\Adminarea;

use Livewire\Component;

class CollectionTable extends Component
{
    protected $paginationTheme = "bootstrap";

    public $model;

    public $perPage = 10;

    public function mount($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $data = $this->model::index();

        return view('livewire.adminarea.collection-table')->with([
            'data' => $data->paginate($this->perPage)
        ]);
    }
}
