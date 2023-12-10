<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


use function PHPUnit\Framework\isNull;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = User::join('orders', 'users.id', '=', 'orders.user_id')->get();


        $products = Product::all();
        // foreach ($products as $product) {
        //     if ($product->inventory = 0) {
        //         DB::table('products')->where('id', $product->id)->update(['status' => 'disable']);
        //     }
        // }
        $order_products = OrderProduct::all();
        return view('first_project.orders.ordersData', ['orders' => $orders, 'products' => $products, 'order_products' => $order_products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('first_project.orders.addOrder', ['users' => $users, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //گام اول : محسابه قیمت نهایی
        $total_price = 0;

        Order::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'total_price' => $total_price,
            'created_at' => date('Y-m-d H:i:s'),

        ]);
        foreach ($request->all() as $key => $product_count) {

            if (Str::is('Product*', $key)) {

                $product_id = substr($key, -1);
                $products = Product::where('id', $product_id)->first();
                $total_price += $products->price * $product_count;

                //پایان عملیات گام اول

                //گام دوم : وارد کردن نام محصولات به جدول پیوت

                $last_order_id = Order::select('id')->get()->max('id');
                if ($last_order_id == null) {
                    $last_order_id = 1;
                }

                OrderProduct::create([
                    'order_id' => $last_order_id,
                    'product_id' => $product_id,
                    'count' => $product_count,
                ]);

                //پایان گام دوم

                //گام سوم : تعیین مجدد موجودی درون جدول محصولات

                // $product_inventory = ($products->inventory - $product_count);
                // $product_sold_number = ($products->sold_number + $product_count);

                // DB::table('products')->where('id', $product_id)->update([
                //     'inventory' => $product_inventory,
                //     'sold_number' => $product_sold_number,
                // ]);
                // //پایان گام سوم
            }
        }

        Order::where('id', $last_order_id)->update([
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
        $order = Order::where('id', $id)->first();

        $user = User::where('id', $order->user_id)->first();


        $products_id = [];
        $order_products = OrderProduct::all();
        foreach ($order_products as $orderProduct) {
            if ($orderProduct->order_id == $id) {
                array_push($products_id, $orderProduct->product_id);
            }
        }
        $pro_count = OrderProduct::join('products', 'order_products.product_id', "=", "products.id")->where('order_products.order_id', $id)->get();
        $products = Product::whereIn('id', $products_id)->get();
        $orders = Order::all();
        return view('first_project.orders.editOrderMenue', ['order_products' => $order_products, 'products' => $products, 'user' => $user, 'id' => $id, 'orders' => $orders, 'pro_count' => $pro_count]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $total_price = 0;

        foreach ($request->all() as $key => $product_count) {

            if (Str::is('Product*', $key)) {

                $product_id = substr($key, -1);
                $order_products = OrderProduct::where(['order_id'=> $id, 'product_id' => $product_id])->get()->first();

                if ($order_products->count != $product_count) {

                    $products = Product::where('id', $product_id)->first();
                    $total_price += $products->price * $product_count;
                    //پایان عملیات گام اول


                    OrderProduct::where('product_id', $order_products->product_id)->update([
                        'count' => $product_count,
                    ]);

                } else {
                    $products = Product::where('id', $product_id)->first();
                    $total_price += $products->price * $product_count;
                }
            }



        }

        Order::where('id', $id)->update([
            'user_id' => $request->user_id,
            'total_price' => $total_price,
            'updated_at' => date('Y-m-d H:i:s'),

        ]);


        return redirect('/orders');

        // $total_price = 0;
        // $title = Order::where('id', $id)->first()->title;
        // foreach ($request->all() as $key => $product_count) {
        //     if (Str::is('Product*', $key)) {
        //         for ($i = 0; $i < $product_count; $i += 1) {
        //             $product_id = substr($key, -1);
        //             $products = Product::where('id', $product_id)->first();
        //             $total_price += ($products->price);


        //             OrderProduct::where('product_id' , $product_id)->update([
        //                 'count' => $product_count,
        //             ]);
        //         }
        //         $product_inventory = ($products->inventory - $product_count);

        //         Product::where('id', $product_id)->update([
        //             'inventory' => $product_inventory,
        //         ]);
        //     }
        // }

        // Order::where('id', $id)->update([
        //     'user_id' => $request->user_id,
        //     'title' => $title,
        //     'total_price' => $total_price,
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);


        // return redirect('/orders');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Order::where('id', $id)->delete();
        return redirect('/orders');
    }
}
