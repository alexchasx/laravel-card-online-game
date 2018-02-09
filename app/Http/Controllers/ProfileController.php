<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeAvatarRequest;
use App\Model\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\CardGame\Http\Entities\Avatar;
use Modules\CardGame\Http\Entities\Card;
use Modules\CardGame\Http\Entities\CardSet;
use Modules\CardGame\Http\Entities\Rank;

class ProfileController extends BaseController
{
    public function __construct()
    {
        parent::__construct(Auth::user());
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('product.index', [
            'products' => $this->model->getAll(),
        ]);
    }

    /**
     * @param Rank    $rank
     * @param CardSet $cardSets
     *
     * @return View
     */
    public function getProfile(Rank $rank, CardSet $cardSets, Card $card)
    {
        return view('user.profile', [
            'user' => Auth::user(),
            'ranks' => $rank->getAllForUsers('rating'),
            'cardSets' => $cardSets->getAllForUsers('name'),
            'cards' => $card->getAllForUsers('energy'),
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

        if ($this->model->updateUser([
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
