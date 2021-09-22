<?php

namespace App\Controllers;

use App\Core\App;

class HomeController
{
    /**
     * Show all users.
     */
    public function index()
    {
        return view('index');
    }
}
