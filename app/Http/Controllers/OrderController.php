<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Services\CardService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function order(Request $request)
    {
        $cardService = new CardService(new Card());
        $cards = $cardService->getAllCard();
        $data= $request->only('email', 'fullname', 'address', 'payment_type');
        $order = $this->orderService->create($cards, $data);

        dd('sipariş alındı');
    }
}
