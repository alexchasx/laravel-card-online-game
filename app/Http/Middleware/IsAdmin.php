<?php

namespace App\Http\Middleware;

use App\Model\User;
use App\Repositories\RoleRepository;
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
     * @param RoleRepository $repository
     */
    public function __construct(RoleRepository $repository)
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
        $role = $this->repository->getByUser(Auth::user());

        if (User::ROLE_ADMIN !== $role->name) {
            return response()
                ->view('errors.403');
        }

        return $next($request);
    }
}
