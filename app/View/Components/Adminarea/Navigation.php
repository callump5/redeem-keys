<?php

namespace App\View\Components\Adminarea;

use Illuminate\View\Component;

class Navigation extends Component
{

    public $logo;
    public $logged_in_menu;
    public $guest_menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->logo = "logo-transparent-2.png";
        $this->logged_in_menu = [
            'models' => [
                'title' => 'Models',
                'type'  => 'group',
                'items' => [
                    'games' => [
                        'title' => 'Games',
                        'id'    => 'games',
                        'type'  => 'menu',
                        'items' => [
                            [
                                'title' => 'List',
                                'type'  => 'item',
                                'url'   => 'games/list',
                                'id'    => ''
                            ],
                            [
                                'title' => 'Create New',
                                'type'  => 'item',
                                'url'   => 'games/list',
                                'id'    => ''
                            ]
                        ]
                    ],
                    'collections' => [
                        'title' => 'Collections',
                        'id'    => 'collection',
                        'type'  => 'menu',
                        'items' => [
                            [
                                'title' => 'List',
                                'type'  => 'item',
                                'url'   => 'games/list',
                                'id'    => ''
                            ],
                            [
                                'title' => 'Create New',
                                'type'  => 'item',
                                'url'   => 'games/list',
                                'id'    => ''
                            ]
                        ]
                    ],
                    'platforms' => [
                        'title' => 'Platforms',
                        'id'    => 'platforms',
                        'type'  => 'menu',
                        'items' => [
                            [
                                'title' => 'List',
                                'type'  => 'item',
                                'url'   => 'games/list',
                                'id'    => ''
                            ],
                            [
                                'title' => 'Create New',
                                'type'  => 'item',
                                'url'   => 'games/list',
                                'id'    => ''
                            ]
                        ]
                    ],
                    'categories' => [
                        'title' => 'Categories',
                        'id'    => 'categories',
                        'type'  => 'menu',
                        'items' => [
                            [
                                'title' => 'List',
                                'type'  => 'item',
                                'url'   => 'games/list',
                                'id'    => ''
                            ],
                            [
                                'title' => 'Create New',
                                'type'  => 'item',
                                'url'   => 'games/list',
                                'id'    => ''
                            ]
                        ]
                    ]
                ]
            ],
            'account' => [
                'title' => 'Account',
                'type'  => 'group',
                'items' => [
                    'logout' => [
                        'title' => 'Logout',
                        'type'  => 'item',
                        'url'   => '/',
                        'id'    => 'logout'
                    ]
                ]
            ]
        ];
        $this->guest_menu = [
            'account' => [
                'title' => 'Account',
                'type'  => 'group',
                'items' => [
                    'logout' => [
                        'title' => 'Login',
                        'type'  => 'item',
                        'url'   => route('login'),
                        'id'    => 'login'
                    ]
                ]
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.adminarea.navigation');
    }
}
