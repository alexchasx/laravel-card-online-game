<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Repositories\AchievementRepository;

class AchievementController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param AchievementRepository $repository
     */
    public function __construct(AchievementRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Display a listing of the resource.
     *
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
     * @param Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        parent::store($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        parent::update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        parent::destroy($id);
    }
}
