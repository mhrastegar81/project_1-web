<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AdminProductController extends Controller
{
    public function index($id) {
        $products = Product::where('category_id', $id)->get();
        return view('Admin.products.productsData', ['products' => $products, 'category_id'=> $id]);
    }

    public function filter($category_id)
    {
        $products = QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::callback('PriceMin', function(Builder $query, $value){
                    $query->where('price', '>=', (int)$value);
                })->ignore(null),
                AllowedFilter::callback('PriceMax', function($query, $value){
                    $query->where('price', '<=', (int)$value);
                })->ignore(null),

            ])
            ->get();
            return view('Admin.products.productsData', ['products' => $products,'category_id'=>$category_id]);
    }
    public function create() {
        return view('Admin.products.addProduct');
    }

    public function store(Request $request) {
        Product::create([
            'title'=>$request->product_name,
            'price'=>$request->price,
            'inventory'=>$request->amount_available,
            'description'=>$request->explanation,
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        return redirect('/admin/products');
    }

    public function show($id) {
        $product = Product::find($id);
        return view('Admin.products.showproduct', ['product' => $product]);
    }

    public function edit($id) {
        $products = Product::find($id);
        return view('Admin.products.editProductMenue' , ['products' => $products]);
    }

    public function update(Request $request, $id) {
        Product::find($id)->update([
            'title'=>$request->product_name,
            'price'=>$request->price,
            'inventory'=>$request->amount_available,
            'description'=>$request->explanation,
        ]);
        return redirect('/admin/products');
    }

    public function destroy($id) {
        Product::find($id)->delete();
        return redirect('/admin/products');
    }
}
