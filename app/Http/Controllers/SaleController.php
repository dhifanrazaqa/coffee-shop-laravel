<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date')) : Carbon::now()->startOfMonth();
        $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date')) : Carbon::now()->endOfMonth();
        $sortBy = $request->input('sort_by') ? $request->input('sort_by') : 'total_quantity';
        $sortOrder = $request->input('sort_order') ? $request->input('sort_order') : 'desc';
        $search = $request->input('search');

        $products = Product::leftJoin('order_product', function ($join) use ($startDate, $endDate) {
            $join->on('products.id', '=', 'order_product.product_id')
                ->whereBetween('order_product.created_at', [$startDate, $endDate]);
        })
            ->select('products.*', DB::raw('SUM(order_product.quantity) as total_quantity'), DB::raw('SUM(order_product.price * order_product.quantity) as total_revenue'))
            ->when($search, function ($query, $search) {
                return $query->where('products.title', 'like', '%' . $search . '%');
            })
            ->groupBy('products.id')
            ->orderBy($sortBy, $sortOrder)
            ->paginate(20);

        return view('dashboard.sale', compact('products', 'startDate', 'endDate', 'sortBy', 'sortOrder', 'search'));
    }

    public function exportPdf(Request $request)
    {
        $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date')) : Carbon::now()->startOfMonth();
        $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date')) : Carbon::now()->endOfMonth();
        $sortBy = $request->input('sort_by') ? $request->input('sort_by') : 'total_quantity';
        $sortOrder = $request->input('sort_order') ? $request->input('sort_order') : 'desc';
        $search = $request->input('search');

        $products = Product::leftJoin('order_product', function ($join) use ($startDate, $endDate) {
            $join->on('products.id', '=', 'order_product.product_id')
                ->whereBetween('order_product.created_at', [$startDate, $endDate]);
        })
            ->select('products.*', DB::raw('SUM(order_product.quantity) as total_quantity'), DB::raw('SUM(order_product.price * order_product.quantity) as total_revenue'))
            ->when($search, function ($query, $search) {
                return $query->where('products.title', 'like', '%' . $search . '%');
            })
            ->groupBy('products.id')
            ->orderBy($sortBy, $sortOrder)
            ->get();

        $totalQuantity = $products->sum('total_quantity');
        $totalRevenue = $products->sum('total_revenue');

        $pdf = Pdf::loadView('dashboard.pdf', compact('products', 'startDate', 'endDate', 'sortBy', 'sortOrder', 'search', 'totalQuantity', 'totalRevenue'));

        return $pdf->download('dashboard.pdf');
    }
}
