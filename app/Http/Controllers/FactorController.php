<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Http\Requests\StoreFactorRequest;
use App\Http\Requests\UpdateFactorRequest;
use App\Models\Order;
use App\Models\Product;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factors = Factor::all();


        return view('first_project.checks.checksData',['factors' => $factors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();

        return view('first_project.checks.addCheck',['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFactorRequest $request)
    {
        $order = Order::find($request->order_id);
        $products = $order->products()->where('order_id', $request->order_id)->get();
        foreach($products as $product){
            $sold_number = $product->pivot->count;
            $inventory = $product->inventory - $sold_number;
            $sold_number += $product->sold_number ;
            Product::where('id', $product->id)->update([
                'inventory' => $inventory,
                'sold_number' => $sold_number,
            ]);
        }

        Factor::create([
            'order_id' => $request->order_id,
        ]);

        return redirect('/Factor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factor $factor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factor $factor,$id)
    {
        $check = Factor::find($id);
        return view('first_project.checks.editCheckMenue',['check'=> $check]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFactorRequest $request, Factor $factor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factor $factor, $id)
    {
        Factor::where('id', $id)->delete();
        return redirect('/Factor');
    }
}
