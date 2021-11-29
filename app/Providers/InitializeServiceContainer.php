<?php

namespace App\Providers;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class InitializeServiceContainer extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $sessionID = Session::getId();
//        $cards = Card::query()
//            ->with(['product.featureImage'])
//            ->has('product.featureImage')
//            ->where('session_id', $sessionID)
//            ->orWhere(function ($query)
//            {
//                if (Auth::check())
//                {
//                    $userID = Auth::id();
//                    $query->where('user_id', $userID);
//                }
//            })
//            ->get();
//
//        $cardView = view('front.card.card-items', compact('cards'))->render();
//
//        view()->share('cards', $cards);
    }
}
