<?php

namespace App\Http\Controllers;

use App\Model\Card;
use Illuminate\Http\Request;

class CardController extends BaseController
{

    public function replaceCard()
    {
        $cards = Card::orderByRaw("RAND()")
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
        dd($request->all());

        return view('card.battleground');
    }
}