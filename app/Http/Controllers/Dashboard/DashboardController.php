<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {    

        $template = 'admin.home.index';
         return view('admin.layout', compact(
            'template'
         ));
    }
}
