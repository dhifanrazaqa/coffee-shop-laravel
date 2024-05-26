<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = $user->orders()->with('products')->get();
        
        return view('history', ['orders' => $orders]);
    }
}
