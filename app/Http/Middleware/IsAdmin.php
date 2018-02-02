<?php

namespace App\Http\Middleware;

use App\Model\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * @var RoleRepository
     */
    protected $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

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
        if (!isAdmin()) {
            return response()
                ->view('errors.403');
        }

        return $next($request);
    }
}
