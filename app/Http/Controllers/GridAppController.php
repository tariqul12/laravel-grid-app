<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GridAppController extends Controller
{
    public function index()
    {
        return view('front-end.home.index');
    }
}
