<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeAvatar;
use App\Http\Requests\ChangeAvatarRequest;
use App\Http\Requests\UserRequest;
use App\Model\Product;
use App\Model\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\CardGame\Http\Entities\Avatar;

class UserController extends BaseController
{
    const ERROR_NEGATIVE_BALANCE = 'У вас недостаточно средств. Пополните баланс.';
    const ERROR_NOT_SAVED = 'Не удалось сохранить изменения :(';

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
     * @return View
     */
    public function getProfile()
    {
        return view('user.profile', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param Product $product
     * @param Avatar  $avatar
     *
     * @return View
     */
    public function getProducts(Product $product, Avatar $avatar)
    {
        return view('user.magazin', [
            'products' => $product->getAllForUsers(),
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
        if ($this->model->updateModel($request->all())) {
            return redirect()->back();
        }

        return redirect()->back()->with([
            'messageError' => self::ERROR_NOT_SAVED,
        ]);
    }

    /**
     * @param ChangeAvatarRequest $request
     * @param Avatar              $avatar
     *
     * @return RedirectResponse
     */
    public function changeAvatar(ChangeAvatarRequest $request, Avatar $avatar)
    {
        $avatarId = $request->getParamAvatarId();
        $model = $avatar->getById($avatarId);
        $balanceAfter = $this->model->changeBalance($model);

        if (is_null($balanceAfter)) {
            return redirect()->back()->withErrors([
                self::ERROR_NEGATIVE_BALANCE,
            ]);
        }

        if ($this->model->updateModel([
            'id' => Auth::id(),
            'avatar_id' => $avatarId,
            'balance' => $balanceAfter,
        ])) {
            return redirect()->back();
        }

        return redirect()->back()->with([
            'messageError' => self::ERROR_NOT_SAVED,
        ]);
    }

}
