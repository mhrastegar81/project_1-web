<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->get();
        $products = DB::table('products')->get();
        $products_count = DB::table('order_products')->get();
        return view('first_project.orders.ordersData', ['orders' => $orders, 'products' => $products , 'products_count' => $products_count]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')->get();
        $products_available = DB::table('products')->get();
        return view('first_project.orders.addOrder', ['users' => $users, 'products_available' => $products_available]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //گام اول : محسابه قیمت نهایی
        $total_price = 0;

        foreach ($request->all() as $key => $product_count) {


            if (Str::is('Product*', $key)) {
                for ($i = 0; $i < $product_count; $i += 1) {
                    $product_id = substr($key, -1);
                    $products = (array) DB::table('products')->where('id', $product_id)->first();
                    $total_price += ($products['price'] * $product_count);
                    //پایان عملیات گام اول
                    //گام دوم : تعیین مجدد موجودی درون جدول محصولات

                    $product_inventory = ($products['inventory'] - $product_count);
                    $product_sold_number = ($products['sold_number'] + $product_count);

                    DB::table('products')->where('id', $product_id)->update([
                        'inventory' => $product_inventory,
                        'sold_number' => $product_sold_number,
                    ]);
                    //پایان گام دوم
                    //گام سوم : وارد کردن نام محصولات به جدول پیوت
                    $order_count = (array)DB::table('orders')->select('id')->get();

                    if (isset($order_count['id'])) {
                        $last_order_id = (DB::table("orders")->orderBy('id', 'desc')->first()->id) + 1;
                    } else {
                        $last_order_id = 1;
                    }

                    DB::table('order_products')->insert([
                        'order_id' => $last_order_id,
                        'product_id' => $product_id,
                    ]);
                }
            }
        }


        DB::table('orders')->insert([
            'user_id' => $request->user_id,
            'titel' => $request->titel,
            'total_price' => $total_price,
            'created_at' => date('Y-m-d H:i:s'),

        ]);


        return redirect('/orders');
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
        $product = DB::table('products')->where('id', $id)->first();
        $user = DB::table('users')->where('id', $id)->first();
        $order = DB::table('orders')->where('id', $id)->first();
        dd($user);
        return view('first_project.orders.editOrderMenue', ['product' => $product, 'user' => $user, 'order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //گام اول : محسابه قیمت نهایی
        $total_price = 0;

        foreach ($request->all() as $key => $product_count) {


            if (Str::is('Product*', $key)) {
                for ($i = 0; $i < $product_count; $i += 1) {
                    $product_id = substr($key, -1);
                    $products = (array) DB::table('products')->where('id', $product_id)->first();
                    $total_price += ($products['price'] * $product_count);
                    //پایان عملیات گام اول
                    //گام دوم : تعیین مجدد موجودی درون جدول محصولات

                    $product_inventory = ($products['inventory'] - $product_count);
                    $product_sold_number = ($products['sold_number'] + $product_count);

                    DB::table('products')->where('id', $product_id)->update([
                        'inventory' => $product_inventory,
                        'sold_number' => $product_sold_number,
                    ]);
                    //پایان گام دوم
                    //گام سوم : وارد کردن نام محصولات به جدول پیوت
                    $last_order_id = (DB::table("orders")->orderBy('id', 'desc')->first()->id) + 1;

                    DB::table('order_products')->insert([
                        'order_id' => $last_order_id,
                        'product_id' => $product_id,
                    ]);
                }
            }
        }

        DB::table('orders')->insert([
            'user_id' => $request->user_id,
            'titel' => $request->titel,
            'total_price' => $total_price,
            'created_at' => date('Y-m-d H:i:s'),

        ]);


        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = DB::table('orders')->where('id', $id)->update(['status' => 'disable']);
        return redirect('/orders');
    }
}
