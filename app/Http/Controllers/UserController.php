<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //return view('first_project.users.usersData');
        $users = DB::table('users')->get();
        return view('first_project.users.usersData', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('first_project.users.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'user_name' => 'required',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'age' => 'required',
        //     'gender' => '',
        //     'email' => 'required',
        //     'phone_number' => 'required',
        //     'address' => 'required',
        //     'post_code' => 'required',
        //     'country' => 'required',
        //     'province' => '',
        //     'city' => 'required',

        // ]);

        DB::table('users')->insert([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => md5($request->password),
            'address' => $request->address,
            'post_code' => $request->postal_code,
            'country'=>$request->country,
            'province' => $request->province,
            'city' => $request->city,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/users');
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
        //DB::insert('insert into users (user_name,first_name,last_name,email,phone_number) values (?,?,?,?,?)', ['shark','taha','samad','amirreza@gmail.com']);
        $user = DB::table('users')->where('id', $id)->first();

        return view('first_project.users.editUser', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->phone_number,
            'address' => $request->address,
            'post_code' => $request->postal_code,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect ('/users');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = DB::table('users')->where('id', $id)->update(['status' => 'disable']);
        return redirect('/users');
    }
}
