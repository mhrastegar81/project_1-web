<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BuyerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $orders = Order::where('user_id',$id)->get();
        $products = Product::all();
        return view('Buyer.orders.ordersData', ['orders' => $orders, 'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($product_id)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $product = Product::where('id', $product_id)->first();
        return view('Buyer.orders.addOrder',['user' => $user , 'product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $total_price = 0;
        Order::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'total_price' => $total_price,

        ]);
        foreach ($request->all() as $key => $product_count) {

            if (Str::is('Product*', $key)) {

                $product_id = substr($key, -1);
                $products = Product::where('id', $product_id)->first();
                $total_price += $products->price * $product_count;

                $last_order_id = Order::select('id')->get()->max('id');
                if ($last_order_id == null) {
                    $last_order_id = 1;
                }

                $order = Order::find($last_order_id);
                $order->products()->attach($product_id, ['count' => $product_count]);
            }
        }

        Order::where('id', $last_order_id)->update([
            'total_price' => $total_price,
        ]);



        return redirect('/buyer/order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        $product = $order->products()->first();
        return view("Buyer.orders.showorder",['order'=>$order,'product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        $user = User::where('id', $order->user_id)->first();
        $product = $order->products()->first();
        return view('Buyer.orders.editOrderMenue',['user'=>$user, 'order'=>$order ,'id'=> $id , 'product' =>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $total_price = 0;
        $order = Order::find($id);
        $flage = true;
        foreach ($request->all() as $key => $product_count) {

            if (Str::is('Product*', $key)) {

                $product_id = substr($key, -1);


                $products = Product::where('id', $product_id)->first();
                $total_price += $products->price * $product_count;

                if ($flage == true) {

                    $order->products()->sync([$product_id => ['count' => $product_count]]);
                    $flage = false;

                } else{
                    $order->products()->attach($product_id, ['count' => $product_count]);
                }

            }
        }

        Order::where('id', $id)->update([
            'total_price' => $total_price,
            'updated_at' => date('Y-m-d H:i:s'),

        ]);


        return redirect('/buyer/order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::where('id', $id)->delete();
        return redirect('/buyer');
    }

    public function pay($id){
        $orders = Order::where('user_id',$id)->get();
        Order::where('user_id', $id)->update([
            'pay_status' => 'payed',
        ]);

        return view('Buyer.checks.addCheck',['orders'=>$orders]);
    
    }
}
