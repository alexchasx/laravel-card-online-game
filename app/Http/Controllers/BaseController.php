<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseRequest;
use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseController extends Controller
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param BaseModel $model
     */
    public function __construct(BaseModel $model = null)
    {
        $this->model = $model;
    }

    /**
     * @param BaseRequest $request
     *
     * @return RedirectResponse
     */
    public function store(BaseRequest $request)
    {
        $this->model->createModel($request->all(), $request->file('avatar'));

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return Model | null | static
     */
    public function edit($id)
    {
        return $this->model->withTrashedWhere('id', $id)
            ->first();
    }

    /**
     * @param BaseRequest $request
     *
     * @return RedirectResponse
     */
    public function update(BaseRequest $request)
    {
        $this->model->updateModel($request->all(), $request->file('avatar'));

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function destroy($id)
    {
        $this->model->destroyModel($id);

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function forceDestroy($id)
    {
        $this->model->forceDestroyModel($id);

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function restore($id)
    {
        $this->model->restoreModel($id);

        return redirect()->back();
    }
}
