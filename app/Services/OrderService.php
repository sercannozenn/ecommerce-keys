<?php


namespace App\Services;


use App\Models\Card;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderService
{
    public Order $order;
    public OrderDetail $orderDetail;

    public function __construct(Order $order, OrderDetail $orderDetail)
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    public function create(Collection $cards, array $data): OrderService
    {
        $totalPrice = $this->orderTotalPrice($cards);
        $data = $this->prepareData($data, $totalPrice);
        $order = $this->order::create($data);
        $this->orderDetailCreate($cards, $order);

        return $this;
    }

    public function orderTotalPrice($cards): float
    {
        $totalPrice = 0;
        foreach ($cards as $card)
        {
            $totalPrice += $card->price_amount;
        }
        return number_format($totalPrice, 2);
    }

    public function prepareData(array $data, float $totalPrice): array
    {
        $data['session_id'] = Session::getId();
        $data['total_price'] = $totalPrice;
        if (Auth::check())
        {
            $data['user_id'] = Auth::id();
        }

        return $data;
    }

    public function orderDetailCreate($cards, Order $order)
    {
        foreach ($cards as $card)
        {
            $this->orderDetail::create([
                'order_id' => $order->id,
                'product_id' => $card->product->product_id,
                'amount' => $card->amount,
                'price' => $card->product->price
            ]);
            $card->delete();
        }
    }
}
