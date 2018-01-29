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
        $achievements = $this->repository->withTrashedOrderByDesc();

        return view('cardgame::achievement.index')->with([
            'achievements' => $achievements,
        ]);
    }

    /**
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        $achievement = parent::edit($id);

        return view('cardgame::achievement.update')->with([
            'achievement' => $achievement,
        ]);
    }
}
