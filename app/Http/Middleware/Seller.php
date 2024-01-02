<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Seller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role == 'seller' && auth()->user()->status == 'defined'){
            return $next($request);
        }elseif(auth()->user()->role == 'seller' && auth()->user()->status == 'waiting'){
            dd('dear seller thank you for useing our website you registered successfully please wait for accepting from admin');
        }
        return redirect('/login');
    }
}
