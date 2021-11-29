<?php

namespace App\Http\Controllers;

use App\Services\CardService;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public CardService $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    public function add(Request $request)
    {
        $request->validate([
            'productID' => 'required'
        ]);

        $productID = $request->productID;
        $amount = !is_null($request->amount) ? $request->amount : 1;

        $cards = $this->cardService->addNewProductOrUpdate($productID, $amount);
        $cardView = view('front.card.card-items', compact('cards'))->render();

        return response()
            ->json(['card' => $cardView])
            ->setStatusCode(200);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'cardID' => 'required'
        ]);

        $cardID = $request->cardID;

        $cards = $this->cardService->removeCard($cardID);
        $cardView = view('front.card.card-items', compact('cards'))->render();

        return response()
            ->json(['card' => $cardView])
            ->setStatusCode(200);
    }

    public function init()
    {
        $cards = $this->cardService->getAllCard();
        $cardView = view('front.card.card-items', compact('cards'))->render();

        return response()
            ->json(['card' => $cardView])
            ->setStatusCode(200);
    }

    public function card()
    {
        $cards = $this->cardService->getAllCard();

        return view('front.card.index', compact('cards'));
    }

    public function cardUpdate(Request $request)
    {
        $request->validate([
            'cardID' => 'required',
            'amount' => 'required'
        ]);
        $cardID = $request->cardID;
        $amount = $request->amount;

        $cards = $this->cardService->checkoutUpdate($cardID, $amount);
        $cardView = view('front.card.row', compact('cards'))->render();
        return response()
            ->json(['card' => $cardView])
            ->setStatusCode(200);

    }

    public function checkout()
    {
        $cards= $this->cardService->getAllCard();
        return view('front.checkout.index', compact('cards'));
    }

    public function cardClear(Request $request)
    {
        $this->cardService->cardClear();
    }
}
