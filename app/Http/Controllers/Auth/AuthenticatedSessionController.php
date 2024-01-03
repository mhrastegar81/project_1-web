<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = auth()->user();
            $user_role = auth()->user()->role;
            switch ($user_role) {
                case 'admin':
                    session()->put('token', $user->createToken("API TOKEN")->plainTextToken);
                    return redirect()->route('admin.workplace');
                    break;
                case 'seller':
                    session()->put('token', $user->createToken("API TOKEN")->plainTextToken);
                    return redirect()->route('seller.workplace');
                    break;
                case 'buyer':
                    session()->put('token', $user->createToken("API TOKEN")->plainTextToken);
                    return redirect()->route('buyer.workplace');
                    break;
                default:
                    echo "your role was invalid ";
            }
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();
        $user->tokens->each(function($token , $key){
            $token->delete();
            Auth::logout();
        });
        return redirect('/login');
    }
}
