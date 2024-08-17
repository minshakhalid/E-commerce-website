<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

        $cart = session()->get('cart',[]);
        $sum = 0;
        foreach ($cart as $item){
            $item->final_price = $item->price * $item->quantity;
            $sum += $item->final_price;
        }
        session()->put('cart', $cart);

        return view('checkout.index', [
            'cart' => $cart,
            'sum' => $sum
            ]);

    }

    public function store()
    {

    }
}
