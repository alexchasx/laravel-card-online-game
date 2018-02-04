<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Model\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends BaseController
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

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

    /**
     * @param UserRequest $request
     *
     * @return RedirectResponse
     */
    public function updateUser(UserRequest $request)
    {
        $this->model->updateModel($request->all(), $request->file('avatar'));

        return redirect()->back();
    }
}
