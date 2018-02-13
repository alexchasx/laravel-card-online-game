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
     * @return JsonResponse
     */
    public function index()
    {
        $provocations = $this->model->getAllForUsers('id');

        $provocationJson = [];
        foreach ($provocations as $provocation) {

            $diffTime = time() - $provocation->created_at->getTimestamp();

            if ($diffTime < 3000000) {
                if ($provocation->user && $provocation->user->id !== Auth::id()) {
//                    $provocationJson[] = [
//                        'name' => $provocation->user->name,
//                        'rank' => $provocation->seen_rank ? $provocation->rank->name : null,
//                        'rankCss' => $provocation->rank->class_css,
//                    ];

                    $provocationJson[] = "<tr>
                                            <td>
                                            <span class=\"pick\">".
                                            $provocation->user->name . "
                                            </span>
                                            </td>
                                            <td><span class=\"
                                            ". $provocation->rank->class_css ."
                                            \">" .( $provocation->seen_rank ? $provocation->rank->name : null ). "</span>                                            
                                            </td>
                                            <td>
                                            <button href=\"#\" class=\"button large round provocation\">
                                            Принять
                                            </button>
                                            </td>
                                            </tr>";
                }
            }
        }

        return response()->json($provocationJson);
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