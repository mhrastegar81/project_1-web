<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SellerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $orders = Order::where('user_id',$id)->get();
        $products = Product::where('user_id',$id)->get();
        return view('Seller.orders.ordersData', ['orders' => $orders, 'products' => $products]);
    }
}
