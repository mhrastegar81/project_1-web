<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            $categories = Category::all();
            return view('Seller.workplace',['categories'=>$categories]);
        } elseif ($role == 'buyer') {
            $categories = Category::all();
            return view('Buyer.workplace',['categories'=>$categories]);
        } else{
            $categories = Category::all();
            return view('Admin.workplace',['categories'=>$categories]);
        }
    }
}
