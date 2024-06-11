<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Product;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 9);
        $products = Product::paginate($perPage);
        $categories = Category::all();
        return view('menu', ['products' => $products, 'categories' => $categories]);
    }

    public function indexByCategory(Request $request, $categoryName)
    {   
        $perPage = $request->input('per_page', 10);
        $products = Product::whereHas('category', function ($query) use ($categoryName) {
            $query->where('title', $categoryName);
        })->paginate($perPage);
        $categories = Category::all();
        return view('menu', ['products' => $products, 'categories' => $categories]);
    }
}
