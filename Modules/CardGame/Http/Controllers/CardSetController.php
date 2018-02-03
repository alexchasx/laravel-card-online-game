<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use Modules\CardGame\Http\Entities\CardType;
use Modules\CardGame\Http\Entities\Race;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\CardSet;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CardSetController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param CardSet $cardSet
     */
    public function __construct(CardSet $cardSet)
    {
        parent::__construct($cardSet);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::card_set.index')->with([
            'cardSets' => $this->model->getAll(),
            'races' => $this->model->getAll(),
            'types' => $this->model->getAll(),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        return view('cardgame::card_set.update', [
            'cardSet' => parent::edit($id),
        ]);
    }

}
