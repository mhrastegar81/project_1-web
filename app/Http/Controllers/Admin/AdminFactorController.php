<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\StoreAdminFactorRequest;
use App\Http\Requests\AdminRequest\UpdateAdminFactorRequest;
use App\Models\Factor;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminFactorController extends Controller
{
    public function index() {
        $checks = Factor::all();
        return view('Admin.checks.checksData', ['checks' => $checks]);
    }

    public function create() {
        $orders = Order::all();
        $factors = Factor::all();
        return view('Admin.checks.addCheck',['orders' => $orders,'factors'=> $factors]);
    }
    public function store(Request $request) {
        Factor::create([
            'order_id' => $request->order_id,
            'finally_price' => $request->total_pay,
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        return redirect('/admin/factors');
    }

    public function edit($id) {
        $orders = Order::all();
        $check = Factor::find($id);
        return view('Admin.checks.editCheckMenue',['check' => $check, 'orders' => $orders]);
    }
    public function update(Request $request, $id) {
        Factor::find($id)->update([
            'factor_id' => $request->order_id,
            'finally_price' => $request->total_pay,
            'status' => $request->status,
        ]);
        return redirect('/admin/factors');
    }

    public function destroy($id) {
        Factor::find($id)->delete();
        return redirect('/admin/factors');
    }

    public function update_status($id) {
        $status = Factor::findOrfail($id);
        $status->update(['status' => 'پرداخت شده']);
        return redirect('/admin/factors');
    }
}
