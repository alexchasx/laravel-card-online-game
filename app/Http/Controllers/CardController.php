<?php

namespace App\Http\Controllers;

use App\Model\Card;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends BaseController
{

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
        return view('card.battleground');
    }

    public function replaceCardSubmit(Request $request)
    {
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