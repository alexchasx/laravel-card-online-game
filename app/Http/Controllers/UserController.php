<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Model\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\CardGame\Http\Entities\Avatar;

class UserController extends BaseController
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct();

        $this->model = $user;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('user.index', [
            'nameRoute' => 'user',
            'entities' => $this->model->getAll(),
        ]);
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
     * @param Avatar $avatar
     *
     * @return View
     */
    public function getProfile(Avatar $avatar)
    {
        return view('user.profile', [
            'user' => Auth::user(),
            'avatars' => $avatar->getAll('avatar'),
        ]);
    }

    /**
     * @param UserRequest $request
     *
     * @return RedirectResponse
     */
    public function updateUser(UserRequest $request)
    {
        $this->model->updateModel($request->all());

        return redirect()->back();
    }
}
