<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('first_project.products.productsData', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('first_project.products.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $products = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'inventory' => $request->inventory,
            'sold_number' => $request->sold_number,
            'discription' => $request->discription,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id',$id)->get()->first();

        return view('first_project.products.editProductMenue',['product'=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = Product::where('id', $id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'inventory' => $request->inventory,
            'sold_number' => $request->sold_number,
            'discription' => $request->discription,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = Product::where('id', $id)->delete();
        return redirect('/products');
    }
}
