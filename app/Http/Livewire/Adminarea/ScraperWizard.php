<?php

namespace App\Http\Livewire\Adminarea;

use Livewire\Component;

class ScraperWizard extends Component
{
    
    public string $pageTitle;
    public int $activeTab;

    public float $tabWidth;

    public array $formData;
    public array $tabs = [
        1 => 'Product',
        2 => 'Confirmation',
        3 => 'Save' 
    ];



    protected $listeners = [
        'nextTab' => 'nextTabFunc',
        'prevTab' => 'prevTabFunc'
    ];

    public function nextTabFunc()
    {
        $this->activeTab = ($this->activeTab < count($this->tabs)) ? $this->activeTab + 1 : $this->activeTab; 
    }

    public function prevTabFunc()
    {
        $this->activeTab = prev($this->tabs);
    }


    public function mount()
    {

        $this->activeTab = 1;
        $this->tabWidth = number_format(100 / count($this->tabs), 2);

        $this->formData = [
            'url' => ''
        ];
    }

    public function render()
    {
        return view('livewire.adminarea.scraper-wizard');
    }
}
