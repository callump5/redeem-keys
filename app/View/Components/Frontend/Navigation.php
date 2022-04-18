<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;

class Navigation extends Component
{
    public $logo;
    public $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->logo = "logo-transparent-2.png";
        $this->menu =  [
            [
                "name" => "pc",
                "icon" => "PC-ICON.png"
            ],
            [
                "name" => "xbox",
                "icon" => "XBOX-ICON.png"
            ],
            [
                "name" => "playstation",
                "icon" => "PS-ICON-2.png"
            ],
            [
                "name" => "nintendo",
                "icon" => "NINTENDO-ICON.png"
            ]
        ];;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.navigation');
    }
}

