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
    protected $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
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
        if ($this->repository->hasRole(User::ROLE_ADMIN)) {
            return response()
                ->view('errors.403');
        }

        return $next($request);
    }
}
