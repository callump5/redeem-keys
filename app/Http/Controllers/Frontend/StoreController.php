<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    //
    public function home(){
        return view('pages.frontend.home');
    }
}
