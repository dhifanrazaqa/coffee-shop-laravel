<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Product::all();
        return view('welcome', ['posts' => $posts]);
    }
}
