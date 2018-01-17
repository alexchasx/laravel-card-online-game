<?php

namespace App\Http\Controllers\Admin;

use App\Model\Card;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminCardController extends BaseController
{
    /**
     * GET /admin/Card/index
     *
     * @return View | HttpException
     */
    public function index()
    {
        self::checkAdmin();

        $cards = Card::withTrashed()
            ->orderBy('card_name', 'desc')
            ->get();

        return view('admin.index')->with([
            'cards' => $cards,
            'cardSets' => $this->showCardSets(),
            'races' => $this->showRaces(),
            'abilities' => $this->showAbilities(),
            'types' => $this->showCardTypes(),
            'rarities' => $this->showRarities(),
        ]);
    }

//    /**
//     * GET /admin/Card/create
//     *
//     * @return View | HttpException
//     */
//    public function create()
//    {
//        self::checkAdmin();
//
//        return view('admin.Card.create')->with([
//            'cardSet' => $this->showCardSet(),
//            'tags' => $this->showTags(),
//        ]);
//    }

    /**
     * Сохраняет статью и выводит форму с сообщением об успешной операции
     *
     * POST /admin/Card/store
     *
     * @param Request $request
     *
     * @return $this | HttpException
     */
    public function store(Request $request)
    {
        self::checkAdmin();

//        $this->validate($request, [
//            'card_name' => 'required',
//            'content' => 'required',
//        ]);

        Card::query()
            ->create($request->all());

        return redirect()->back();
    }

    /**
     * Выводит форму для редактирования статьи
     *
     * GET /admin/Card/update.{id}
     *
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        self::checkAdmin();

        $Card = Card::withTrashed()
            ->where('id', $id)
            ->first();

        return view('admin.Card.update')->with([
            'Card' => $Card,
            'cardSet' => $this->showCardSet(),
            'tags' => $this->showTags(),
        ]);
    }

    /**
     * Редактирует статью
     *
     * POST /admin/Card/update
     *
     * @param Request $request
     *
     * @return RedirectResponse | HttpException
     */
    public function update(Request $request)
    {
        self::checkAdmin();

//        $this->validate($request, [
//            'title' => 'required|max:255',
//        ]);

        Card::withTrashed()
            ->where('id', $request->id)
            ->update(array_except($request->all(), ['_token']));

        return redirect()->back();
    }

    /**
     * Удаляет статью
     *
     * DELETE /admin/Card/delete/{id}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function destroy($id)
    {
        self::checkAdmin();

        Card::find($id)->delete();

        return redirect()->back();
    }

    /**
     * Удаляет тег статьи
     *
     * DELETE /admin/Card/delete/{Card_id}/{tag_id}
     *
     * @param $Card
     * @param $tag
     *
     * @return RedirectResponse | HttpException
     */
    public function deleteTag($Card, $tag)
    {
        self::checkAdmin();

        CardTag::where('Card_id', $Card)
            ->where('tag_id', $tag)
            ->delete();

        return redirect()->back();
    }

    /**
     * Восстанавливает пользователя
     *
     * GET /admin/Card/restore/{id}
     *
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function restore($id)
    {
        self::checkAdmin();

        Card::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->back();
    }

}
