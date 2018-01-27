<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfUser
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  Closure $next
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (User::ROLE_USER === Auth::user()->role) {
            return redirect()->route('profile');
        }

        return $next($request);
    }
}
