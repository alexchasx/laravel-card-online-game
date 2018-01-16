<?php

namespace App\Http\Controllers;

class CardController extends BaseController
{
    public function replaceCard()
    {
        return view('card.replace_card');
    }

    public function replaceCardSubmit()
    {
        die('sdsd');
    }
}
