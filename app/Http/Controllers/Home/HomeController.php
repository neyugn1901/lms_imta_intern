<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {    

        $template = 'homepage.home.index';
         return view('homepage.layout', compact(
            'template'
         ));
    }
         
}
