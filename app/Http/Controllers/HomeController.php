<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //return (new Config())->loadModelConfiguration(get_class(new User()));
        return "There There";
    }
}
