<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BattleController extends Controller
{
    /**
     * @return View
     */
    public function start()
    {
        $player = null;
        $enemy = null; // бот

        $startPlayerCards = [];

        $startEnemyCards = [];

        die('battle');
        return view('cardgame::battle.index');
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