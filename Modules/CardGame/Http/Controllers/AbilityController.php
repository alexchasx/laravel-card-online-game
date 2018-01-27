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
        self::checkAdmin();

        return view('cardgame::ability.index')->with([
            'abilities' => $this->repository->showEntitiesByClassName(Ability::class),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        self::checkAdmin();

        $ability = parent::edit($id);

        return view('cardgame::ability.update')->with([
            'ability' => $ability,
        ]);
    }

}