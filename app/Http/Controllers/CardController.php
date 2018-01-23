<?php

namespace App\Http\Controllers;

use App\Model\Card;

class CardController extends BaseController
{

    public function replaceCard()
    {
        $cards = Card::orderByRaw("RAND()")->take(10)->get();

        dd($cards);

        return view('card.replace_card');
    }

    public function battleGround()
    {
        return view('card.battleground');
    }

    public function replaceCardSubmit()
    {
        die('sdsd');
    }
}