<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(6)->get();
        return view('welcome', ['products' => $products]);
    }
}
