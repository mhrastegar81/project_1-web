<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BuyerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $role = auth()->user()->role;
        $products = Product::where('category_id', $id)->get();
        return view('Buyer.products.productsData',['products' => $products,'role'=>$role]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = auth()->user()->role;
        $product = Product::find($id);
        return view('Buyer.products.showproduct', ['product' =>$product,'role'=>$role]);
    }

}
