<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Product;

class MenuController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('menu', ['products' => $products, 'categories' => $categories]);
    }

    public function indexByCategory($categoryName)
    {
        $products = Product::whereHas('category', function ($query) use ($categoryName) {
            $query->where('title', $categoryName);
        })->get();
        $categories = Category::all();
        return view('menu', ['products' => $products, 'categories' => $categories]);
    }
}
