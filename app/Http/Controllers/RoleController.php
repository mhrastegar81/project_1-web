<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index(Request $request)
    {
        $role = auth()->user()->role;
        if(isset($request->category_search)){
            $categories = Category::where('name', $request->category_search)->get();
        }else{
            $categories = Category::all();
        }

        if ($role == 'seller') {
            return view('Seller.workplace', ['categories' => $categories,'role'=>$role]);
        } elseif ($role == 'buyer') {
            return view('Buyer.workplace', ['categories' => $categories,'role'=> $role]);
        } else {

            return view('Admin.workplace', ['categories' => $categories,'role'=> $role]);
        }
    }
}
