<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends BaseController
{
    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    /**
     * @return View
     */
    public function getProfile()
    {
        return view('user.profile')->with([
            'user' => Auth::user(),
        ]);
    }
}
