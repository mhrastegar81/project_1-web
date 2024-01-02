<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($category_id)
    {
        $id = auth()->user()->id;
        $products = Product::where(['user_id' => $id, 'category_id' => $category_id])->get();
        return view('Seller.products.productsData', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $categories = Category::all();
        return view('Seller.products.addProduct', ['user' => $user, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            dd($request);
        Product::create([
            'user_id' => $request->seller,
            'category_id' => $request->category,
            'title' => $request->title,
            'price' => $request->price,
            'inventory' => $request->inventory,
            'discription' => $request->discription,
            'image_address' => $request->image_address,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/seller/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('Seller.products.showproduct', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->get()->first();
        $category = Category::where('id',$product->category_id)->first();
        return view('Seller.products.editProductMenue', ['product' => $product, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::where('id', $id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'inventory' => $request->inventory,
            'sold_number' => $request->sold_number,
            'description' => $request->discription,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $category_id = Product::find($id)->category_id;
        return redirect("/seller/products/index/{$category_id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id = null)
    {
        if (!empty($id)) {
            $product = Product::where('id', $id)->first();
            $product->delete();
            return redirect("/seller/products/index/$product->category_id");
        }
    }
}
