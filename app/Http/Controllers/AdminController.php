<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.users.usersData', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        return view('Admin.users.addUser',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'role' => $request->role,
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
        ]);

        return redirect('/admin');
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
        $user = User::where('id', $id)->get->first();
        return view('Admin.users.editUser', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where('id', $id)->update([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'post_code' => $request->postal_code,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
        ]);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect('/admin');
    }
}
