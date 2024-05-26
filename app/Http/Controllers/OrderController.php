<?php

namespace App\Http\Controllers;

use App\Models\BalanceHistory;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = $_COOKIE;
        $cartData = [];
        $totalPrice = 0;

        if ((isset($data['cart']))) {
            $cartData = json_decode($data['cart']);
            $productIds = array_column($cartData, 'id');
            $products = Product::whereIn('id', $productIds)->get();
            $products = $products->toArray();

            foreach ($cartData as $cart) {
                foreach ($products as $array) {
                    if ($array['id'] == $cart->id) {
                        $cart->title = $array['title'];
                        $cart->price = $array['price'];
                        $cart->image_url = $array['image_url'];
                        $totalPrice += $cart->price * $cart->qty;
                        break;
                    }
                }
            }
        }

        $user = Auth::user();

        return view('order', ['carts' => $cartData, 'totalPrice' => $totalPrice, 'balance' => $user->balance]);
    }

    public function store(Request $request)
    {
        $data = $_COOKIE;
        $user = Auth::user();


        if ((int) $user->balance < (int) $request->total_price) {
            return redirect()->route('home')->with('error', 'error not enough balance');
        }

        if ((isset($data['cart']))) {
            $cartData = json_decode($data['cart']);


            $order = new Order();
            $order->user_id = $user->id;
            $order->total_price = $request->total_price;
            $order->save();

            foreach ($cartData as $product) {
                $productModel = Product::find($product->id);
                $order->products()->attach($productModel->id, [
                    'quantity' => $product->qty,
                    'price' => $productModel->price,
                ]);
            }

            $user->balance -= $order->total_price;

            $topUpHistory = new BalanceHistory();
            $topUpHistory->user_id = $user->id;
            $topUpHistory->amount = $order->total_price;
            $topUpHistory->type = 'expenditure';
            $topUpHistory->save();
            
            $user->save();
            return redirect()->route('home')->with('success', 'Order created successfully.');
        }
    }
}
