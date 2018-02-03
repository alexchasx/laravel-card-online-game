<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\Ability;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AbilityController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param Ability $model
     */
    public function __construct(Ability $model)
    {
        parent::__construct($model);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::ability.index', [
            'nameRoute' => 'ability',
            'entities' => $this->model->getAll(),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        return view('cardgame::ability.update', [
            'entity' => parent::edit($id),
        ]);
    }

}