<?php

namespace App\Http\Controllers\Adminarea;

use App\Http\Controllers\Controller;
use function view;

class DashboardController extends Controller
{

    public function home(){
        return view('pages.adminarea.dashboard');
    }
}
