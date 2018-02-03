<?php

namespace Modules\CardGame\Http\Controllers;

use App\Http\Controllers\BaseController;

use Illuminate\View\View;
use Modules\CardGame\Http\Entities\Race;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RaceController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param Race $model
     */
    public function __construct(Race $model)
    {
        parent::__construct($model);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::race.index', [
            'races' => $this->model->getAll(),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        return view('cardgame::race.update', [
            'race' => parent::edit($id),
        ]);
    }

}