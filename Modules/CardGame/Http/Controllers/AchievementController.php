<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Repositories\AchievementRepository;

class AchievementController extends BaseController
{
    /**
     * @param AchievementRepository $repository
     */
    public function __construct(AchievementRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::achievement.index', [
            'nameRoute' => 'achievement',
            'entities' => $this->repository->withTrashedOrderByDesc(),
        ]);
    }

    /**
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        return view('cardgame::achievement.update', [
            'entity' => parent::edit($id),
        ]);
    }
}
