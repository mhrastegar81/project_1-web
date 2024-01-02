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
            $user_role = auth()->user()->role;
            $request->session()->regenerate();
            switch ($user_role) {
                case 'admin':
                    return redirect()->route('admin.workplace');
                    break;
                case 'seller':
                    return redirect()->route('seller.workplace');
                    break;
                case 'buyer':
                    return redirect()->route('buyer.workplace');
                    break;
                default:
                    echo "your role was unvalid ";
            }
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
