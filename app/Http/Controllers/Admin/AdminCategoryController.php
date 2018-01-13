<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminCategoryController extends BaseController
{
    //TODO Не доделаны методы данного класса
    /**
     * @return View
     */
    public function index()
    {
        self::checkAdmin();

        $categories = Category::withTrashed()
            ->orderBy('id', 'desc')
            ->get();

        //TODO Не сделаны вьюхи
        return view('admin.card_set.index')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Сохраняет категорию
     *
     * POST /admin/card_set/store
     *
     * @param Request $request
     *
     * @return RedirectResponse | HttpException
     */
    public function store(Request $request)
    {
        self::checkAdmin();

        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        Category::create($request->all());

        return redirect()->back();
    }

    /**
     * Редактирует категорию
     *
     * POST /admin/card_set/update
     *
     * @param Request $request
     *
     * @return RedirectResponse | HttpException
     */
    public function update(Request $request)
    {
        self::checkAdmin();

        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        Category::find($request->id)
            ->update($request->all());

        return redirect()->back();
    }

    /**
     * Удаляет категорию
     *
     * DELETE /admin/card_set/delete/{id}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function destroy($id)
    {
        self::checkAdmin();

        Category::find($id)->delete();

        return redirect()->back();
    }


    /**
     * Восстанавливает категорию
     *
     * GET /admin/card_set/restore/{id}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function restore($id)
    {
        self::checkAdmin();

        Category::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->back();
    }

}
