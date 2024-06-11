<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DashboardHomeController extends Controller
{
    public function index()
    {
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $newUsersCount = User::whereBetween('created_at', [$sevenDaysAgo, Carbon::now()])
            ->count();
        $allUserCount = User::count();

        $newOrderCount = Order::whereBetween('created_at', [$sevenDaysAgo, Carbon::now()])
            ->count();
        $allOrderCount = Order::count();

        $newSaleCount = Order::whereBetween('created_at', [$sevenDaysAgo, Carbon::now()])
            ->sum('total_price');
        $allSaleCount = Order::sum('total_price');

        $orders = Order::with('products')->orderBy('created_at', 'desc')->limit(5)->get();

        $products = Product::orderBy('created_at', 'desc')->with('category')->limit(5)->get();

        return view('dashboard', [
            'newUserCount' => $newUsersCount,
            'allUserCount' => $allUserCount,
            'newOrderCount' => $newOrderCount,
            'allOrderCount' => $allOrderCount,
            'newSaleCount' => $newSaleCount,
            'allSaleCount' => $allSaleCount,
            'orders' => $orders,
            'products' => $products
        ]);
    }

    public function indexOrder(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $orders = Order::with('products')->orderBy('created_at', 'desc')->paginate($perPage);

        return view('dashboard.orders', ['orders' => $orders]);
    }

    public function indexProduct(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $products = Product::orderBy('id', 'desc')->with('category')->paginate($perPage);

        return view('dashboard.products', ['products' => $products]);
    }

    public function indexStoreProduct(Request $request)
    {   
        $categories = Category::all();
        return view('dashboard.products.add', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        $cloudinaryImage = $request->file('image')->storeOnCloudinary('products');
        $url = $cloudinaryImage->getSecurePath();
        Product::create([
            'title' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_url' => $url,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('dashboard.product')->with('success', 'Product uploaded successfully');
    }

    public function indexUpdateProduct($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('dashboard.products.add', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('products');
            $url = $cloudinaryImage->getSecurePath();
            $product->image_url = $url;
        }

        $product->title = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('dashboard.product')->with('success', 'Product updated successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }

    public function deleteOrder($id)
    {   
        $order = Order::findOrFail($id);
        $order->delete();
        return back()->with('success', 'Order deleted successfully');
    }
}
