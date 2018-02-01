<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\Race;
use Modules\CardGame\Http\Entities\Rarity;
use Modules\CardGame\Http\Entities\CardSet;
use Modules\CardGame\Http\Entities\Ability;
use Modules\CardGame\Http\Entities\CardType;
use Modules\CardGame\Repositories\CardRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CardController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param CardRepository $repository
     */
    public function __construct(CardRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * GET /admin/Card/index
     *
     * @return View | HttpException
     */
    public function index()
    {
        return view('cardgame::card.index', [
            'nameRoute' => 'card',
            'entities' => $this->repository->withTrashedOrderByDesc(),
            'cardSets' => $this->repository->showEntitiesByClassName(CardSet::class),
            'races' => $this->repository->showEntitiesByClassName(Race::class),
            'abilities' => $this->repository->showEntitiesByClassName(Ability::class),
            'types' => $this->repository->showEntitiesByClassName(CardType::class),
            'rarities' => $this->repository->showEntitiesByClassName(Rarity::class),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        return view('cardgame::card.update', [
            'entity' => parent::edit($id),
            'cardSets' => $this->repository->showEntitiesByClassName(CardSet::class),
            'races' => $this->repository->showEntitiesByClassName(Race::class),
            'abilities' => $this->repository->showEntitiesByClassName(Ability::class),
            'types' => $this->repository->showEntitiesByClassName(CardType::class),
            'rarities' => $this->repository->showEntitiesByClassName(Rarity::class),
        ]);
    }
}
