<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserstatusController extends Controller
{
    public function accept($id) {
        $user = User::find($id);
        $user->update(['status' => 'defined ']);
        session()->put('token', $user->createToken("API TOKEN")->plainTextToken);
        return view('authorize.login');
    }

    public function acceptReject() {
        return view('authorize.acceptRole');
    }

    public function reject($id) {
        User::find($id)->update(['status' => 'rejected'])->delete();
        return view('authorize.login');
    }
}
