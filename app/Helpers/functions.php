<?php

use App\Model\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('isAdmin')) {
    /**
     * @return bool
     */
    function isAdmin()
    {
        return User::ROLE_ADMIN === Auth::user()->role->name;
    }
}