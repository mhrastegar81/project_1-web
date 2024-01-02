<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Factor;
use App\Models\Order;
use Illuminate\Http\Request;

class BuyerFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $checks = Factor::where('user_id', $id)->get();
        return view('Buyer.checks.checksData', ['checks' => $checks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        return view('Buyer.checks.addCheck',['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Factor::create([
            'user_id' => $request->user_id,
            'order_id' => $request->order_id,
            'finally_price' => $request->total_pay,
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        return redirect('/buyer/factor');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::where('id', $id)->delete();
        return redirect('/buyer/');
    }

    public function update_status($id) {
        $status = Factor::findOrfail($id);
        $status->order->update(['pay_status' => 'payed']);
        return redirect('/buyer/factor');
    }
}
