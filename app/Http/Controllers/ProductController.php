<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')->get();
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
        $user = DB::table('products')->insert([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'inventory' => $request->inventory,
            'sold_number' => $request->sold_number,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
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
        $product = DB::table('products')->where('id',$id)->first();

        return view('first_project.products.editProductMenue',['product'=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = DB::table('products')->where('id', $id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'inventory' => $request->inventory,
            'sold_number' => $request->sold_number,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = DB::table('products')->where('id', $id)->update(['status' => 'disable']);
        return redirect('/products');
    }
}
