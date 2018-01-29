<?php

namespace Modules\CardGame\Http\Controllers;

use App\Http\Controllers\BaseController;

use Illuminate\View\View;
use Modules\CardGame\Http\Entities\Race;
use Modules\CardGame\Repositories\RaceRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RaceController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param RaceRepository $repository
     */
    public function __construct(RaceRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::race.index')->with([
            'races' => $this->repository->showEntitiesByClassName(Race::class),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        $race = parent::edit($id);

        return view('cardgame::race.update')->with([
            'race' => $race,
        ]);
    }

}