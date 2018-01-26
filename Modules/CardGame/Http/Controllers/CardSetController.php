<?php

namespace Modules\CardGame\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Model\CardSet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CardSetController extends BaseController
{
    /**
     * @return View
     */
    public function index()
    {
        self::checkAdmin();

        return view('admin.card_set.index')->with([
            'cardSets' => $this->showCardSets(),
            'races' => $this->showRaces(),
            'types' => CardSet::TYPES,
        ]);
    }

    /**
     * POST /admin/card_set/store
     *
     * @param Request $request
     *
     * @return RedirectResponse | HttpException
     */
    public function store(Request $request)
    {
        self::checkAdmin();

//        $this->validate($request, [
//            'set_name' => 'required|max:255',
//        ]);

        CardSet::create($request->all());

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

//        $this->validate($request, [
//            'set_name' => 'required|max:255',
//        ]);

        CardSet::find($request->id)
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

        CardSet::find($id)->delete();

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

        CardSet::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->back();
    }

}
