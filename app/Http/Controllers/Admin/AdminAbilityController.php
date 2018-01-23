<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Model\Ability;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminAbilityController extends BaseController
{
    /**
     * Показать все теги
     */
    public function index()
    {
        self::checkAdmin();

        $abilities = Ability::withTrashed()
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.ability.index')->with([
            'abilities' => $abilities
        ]);
    }

    /**
     * Сохраняет тег
     *
     * POST /admin/ability/store
     *
     * @param Request $request
     *
     * @return RedirectResponse | HttpException
     */
    public function store(Request $request)
    {
        self::checkAdmin();

//        $this->validate($request, [
//            'name' => 'required|max:255',
//        ]);

        $originalName =  $request->file('avatar')
            ->getClientOriginalName();

        $path = $request->file('avatar')
            ->storeAs('upload', $originalName);

        $ability = Ability::query()
            ->create(array_except($request->all(), ['avatar']));

        $ability->avatar = '/storage/app/' . $path;
        $ability->save();

        return redirect()->back();
    }

    /**
     * Редактирует тег
     *
     * POST /admin/ability/update
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

        Ability::query()
            ->find($request->id)
            ->update($request->all());

        return redirect()->back();
    }

    /**
     * Удаляет тег
     *
     * DELETE /admin/ability/delete/{id}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function destroy($id)
    {
        self::checkAdmin();

        Ability::query()
            ->find($id)
            ->delete();

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function forceDestroy($id)
    {
        self::checkAdmin();

        Ability::withTrashed()
            ->find($id)
            ->forceDelete();

        return redirect()->back();
    }

    /**
     * Восстанавливает тег
     *
     * GET /admin/ability/restore/{ability}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function restore($id)
    {
        self::checkAdmin();

        Ability::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->back();
    }
}

