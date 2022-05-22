<?php

namespace App\Http\Livewire\Adminarea;

use App\Models\Platform;
use Livewire\Component;


use App\Models\Scraper;

class EditBlock extends Component
{

    public $game;

    public $platforms;
    public $categories;
    public $collections;

    public $formData;



    protected $rules = [
        'formData.name' => 'required',
        'formData.platforms' => '',
        'formData.collections' => '',
        'formData.categories' => '',
        'formData.description' => '',
        'formData.cdkeys_link' => '',
        'formData.cdkeys_price' => '',
        'formData.g2a_link' => '',
        'formData.g2a_price' => ''
    ];

    protected $listeners = [
            'scrapeCdKeys' => 'scrapeCdKeysFunc',
            'submit'       => 'submit'
        ];

    public function scrapeCdKeysFunc(){
        $scraper = new Scraper();
        $scraper->setPage($this->game->cdkeys_link);
        $scraper->getPage();

        if($scraper->updateProduct()){
            $data = $scraper->updateProduct();
            $this->formData['cdkeys_price'] = $data['price'];
            $this->formData['description'] = $data['description'][0];
            $this->formData['name'] = $data['name'][0];
            session()->flash('message', 'Price updated, make sure to save');

        } else {
            session()->flash('error', 'There was an error scraping CD Keys.');
        }
    }


    public function submit(){

        $validated = $this->validate();

        $platforms = [];

        if(isset($validated['formData']['platforms'])){
            $platforms = Platform::whereIn('id', $validated['formData']['platforms'])->get();
        }

        $this->game->platforms()->sync($platforms);
        $this->game->name = $validated['formData']['name'];
        $this->game->cdkeys_price = $validated['formData']['cdkeys_price'];
        $this->game->cdkeys_link = $validated['formData']['cdkeys_link'];
        $this->game->g2a_price = $validated['formData']['g2a_price'];
        $this->game->g2a_link = $validated['formData']['g2a_link'];
        $this->game->description = $validated['formData']['description'];

        $this->game->save();

//        dd( $validated['formData']['name']);
//        return redirect()->back();

    }
    public function selectItem($item)
    {
        $this->formData['platforms'][] = $item;
    }

    public function mount(){
        $this->formData['name'] = $this->game->name;
        $this->formData['description'] = $this->game->description;
        $this->formData['platforms'] = $this->game->platforms->pluck('id')->toArray();
        $this->formData['collections'] = $this->game->collections->pluck('id')->toArray();;
        $this->formData['categories'] = $this->game->categories->pluck('id')->toArray();;
        $this->formData['cdkeys_price'] = $this->game->cdkeys_price;
        $this->formData['cdkeys_link'] = $this->game->cdkeys_link;
        $this->formData['g2a_price'] = $this->game->g2a_price;
        $this->formData['g2a_link'] = $this->game->g2a_link;

    }

    public function render()
    {
        return view('livewire.adminarea.edit-block');
    }
}
