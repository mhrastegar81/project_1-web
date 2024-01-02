<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin.users.userData', ['users' => $users]);
    }

    public function filter(Request $request)
    {



        $users = QueryBuilder::for(User::class)
            ->allowedFilters([
                AllowedFilter::callback('AgeMin', function(Builder $query, $value){
                    $query->where('age', '>=', (int)$value);


                })->ignore(null),
                AllowedFilter::callback('AgeMax', function($query, $value){
                    $query->where('age', '<=', (int)$value);

                })->ignore(null),
                AllowedFilter::exact('email')->ignore(null),
                AllowedFilter::exact('user_name')->ignore(null),
                AllowedFilter::exact('first_name')->ignore(null),
                AllowedFilter::exact('last_name')->ignore(null),
                AllowedFilter::exact('gender')->ignore(null),
                AllowedFilter::exact('phone_number')->ignore(null),
                AllowedFilter::exact('post_code')->ignore(null),
            ])
            ->get();
        return view('Admin.users.userData', ['users' => $users]);
    }
    public function create()
    {
        return view('Admin.users.addUser');
    }

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

        return redirect('/admin/user');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->get->first();
        return view('Admin.users.editUser', ['user' => $user]);
    }

    public function update(Request $request, $id)
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
        return redirect('/admin/user');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/admin/user');
    }
}
