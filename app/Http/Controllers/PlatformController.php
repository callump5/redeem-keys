<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatformController extends Controller
{

    public function index()
    {

        $args = [
            'pageTitle' => 'All Games',
            'model' => 'App\Models\Platform'
        ];

        return view('pages.adminarea.crud.list', $args);
    }

}
