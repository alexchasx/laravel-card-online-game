<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\Ability;
use Modules\CardGame\Repositories\AbilityRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AbilityController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param AbilityRepository $repository
     */
    public function __construct(AbilityRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::ability.index', [
            'nameRoute' => 'ability',
            'entities' => $this->repository->showEntitiesByClassName(Ability::class),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        $ability = parent::edit($id);

        return view('cardgame::ability.update', [
            'entity' => $ability,
        ]);
    }

}