<?php

namespace App\Http\Controllers;

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
        $orders = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->get();
        $products = DB::table('products')->get();
        foreach ($products as $product) {
            if ($product->inventory = 0) {
                DB::table('products')->where('id', $product->id)->update(['status' => 'disable']);
            }
        }
        $order_products = DB::table('order_products')->get();
        return view('first_project.orders.ordersData', ['orders' => $orders, 'products' => $products, 'order_products' => $order_products]);
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

                $product_id = substr($key, -1);
                $products =  DB::table('products')->where('id', $product_id)->first();
                $total_price += $products->price * $product_count;

                //پایان عملیات گام اول

                //گام دوم : وارد کردن نام محصولات به جدول پیوت

                $last_order_id = DB::table('orders')->select('id')->get()->max('id') + 1;
                if ($last_order_id == null) {
                    $last_order_id = 1;
                }

                DB::table('order_products')->insert([
                    'order_id' => $last_order_id,
                    'product_id' => $product_id,
                    'count' => $product_count,
                ]);
                //پایان گام دوم

                //گام سوم : تعیین مجدد موجودی درون جدول محصولات

                $product_inventory = ($products->inventory - $product_count);
                $product_sold_number = ($products->sold_number + $product_count);

                DB::table('products')->where('id', $product_id)->update([
                    'inventory' => $product_inventory,
                    'sold_number' => $product_sold_number,
                ]);
                //پایان گام سوم
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
        $order = DB::table('orders')->where('id', $id)->first();

        $user = DB::table('users')->where('id', $order->user_id)->first();


        $products_id = [];
        $order_products = DB::table('order_products')->get();
        foreach ($order_products as $orderProduct) {
            if ($orderProduct->order_id == $id) {
                array_push($products_id, $orderProduct->product_id);
            }
        }
        $pro_count = DB::table('order_products')->join('products', 'order_products.product_id', "=", "products.id")->where('order_products.order_id', $id)->get();
        $products = DB::table('products')->whereIn('id', $products_id)->get();
        $orders = DB::table('orders')->get();
        return view('first_project.orders.editOrderMenue', ['order_products' => $order_products, 'products' => $products, 'user' => $user, 'id' => $id, 'orders' => $orders, 'pro_count' => $pro_count]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //گام اول : محسابه قیمت نهایی
        $total_price = 0;
        $products_id = [];


        $titel = DB::table('orders')->where('id', $id)->first()->titel;
        $order_products = DB::table('order_products')->get();

        foreach ($request->all() as $key => $product_count) {


            if (Str::is('Product*', $key)) {

                $product_id = substr($key, -1);
                $products = DB::table('products')->where('id', $product_id)->first();
                $total_price += $products->price * $product_count;
                //پایان عملیات گام اول
                $order_products = DB::table('order_products')->where('order_id', $id)->get();
                foreach ($order_products as $order_product) {
                    DB::table('order_products')->where('product_id', $order_product->product_id)->update([
                        'count' => $product_count,
                    ]);
                    $product_inventory = ($products->inventory - $product_count);
                    $product_sold_number = ($products->sold_number + $product_count);

                    DB::table('products')->where('id', $product_id)->update([
                        'inventory' => $product_inventory,
                        'sold_number' => $product_sold_number,
                    ]);
                }


                //گام سوم : تعیین مجدد موجودی درون جدول محصولات


                //پایان گام سوم

            }
        }

        DB::table('orders')->where('id', $id)->update([
            'user_id' => $request->user_id,
            'titel' => $titel,
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
