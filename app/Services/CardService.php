<?php


namespace App\Services;


use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CardService
{
    public Card $card;
    public string $sessionID;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function addNewProductOrUpdate(int $productID, int $amount = 1)
    {
        $card = $this->getCardByProductId($productID);
        if ($card)
        {
            $this->setCard($card);
            $this->updateCard($amount);
        }
        else
        {
            $this->createCard($productID, $amount);
        }
        return $this->getAllCard();
    }

    public function getCardByProductId(int $productID)
    {
        $this->setSession();
        return $this->card::query()
            ->where('product_id', $productID)
            ->where('session_id', $this->sessionID)
            ->where(function ($query)
            {
                if (Auth::check())
                {
                    $userID = Auth::id();
                    $query->where('user_id', $userID);
                 }
            })->first();
    }

    public function getCardById(int $cardID)
    {
        return $this->card::query()
            ->where('id', $cardID)
            ->first();
    }

    public function setCard(Card $card)
    {
        $this->card = $card;
    }

    public function setSession()
    {
        $this->sessionID = Session::getId();
    }

    public function createCard(int $productID, int $amount = 1): Card
    {
        $data = [
            'session_id' => $this->sessionID,
            'amount' => $amount,
            'product_id' => $productID
        ];
        $user = $this->checkUser();
        if ($user)
        {
            $data['user_id'] = $user->id;
        }

        return $this->card::create($data);
    }

    public function updateCard(int $amount)
    {
        $this->card->update([
            'amount' => $amount,
            'session_id' => $this->sessionID
        ]);
        $this->card->fresh();
    }

    public function checkUser()
    {
        if (Auth::check())
        {
            return Auth::user();
        }
        return false;
    }

    public function getAllCard()
    {
        $this->setSession();

        return $this->card::query()
            ->with(['product.featureImage'])
            ->has('product.featureImage')
            ->where('session_id', $this->sessionID)
            ->where(function ($query)
            {
                $user = $this->checkUser();
                if ($user)
                {
                    $query->where('user_id', $user->id);
                }
            })
            ->get();
    }

    public function removeCard(int $cardID)
    {
        $this->deleteCardById($cardID);

        return $this->getAllCard();
    }

    public function deleteCardById(int $cardID)
    {
        $card = $this->getCardById($cardID);
        $card->delete();
    }

    public function checkoutUpdate(int $cardID, int $amount)
    {
        if ($amount == 0)
        {
            $this->deleteCardById($cardID);
        }
        else {
            $this->setSession();

            $card = $this->getCardById($cardID);

            $this->setCard($card);
            $this->updateCard($amount);
        }


        return $this->getAllCard();
    }

    public function cardClear()
    {
        $this->setSession();
        $this->card::query()
            ->with(['product.featureImage'])
            ->has('product.featureImage')
            ->where('session_id', $this->sessionID)
            ->where(function ($query)
            {
                $user = $this->checkUser();
                if ($user)
                {
                    $query->where('user_id', $user->id);
                }
            })
            ->delete();
        dd('card temizlendi');
    }
}
