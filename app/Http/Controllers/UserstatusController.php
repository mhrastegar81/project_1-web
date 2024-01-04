<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserstatusController extends Controller
{
    public function accept($id) {
        $user = User::find($id);
        $user->update(['status' => 'defined ']);
        session()->put('token', $user->createToken("API TOKEN")->plainTextToken);
        return redirect()->back();
    }

    public function reject($id) {
        User::find($id)->update(['status' => 'undefined']);
        User::find($id)->delete();
        return redirect()->back();
    }
}
