<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\Card;
use Modules\CardGame\Http\Entities\Race;
use Modules\CardGame\Http\Entities\Rarity;
use Modules\CardGame\Http\Entities\CardSet;
use Modules\CardGame\Http\Entities\Ability;
use Modules\CardGame\Http\Entities\CardType;
use Modules\CardGame\Repositories\CardRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CardController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param CardRepository $repository
     */
    public function __construct(CardRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * GET /admin/Card/index
     *
     * @return View | HttpException
     */
    public function index()
    {
//        self::checkAdmin(); //TODO Избавиться!

        return view('cardgame::card.index')->with([
            'cards' => $this->repository->withTrashedOrderByDesc(),
            'cardSets' => $this->repository->showEntitiesByClassName(CardSet::class, 'set_name'),
            'races' => $this->repository->showEntitiesByClassName(Race::class),
            'abilities' => $this->repository->showEntitiesByClassName(Ability::class),
            'types' => $this->repository->showEntitiesByClassName(CardType::class),
            'rarities' => $this->repository->showEntitiesByClassName(Rarity::class),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        self::checkAdmin();

        $card = parent::edit($id);

        return view('cardgame::card.update')->with([
            'Card' => $card,
            'cardSets' => $this->repository->showEntitiesByClassName(CardSet::class, 'set_name'),
        ]);
    }

    /**
     * @return $this
     */
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
