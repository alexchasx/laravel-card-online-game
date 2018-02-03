<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\Achievement;

class AchievementController extends BaseController
{
    /**
     * @param Achievement $model
     */
    public function __construct(Achievement $model)
    {
        parent::__construct($model);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::achievement.index', [
            'nameRoute' => 'achievement',
            'entities' => $this->model->withTrashedOrderByDesc(),
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
