<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
use App\Category;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        return view('about.index');
    }
}

