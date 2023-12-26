<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index()
    {
        $role = auth()->user()->role;
        
        if ($role == 'seller') {
            return view('Seller.workplace');
        } elseif ($role == 'buyer') {
            return view('Buyer.workplace');
        } else{
            return view('Admin.workplace');
        }
    }
}
