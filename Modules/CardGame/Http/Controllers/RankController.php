<?php

namespace Modules\CardGame\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\BaseRequest;
use HttpException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\CardGame\Http\Entities\Rank;

class RankController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param Rank $model
     */
    public function __construct(Rank $model)
    {
        parent::__construct($model);
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('cardgame::rank.index', [
            'ranks' => $this->model->getAll('sort'),
        ]);
    }

    /**
     * @param BaseRequest $request
     *
     * @return RedirectResponse
     */
    public function update(BaseRequest $request)
    {
        $ranks = [];
        foreach ($request->all() as $field => $value) {
            if (is_array($value)) {
                foreach ($value as $id => $val) {
                    $ranks[$id][$field] = $val;
                }
            }
        }

        foreach ($ranks as $rank) {
            $this->model->updateModel($rank);
        }

        return redirect()->back();
    }
}
