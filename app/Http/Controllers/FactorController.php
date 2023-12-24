<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Http\Requests\StoreFactorRequest;
use App\Http\Requests\UpdateFactorRequest;
use App\Models\Order;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checks = Order::find(2)->factor;
        dd($checks);
        return view('first_project.checks.checksData',['checks' => $checks]);
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
        Factor::create([
            'order_id' => $request->order_id,
        ]);
        return redirect('/factor');
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
    public function edit(Factor $factor)
    {
        //
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
    public function destroy(Factor $factor)
    {
        //
    }
}
