<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\Avatar;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AvatarController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param Avatar $model
     */
    public function __construct(Avatar $model)
    {
        parent::__construct($model);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::avatar.index', [
            'nameRoute' => 'avatar',
            'entities' => $this->model->getAll('id'),
        ]);
    }

    /**
     * @return View
     */
    public function indexForUsers()
    {
        return view('avatar.index', [
            'nameRoute' => 'avatar',
            'entities' => $this->model->getAllForUsers('id'),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        return view('cardgame::avatar.update', [
            'entity' => parent::edit($id),
        ]);
    }
}
