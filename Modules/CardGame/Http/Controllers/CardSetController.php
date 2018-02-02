<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use Modules\CardGame\Http\Entities\CardType;
use Modules\CardGame\Http\Entities\Race;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\CardSet;
use Modules\CardGame\Repositories\CardSetRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CardSetController extends BaseController
{
    /**
     * @var CardSetRepository
     */
    protected $repository;

    /**
     * BaseController constructor.
     *
     * @param CardSetRepository $repository
     */
    public function __construct(CardSetRepository $repository)
    {
        parent::__construct();

        $this->repository;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::card_set.index')->with([
            'cardSets' => $this->repository->showEntities(),
            'races' => $this->repository->showEntitiesByClassName(Race::class),
            'types' => $this->repository->showEntitiesByClassName(CardType::class),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        $cardSet = parent::edit($id);

        return view('cardgame::card_set.update')->with([
            'cardSet' => $cardSet,
        ]);
    }

}
