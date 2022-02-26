<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navigation extends Component
{

    public $logo = "logo-transparent-2.png";
    public $menu = [
        [
            "name" => "xbox", 
            "icon" => "XBOX-ICON.png"
        ],
        [
            "name" => "playstation", 
            "icon" => "PS-ICON-2.png"
        ],
        [
            "name" => "pc", 
            "icon" => "PC-ICON.png"
        ],
        [
            "name" => "nintendo", 
            "icon" => "NINTENDO-ICON.png"
        ]
    ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.navigation");
    }
}
