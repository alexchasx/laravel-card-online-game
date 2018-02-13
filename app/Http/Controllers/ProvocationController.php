<?php

namespace App\Http\Controllers;

use App\Events\CreateProvocation;
use App\Http\Requests\ProvocationRequest;
use App\Model\Provocation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProvocationController extends BaseController
{
    /**
     * @param Provocation $model
     */
    public function __construct(Provocation $model)
    {
        parent::__construct($model);
    }

    /**
     * @param ProvocationRequest $request
     *
     * @return JsonResponse
     */
    public function create(ProvocationRequest $request)
    {
        if ($this->model->getByUser(Auth::id())) {
            return redirect()->back()
                ->withErrors('Чтобы сделать новый вызов, удалите старый.');
        }

        $user = Auth::user();
        $inputs = $request->all() + [
                'user_id' => $user->id,
                'rank_id' => $user->rank_id
            ];

        $provocation = $this->model->createModel($inputs);

//        event(new CreateProvocation($provocation));

        return response($provocation, 201);
    }

}