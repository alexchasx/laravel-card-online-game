<?php

namespace Modules\CardGame\Http\Controllers;

use App\Model\Ability;
use App\Model\Card;
use App\Model\CardType;
use App\Model\Race;
use App\Model\Rarity;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Repositories\CardRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CardController extends BaseController
{
    /**
     * @var CardRepository
     */
    protected $repository;

    public function __construct(CardRepository $repository){
        $this->repository = $repository;
    }

    /**
     * GET /admin/Card/index
     *
     * @return View | HttpException
     */
    public function index()
    {
        self::checkAdmin(); //TODO Избавиться!

        $cards = $this->repository->withTrashedOrderByDesc('id');
        dd($cards);

        return view('cardgame::card.index')->with([
            'cards' => $cards,
            'cardSets' => $this->showCardSets(),
            'races' => $this->showModels(Race::class),
            'abilities' => $this->showModels(Ability::class),
            'types' => $this->showModels(CardType::class),
            'rarities' => $this->showModels(Rarity::class),
        ]);
    }

//    /**
//     * @return View | HttpException
//     */
//    public function create()
//    {
//        self::checkAdmin();
//
//        return view('admin.Card.create')->with([
//            'cardSet' => $this->showCardSets(),
//            'tags' => $this->showTags(),
//        ]);
//    }

    /**
     * @param Request $request
     *
     * @return $this | HttpException
     */
    public function store(Request $request)
    {
        self::checkAdmin();

//        $this->validate($request, [
//            'card_name' => 'required',
//        ]);

        $originalName =  $request->file('avatar')
            ->getClientOriginalName();

        $path = $request->file('avatar')
            ->storeAs('upload', $originalName);

        $card = Card::query()
            ->create(array_except($request->all(), ['avatar']));

        $card->avatar = '/storage/app/' . $path;
        $card->save();

        return redirect()->back();
    }

    /**
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
            'cardSet' => $this->showCardSets(),
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
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function destroy($id)
    {
        self::checkAdmin();

        Card::query()
            ->find($id)->delete();

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

        Card::withTrashed()
            ->find($id)
            ->forceDelete();

        return redirect()->back();
    }

    /**
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

    public function replaceCard()
    {
        $cards = Card::query()
            ->orderByRaw("RAND()")
            ->take(5)
            ->get();

        return view('card.replace_card')->with([
            'cards' => $cards,
        ]);
    }

    public function battleGround()
    {
        die('battle');
        return view('card.battleground');
    }

    public function replaceCardSubmit(Request $request)
    {
        die('replace');
        $playerCards = [];

        foreach ($request->all()['id'] as $cardId) {
            $playerCards[] = Card::query()
                ->findOrFail($cardId);
        }

        $enemyCards = Card::query()
            ->orderByRaw("RAND()")
            ->take(5)
            ->get();

        $player = null;

//        if (Auth::check()) {
//            $player = User::query()
//                ->findOrFail(Auth::id());
//        }

        return view('card.battleground')->with([
            'playerStartCards' => $playerCards,
//            'enemyStartCards' => $enemyCards,
//            'player' => $player,
        ]);
    }
}
